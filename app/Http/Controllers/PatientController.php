<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use DataTables;

class PatientController extends Controller
{
    public function index(Request $request)
    {  
        if ($request->ajax()) {
            $patients = Patient::with(['doctorCoordinator', 'doctor']);
            
            return Datatables::of($patients)
                ->addIndexColumn()
                ->addColumn('fc_file', function($patient) {
                    return ($patient->fc_number ?? 'N/A') . ' ' . ($patient->file_number ?? 'N/A');
                })
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
                    
                    return $actions;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('patients.index');
    }

    public function create()
    {
        $doctors = Doctor::all();     
        return view('patients.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:Free Consultancy,Regular Patient',
            'patient_name' => 'required|string|max:255',
            'patient_dob' => 'required|date',
            'patient_cnic' => 'required|unique:patients,patient_cnic|regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/',
            'patient_contact' => 'nullable|regex:/^\(03[0-9]{2}\) [0-9]{3}-[0-9]{4}$/',
            'spouse_cnic' => 'nullable|regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/',
            'spouse_contact' => 'nullable|regex:/^\(03[0-9]{2}\) [0-9]{3}-[0-9]{4}$/',
            'emergency_contact_number' => 'nullable|regex:/^\(03[0-9]{2}\) [0-9]{3}-[0-9]{4}$/',
            'doctor_coordinator_id' => 'required|exists:doctors,id',
            'doctor_id' => 'nullable|exists:doctors,id',
        ]);

        // Auto-increment `file_number` starting from 1001
        $lastFileNumber = Patient::withTrashed()->max('file_number');
        $file_number = $lastFileNumber ? $lastFileNumber + 1 : 1001;

        // Auto-increment `fc_number` starting from 1001
        $lastFcNumber = Patient::withTrashed()->max('fc_number');
        $fc_number = $lastFcNumber ? $lastFcNumber + 1 : 1001;
        
        // Add the file_number and fc_number to the request data
        $data = $request->all();
        $data['file_number'] = empty($data['doctor_id']) ? null : $file_number;
        $data['fc_number'] = $fc_number;

        Patient::create($data);
        
        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        
        $doctors = Doctor::all();     
        return view('patients.edit', compact('patient','doctors'));
    }
    
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_dob' => 'required|date',
            'patient_cnic' => 'required|regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/|unique:patients,patient_cnic,' . $patient->id,
            'patient_contact' => 'nullable|regex:/^\(03[0-9]{2}\) [0-9]{3}-[0-9]{4}$/',
            'spouse_cnic' => 'nullable|regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/',
            'spouse_contact' => 'nullable|regex:/^\(03[0-9]{2}\) [0-9]{3}-[0-9]{4}$/',
            'emergency_contact_number' => 'nullable|regex:/^\(03[0-9]{2}\) [0-9]{3}-[0-9]{4}$/',
            'doctor_coordinator_id' => 'required|exists:doctors,id',
            'doctor_id' => 'nullable|exists:doctors,id',
        ]);
        
        $data = $request->all();

        if (empty($patient->file_number)) {
            // Auto-increment `file_number` starting from 1001
            $lastFileNumber = Patient::max('file_number');
            $file_number = $lastFileNumber ? $lastFileNumber + 1 : 1001;

            // Add the file_number and fc_number to the request data            
            $data['file_number'] = empty($data['doctor_id']) ? null : $file_number;
        }

        $patient->update($data);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}

