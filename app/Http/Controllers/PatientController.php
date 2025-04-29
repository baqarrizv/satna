<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index(Request $request)
    {  
        if ($request->ajax()) {
            $patients = Patient::with(['doctorCoordinator', 'doctor']);
            
            // Apply filters
            if ($request->has('patient_type') && !empty($request->patient_type)) {
                $patients->where('type', $request->patient_type);
            }
            
            if ($request->has('doctor_name') && !empty($request->doctor_name)) {
                $patients->whereHas('doctor', function($query) use ($request) {
                    $query->where('name', $request->doctor_name);
                });
            }
            
            if ($request->has('coordinator_name') && !empty($request->coordinator_name)) {
                $patients->whereHas('doctorCoordinator', function($query) use ($request) {
                    $query->where('name', $request->coordinator_name);
                });
            }
            
            return Datatables::of($patients)
                ->addIndexColumn()
                ->addColumn('action', function($patient) {
                    $actions = '';
                    
                    if (auth()->user()->can('Edit Patients')) {
                        $actions .= '<a href="' . route('patients.edit', $patient->id) . '" class="btn btn-outline-secondary btn-sm">
                            <i class="uil-pen"></i>
                        </a>';
                    }
                    
                    if (auth()->user()->can('Delete Patients')) {
                        $actions .= '<form action="' . route('patients.destroy', $patient->id) . '" method="POST" style="display:inline-block;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm(\'Are you sure?\')">
                                <i class="uil-trash"></i>
                            </button>
                        </form>';
                    }
                    
                    // Add Charges Button
                    $actions .= '<a href="' . route('payments.addCharges') . '?patient=' . $patient->id . '" class="btn btn-outline-primary btn-sm ml-1" title="Add Charges" target="_blank" rel="noopener noreferrer">
                        <i class="uil-money-bill"></i>
                    </a>';
                    
                    return $actions;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('patients.index');
    }

    public function create()
    {
        $doctors = Doctor::where('is_active', true)->get();
        $coordinators = Doctor::where('is_active', true)
                             ->where('is_coordinator', true)
                             ->get();
        return view('patients.create', compact('doctors', 'coordinators'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required',
            'patient_contact' => 'required',
            'type' => 'required'
        ]);

        // Additional validation for Gyne
        if (in_array($request->type, ['Gyne'])) {
            $request->validate([
                'filetype' => 'required',
                'purpose' => 'required'
            ]);
        }

        // Generate FC Number and File Number based on type
        $fcNumber = null;
        $fileNumber = null;

        if ($request->type == 'Free Consultancy') {
            // Generate FC Number for Free Consultancy patients (starting from 1001)
            $maxFcNumber = Patient::withTrashed()
                ->whereNotNull('fc_number')
                ->where('fc_number', '!=', '')
                ->max(DB::raw('CAST(fc_number AS UNSIGNED)'));
            
            // If max exists, increment by 1, otherwise start from 1001
            $fcNumber = $maxFcNumber ? ($maxFcNumber + 1) : 1001;
        } 
        
        // Generate File Number for non-Free Consultancy patient types
        if ($request->type == 'I/F') {
            // Get current year's last two digits (e.g., 23 for 2023)
            $currentYear = date('y');
            
            // Find the maximum file number for the current year
            $yearPrefix = "TFC-$currentYear/";
            $maxFileNumber = Patient::withTrashed()
                ->whereNotNull('file_number')
                ->where('file_number', 'like', "$yearPrefix%")
                ->get()
                ->map(function($patient) use ($yearPrefix) {
                    // Extract only the numeric part after the prefix
                    $numericPart = str_replace($yearPrefix, '', $patient->file_number);
                    return (int)$numericPart;
                })
                ->max();
            
            // If max exists, increment by 1, otherwise start from 1
            $nextNumber = $maxFileNumber ? ($maxFileNumber + 1) : 1;
            
            // Format as TFC-YY/00001
            $fileNumber = $yearPrefix . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
        }

        // Double-check if the generated numbers are unique (including deleted patients)
        if ($fcNumber) {
            while (Patient::withTrashed()->where('fc_number', $fcNumber)->exists()) {
                $fcNumber++;
            }
        }
        
        if ($fileNumber) {
            $yearPrefix = substr($fileNumber, 0, 7); // Get TFC-YY/
            $numericPart = (int)substr($fileNumber, 7); // Get the numeric part
            
            while (Patient::withTrashed()->where('file_number', $fileNumber)->exists()) {
                $numericPart++;
                $fileNumber = $yearPrefix . str_pad($numericPart, 5, '0', STR_PAD_LEFT);
            }
        }

        $patient = Patient::create(array_merge(
            $request->all(),
            [
                'fc_number' => $fcNumber,
                'file_number' => $fileNumber
            ]
        ));

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        $doctors = Doctor::where('is_active', true)->get();
        $coordinators = Doctor::where('is_active', true)
                             ->where('is_coordinator', true)
                             ->get();
        return view('patients.edit', compact('patient', 'doctors', 'coordinators'));
    }
    
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'patient_name' => 'required',
            'patient_contact' => 'required',
            'type' => 'required'
        ]);

        // Additional validation for Gyne/Ultrasound
        if (in_array($request->type, ['Gyne', 'Ultrasound'])) {
            $request->validate([
                'filetype' => 'required',
                'purpose' => 'required'
            ]);
        }

        // Additional validation for Regular/Free Consultancy
        if (in_array($request->type, ['Regular Patient', 'Free Consultancy'])) {
           
        }

        // Laboratory patient type doesn't need additional validation

        // Handle FC Number and File Number generation if type changes
        $fcNumber = $patient->fc_number;
        $fileNumber = $patient->file_number;

        // If patient type is changing to Free Consultancy and doesn't have an FC number
        if ($request->type == 'Free Consultancy' && (!$fcNumber || $fcNumber == '')) {
            // Get the maximum fc_number that exists in the database
            $maxFcNumber = Patient::withTrashed()
                ->whereNotNull('fc_number')
                ->where('fc_number', '!=', '')
                ->max(DB::raw('CAST(fc_number AS UNSIGNED)'));
            
            // If max exists, increment by 1, otherwise start from 1001
            $fcNumber = $maxFcNumber ? ($maxFcNumber + 1) : 1001;
            
            // Double-check uniqueness (including deleted patients)
            while (Patient::withTrashed()->where('fc_number', $fcNumber)->where('id', '!=', $patient->id)->exists()) {
                $fcNumber++;
            }
        }

        // If patient type is changing from Free Consultancy to another type and doesn't have a file number
        if ($request->type != 'Free Consultancy' && (!$fileNumber || $fileNumber == '')) {
            // Get current year's last two digits (e.g., 23 for 2023)
            $currentYear = date('y');
            
            // Find the maximum file number for the current year
            $yearPrefix = "TFC-$currentYear/";
            $maxFileNumber = Patient::withTrashed()
                ->whereNotNull('file_number')
                ->where('file_number', 'like', "$yearPrefix%")
                ->get()
                ->map(function($patient) use ($yearPrefix) {
                    // Extract only the numeric part after the prefix
                    $numericPart = str_replace($yearPrefix, '', $patient->file_number);
                    return (int)$numericPart;
                })
                ->max();
            
            // If max exists, increment by 1, otherwise start from 1
            $nextNumber = $maxFileNumber ? ($maxFileNumber + 1) : 1;
            
            // Format as TFC-YY/00001
            $fileNumber = $yearPrefix . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
            
            // Double-check uniqueness (including deleted patients)
            $numericPart = (int)substr($fileNumber, 7); // Get the numeric part
            
            while (Patient::withTrashed()->where('file_number', $fileNumber)->where('id', '!=', $patient->id)->exists()) {
                $numericPart++;
                $fileNumber = $yearPrefix . str_pad($numericPart, 5, '0', STR_PAD_LEFT);
            }
        }

        $patient->update(array_merge(
            $request->all(),
            [
                'fc_number' => $fcNumber,
                'file_number' => $fileNumber
            ]
        ));

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}

