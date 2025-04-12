<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use App\Services\EventNotificationService;
use DataTables;
use Illuminate\Support\Facades\Storage;

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
                ->addColumn('status', function ($doctor) {
                    $canModifyStatus = auth()->user()->can('Modify Doctor Status');
                    $html = '<input type="checkbox" id="switch-' . $doctor->id . '" switch="bool" '
                        . ($doctor->is_active ? 'checked' : '')
                        . ($canModifyStatus ? '' : 'disabled')
                        . ' onchange="toggleDoctorStatus(' . $doctor->id . ', this.checked)">'
                        . '<label for="switch-' . $doctor->id . '" data-on-label="Active" data-off-label="Inactive"></label>';
                    return $html;
                })
                ->addColumn('action', function ($doctor) {
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
                ->editColumn('doctor_charges', function ($doctor) {
                    return number_format($doctor->doctor_charges, 0);
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'sex' => 'nullable|string',
            'religion' => 'nullable|string',
            'cnic' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'address' => 'nullable|string',
            'date_of_appointment' => 'required|date',
            'specialist' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'doctor_charges' => 'required|numeric',
            'doctor_portion' => 'nullable|numeric',
            'clinic_portion' => 'nullable|numeric',
            'payment_mode' => 'nullable|string',
            'account_title' => 'nullable|string',
            'account_number' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'emergency_contact_name' => 'nullable|string',
            'emergency_contact_relation' => 'nullable|string',
            'emergency_contact_number' => 'nullable|string',
            'doctor_id' => 'nullable|string|unique:doctors,doctor_id',
            'is_coordinator' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        // Generate a unique doctor_id if not provided
        if (empty($validatedData['doctor_id'])) {
            $lastDoctor = Doctor::orderBy('id', 'desc')->first();
            $lastId = $lastDoctor ? intval(substr($lastDoctor->doctor_id ?? 'DR0000', 2)) : 0;
            $validatedData['doctor_id'] = 'DR' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        }

        // Set default values for portions if not provided
        if (empty($validatedData['doctor_portion'])) {
            $validatedData['doctor_portion'] = 0;
        }

        if (empty($validatedData['clinic_portion'])) {
            $validatedData['clinic_portion'] = 0;
        }

        // Set boolean fields
        $validatedData['is_coordinator'] = $request->has('is_coordinator') ? 1 : 0;
        $validatedData['is_active'] = $request->has('is_active') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/doctors'), $imageName);
            $validatedData['image'] = 'images/doctors/' . $imageName;
        }

        Doctor::create($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully!');
    }

    public function edit(Doctor $doctor)
    {
        $departments = Department::all();
        $doctor->doctor_charges = number_format($doctor->doctor_charges, 0);
        return view('doctors.edit', compact('doctor', 'departments'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $doctor->doctor_charges = $this->unformat_number($request->doctor_charges);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'sex' => 'nullable|string',
            'religion' => 'nullable|string',
            'cnic' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'address' => 'nullable|string',
            'date_of_appointment' => 'required|date',
            'specialist' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'doctor_charges' => 'required|numeric',
            'doctor_portion' => 'nullable|numeric',
            'clinic_portion' => 'nullable|numeric',
            'payment_mode' => 'nullable|string',
            'account_title' => 'nullable|string',
            'account_number' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'emergency_contact_name' => 'nullable|string',
            'emergency_contact_relation' => 'nullable|string',
            'emergency_contact_number' => 'nullable|string',
            'doctor_id' => 'nullable|string|unique:doctors,doctor_id,' . $doctor->id,
            'is_coordinator' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        // Set default values for portions if not provided
        if (!isset($validatedData['doctor_portion'])) {
            $validatedData['doctor_portion'] = 0;
        }

        if (!isset($validatedData['clinic_portion'])) {
            $validatedData['clinic_portion'] = 0;
        }

        // Set boolean fields
        $validatedData['is_coordinator'] = $request->has('is_coordinator') ? 1 : 0;
        $validatedData['is_active'] = $request->has('is_active') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete previous image if exists
            if ($doctor->image && file_exists(public_path($doctor->image))) {
                unlink(public_path($doctor->image));
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/doctors'), $imageName);
            $validatedData['image'] = 'images/doctors/' . $imageName;
        }

        $doctor->update($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully!');
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

    function unformat_number($formatted)
    {
        return str_replace(',', '', $formatted);
    }
}
