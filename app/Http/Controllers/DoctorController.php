<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use App\Services\EventNotificationService;
use DataTables;

class DoctorController extends Controller
{
    protected $fileUploadService;

    /**
     * Constructor to inject the FileUploadService.
     *
     * @param FileUploadService $fileUploadService
     */
    public function __construct(FileUploadService $fileUploadService)
    {
        // Injecting FileUploadService for handling file uploads.
        $this->fileUploadService = $fileUploadService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $doctors = Doctor::with('department');
            
            return Datatables::of($doctors)
                ->addIndexColumn()
                ->addColumn('status', function($doctor) {
                    $canModifyStatus = auth()->user()->can('Modify Doctor Status');
                    $html = '<input type="checkbox" id="switch-' . $doctor->id . '" switch="bool" ' 
                        . ($doctor->is_active ? 'checked' : '') 
                        . ($canModifyStatus ? '' : 'disabled')
                        . ' onchange="toggleDoctorStatus(' . $doctor->id . ', this.checked)">'
                        . '<label for="switch-' . $doctor->id . '" data-on-label="Active" data-off-label="Inactive"></label>';
                    return $html;
                })
                ->addColumn('action', function($doctor) {
                    $actions = '';
                    
                    if (auth()->user()->can('Edit Doctor')) {
                        $actions .= '<a href="' . route('doctors.edit', $doctor->id) . '" class="btn btn-outline-secondary btn-sm">
                            <i class="uil-pen"></i>
                        </a>';
                    }
                    
                    if (auth()->user()->can('Delete Doctor')) {
                        $actions .= '<form action="' . route('doctors.destroy', $doctor->id) . '" method="POST" style="display:inline-block;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm(\'Are you sure?\')">
                                <i class="uil-trash"></i>
                            </button>
                        </form>';
                    }
                    
                    return $actions;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('doctors.index');
    }

    public function create()
    {
        $departments = Department::all();
        return view('doctors.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'sex' => 'required|in:Male,Female',
            'religion' => 'nullable|string|max:255',
            'doctor_id' => 'required|string|unique:doctors',
            'cnic' => 'required|string|unique:doctors',
            'contact_number' => 'required|string|max:15',
            'image' => 'nullable|string|max:255',
            'address' => 'required|string',
            'date_of_appointment' => 'required|date',
            'marital_status' => 'required|in:Single,Married,Divorced',
            'specialist' => 'required|string',
            'department_id' => 'required|exists:departments,id',

            // Emergency contact validation
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_relation' => 'required|string|max:255',
            'emergency_contact_number' => 'required|string|max:15',

            // Payment information validation
            'payment_mode' => 'required|in:Bank Transfer,Cash',
            'account_title' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'doctor_charges' => 'required|numeric|min:0',
            'doctor_portion' => 'required|numeric|min:0|max:100',
            'clinic_portion' => 'required|numeric|min:0|max:100',
        ]);
                
        // Handle Image
        if ($request->image) {
            $validated['image'] = $this->fileUploadService->handleFileUpdate($request->image, '', 'doctors');
        }

        $doctor = Doctor::create($validated);

        // Store qualifications
        foreach ($request->degrees as $key => $degree) {
            $doctor->qualifications()->create([
                'degree' => $degree,
                'majors' => $request->majors[$key],
                'institution' => $request->institutions[$key],
            ]);
        }

        // Store experiences
        foreach ($request->last_employers as $key => $employer) {
            $doctor->experiences()->create([
                'last_employer' => $employer,
                'designation' => $request->designations[$key],
                'start_date' => $request->start_dates[$key],
                'end_date' => $request->end_dates[$key],
            ]);
        }
                
        EventNotificationService::notifyEventByName('Doctor Created');

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully');
    }

    public function edit(Doctor $doctor)
    {
        $departments = Department::all();
        
        return view('doctors.edit', compact('doctor', 'departments'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'sex' => 'required|in:Male,Female',
            'religion' => 'nullable|string|max:255',
            'doctor_id' => 'required|string|unique:doctors,doctor_id,'.$doctor->id,
            'cnic' => 'required|string|unique:doctors,cnic,'.$doctor->id,
            'contact_number' => 'required|string|max:15',
            'image' => 'nullable|string|max:255',
            'address' => 'required|string',
            'date_of_appointment' => 'required|date',
            'marital_status' => 'required|in:Single,Married,Divorced',
            'specialist' => 'required|string',
            'department_id' => 'required|exists:departments,id',

            // Emergency contact validation
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_relation' => 'required|string|max:255',
            'emergency_contact_number' => 'required|string|max:15',

            // Payment information validation
            'payment_mode' => 'required|in:Bank Transfer,Cash',
            'account_title' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'doctor_charges' => 'required|numeric|min:0',
            'doctor_portion' => 'required|numeric|min:0|max:100',
            'clinic_portion' => 'required|numeric|min:0|max:100',
        ]);

        // Handle Image
        if ($request->image) {
            $validated['image'] = $this->fileUploadService->handleFileUpdate($request->image, $doctor->image, 'doctors');
        }
        
        // Update doctor information
        $doctor->update($validated);

        // Delete old qualifications and experiences
        $doctor->qualifications()->delete();
        $doctor->experiences()->delete();

        // Store updated qualifications
        foreach ($request->degrees as $key => $degree) {
            $doctor->qualifications()->create([
                'degree' => $degree,
                'majors' => $request->majors[$key],
                'institution' => $request->institutions[$key],
            ]);
        }

        // Store updated experiences
        foreach ($request->last_employers as $key => $employer) {
            $doctor->experiences()->create([
                'last_employer' => $employer,
                'designation' => $request->designations[$key],
                'start_date' => $request->start_dates[$key],
                'end_date' => $request->end_dates[$key],
            ]);
        }

        EventNotificationService::notifyEventByName('Doctor Updated');

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
       
        EventNotificationService::notifyEventByName('Doctor Deleted');

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }

    public function toggleStatus(Request $request, Doctor $doctor)
    {
        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $doctor->update(['is_active' => $request->is_active]);
        
        EventNotificationService::notifyEventByName('Doctor Status Updated');

        return response()->json(['success' => true]);
    }
}
