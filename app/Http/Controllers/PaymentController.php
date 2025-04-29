<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentService;
use App\Models\Patient;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Payment::with('patient');

            // Apply filters
            if ($request->filled('payment_mode')) {
                $query->where('payment_mode', $request->payment_mode);
            }

            if ($request->filled('doctor_id')) {
                $doctor = Doctor::find($request->doctor_id);
                if ($doctor) {
                    $query->where('doctor_name', $doctor->name);
                }
            }

            if ($request->filled('service_id')) {
                $service = Service::find($request->service_id);
                if ($service) {
                    $query->whereHas('services', function ($q) use ($service) {
                        $q->where('service_name', $service->name);
                    });
                }
            }

            if ($request->filled('payment_date')) {
                $query->whereDate('created_at', $request->payment_date);
            }

            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('fc_file', function ($payment) {
                    return $payment->fc_number . ' ' . $payment->file_number;
                })
                ->addColumn('invoice', function ($payment) {
                    return '<a href="' . route('payments.invoice', $payment->id) . '" class="btn btn-sm">
                        <span class="badge rounded-pill bg-warning-subtle text-info font-size-12">Download</span>
                    </a>';
                })
                ->addColumn('action', function ($payment) {
                    if (!$payment->closed && !$payment->refunded && Auth::check()) {
                        return '<form action="' . route('payments.refund', $payment->id) . '" method="POST" style="display:inline-block;">
                            ' . csrf_field() . '
                            ' . method_field('PUT') . '
                            <button type="submit" class="btn btn-sm" onclick="return confirm(\'Are you sure?\')">
                                <span class="badge rounded-pill bg-warning-subtle text-warning font-size-12">Refund</span>
                            </button>
                        </form>';
                    } elseif ($payment->refunded) {
                        return '<span class="badge rounded-pill bg-success-subtle text-success font-size-12">Refunded</span>';
                    } else {
                        return '<span class="badge rounded-pill bg-danger-subtle text-danger font-size-12">Closed</span>';
                    }
                })
                ->editColumn('total', function ($payment) {
                    return number_format($payment->total, 0);
                })
                ->editColumn('created_at', function ($payment) {
                    return $payment->created_at->format('d-M-Y');
                })
                ->rawColumns(['invoice', 'action'])
                ->make(true);
        }

        // Get data for filters
        $doctors = Doctor::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();

        return view('payments.index', compact('doctors', 'services'));
    }

    // Show the form for Adding Charges
    public function addCharges(Request $request)
    {
        if ($request->isMethod('get')) {
            // Check if patient ID was passed in the URL
            $patientId = $request->query('patient');
            $patient = null;

            if ($patientId) {
                $patient = Patient::find($patientId);
            } else if (session('patientId')) {
                $patient = Patient::find(session('patientId'));
            }
            
            // Get active doctors for the dropdown
            $doctors = Doctor::where('is_active', true)->get();

            // Check if we need to show doctor selection
            $showDoctorSelection = session('showDoctorSelection', false);

            // Handle GET request: Show the form
            return view('payments.addCharges', compact('patient', 'doctors', 'showDoctorSelection'));
        }

        if ($request->isMethod('post')) {
            // Validate the input
            $validatedData = $request->validate([
                'type' => 'required|string',
                'patient' => 'required|string',
                'doctor_id' => 'nullable|exists:doctors,id',
            ]);

            $input = $validatedData['patient'];

            // Determine if the input is in contact format
            $isContactFormat = preg_match('/^\(\d{4}\) \d{3}-\d{4}$/', $input);

            // Search the database based on the input format
            if ($isContactFormat) {
                // Search by patient_contact
                $patient = Patient::where('patient_contact', $input)->first();
            } else {
                // Search by id
                $patient = Patient::where('id', $input)->first();
            }

            // Check if patient exists
            if (!$patient) {
                $doctors = Doctor::where('is_active', true)->get();
                // Instead of error, show the form with doctor selection
                session()->flash('error', 'Patient ID not found. Please assign a doctor to this patient.');
                return view('payments.addCharges', [
                    'showDoctorSelection' => true, 
                    'patientInput' => $input,
                    'doctors' => $doctors,
                    'type' => $validatedData['type']
                ]);
            }
            
            // If doctor_id is provided and patient has no doctor, assign the doctor
            if (!empty($validatedData['doctor_id']) && isset($patient) && !$patient->doctor_id) {
                $patient->doctor_id = $validatedData['doctor_id'];
                $patient->save();
            }

            $type = $validatedData['type'];

            if ($type === 'Appointment Charges' && empty($patient->doctor->doctor_charges)) {
                return redirect()->route('payments.addCharges')
                    ->with(['patientId' => $patient->id, 'showDoctorSelection' => true])
                    ->withErrors(['patient' => 'Assign a doctor to this patient before adding Appointment Charges']);
            }

            // Get all departments and services with a direct approach
            $departments = Department::all()->keyBy('id');
            $services = Service::all();
            
            // Get settings for tax percentage
            $settings = \App\Models\Setting::first();

            // Manually prepare grouped structure
            $groupedServices = [];

            foreach ($services as $service) {
                $deptName = 'Uncategorized';

                if ($service->department_id && isset($departments[$service->department_id])) {
                    $deptName = $departments[$service->department_id]->name;
                }

                if (!isset($groupedServices[$deptName])) {
                    $groupedServices[$deptName] = [];
                }

                $groupedServices[$deptName][] = $service;
            }

            // Sort departments alphabetically but keep 'Uncategorized' at the end
            uksort($groupedServices, function ($a, $b) {
                if ($a === 'Uncategorized') return 1;
                if ($b === 'Uncategorized') return -1;
                return $a <=> $b;
            });

            // Get all doctors for the doctor selection dropdown
            $doctors = Doctor::all();

            return view('payments.viewChargeDetails', compact('patient', 'type', 'groupedServices', 'doctors', 'settings'));
        }
    }

    // Store a new payment in the database
    public function applyCharges(Request $request)
    {
        // Clean numeric values by removing commas
        if ($request->has('total')) {
            $request->merge(['total' => str_replace(',', '', $request->total)]);
        }
        
        if ($request->has('discount')) {
            $request->merge(['discount' => str_replace(',', '', $request->discount)]);
        }
        
        if ($request->has('doctor_charges')) {
            $request->merge(['doctor_charges' => str_replace(',', '', $request->doctor_charges)]);
        }
        
        if ($request->has('charges')) {
            $cleanedCharges = [];
            foreach ($request->charges as $charge) {
                $cleanedCharges[] = str_replace(',', '', $charge);
            }
            $request->merge(['charges' => $cleanedCharges]);
        }
        
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'type' => 'required|in:Appointment Charges,Service Charges',
            'discount' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'payment_mode' => 'required|string',
            'receiver_name' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',
            'doctor_id' => 'nullable|exists:doctors,id'
        ]);

        if (!empty($request->services)) {
            $validatedServices = $request->validate([
                'services.*' => 'required|exists:services,id',
                'charges.*' => 'required|numeric|min:0',
            ]);
        }

        $patient = Patient::findOrFail($request->patient_id);
        
        // Get settings for tax percentage
        $settings = \App\Models\Setting::first();
        $taxPercent = $settings->tax_percentage ?? 0;
        $taxThreshold = $settings->tax_threshold ?? 0;

        $paymentData = [
            'patient_id' => $patient->id,
            'fc_number' => $patient->fc_number,
            'file_number' => $patient->file_number,
            'payment_mode' => $request->payment_mode,
            'receiver_name' => $request->receiver_name,
            'remarks' => $request->remarks,
            'patient_type' => $patient->type,
        ];

        if ($request->type === 'Service Charges' && !empty($request->services)) {
            $sub_total = 0;

            foreach ($request->services as $i => $service_id) {
                $service = Service::findOrFail($service_id);
                $paymentServiceData[$i] = [
                    'service_name' => $service->name,
                    'department_name' => $service->department->name,
                    'charges' => $service->charges,
                ];
                $sub_total += $service->charges;
            }

            $paymentData['sub_total'] = $sub_total;
            $paymentData['discount'] = min($request->discount, $sub_total);
            $netAmount = $sub_total - $request->discount;
            
            // Calculate tax if payment mode is Card
            if ($request->payment_mode === 'Card' && $netAmount >= $taxThreshold) {
                $paymentData['tax'] = round($netAmount * ($taxPercent / 100));
                $paymentData['tax_percentage'] = $taxPercent;
            } else {
                $paymentData['tax'] = 0;
                $paymentData['tax_percentage'] = 0;
            }

            $paymentData['total'] = $netAmount;
            
            // Add doctor's information for service charges
            if ($patient->doctor) {
                $paymentData['doctor_id'] = $patient->doctor->id;
                $paymentData['doctor_name'] = $patient->doctor->name;
                $paymentData['doctor_department_name'] = $patient->doctor->department->name;
            }
        }

        if ($request->type === 'Appointment Charges') {
            // Get doctor information
            $doctor = $request->doctor_id ? Doctor::findOrFail($request->doctor_id) : $patient->doctor;
            
            $discount = min($request->discount, $doctor->doctor_charges);
            $netAmount = $doctor->doctor_charges - $discount;

            // Calculate tax if payment mode is Card
            if ($request->payment_mode === 'Card' && $netAmount >= $taxThreshold) {
                $paymentData['tax'] = round($netAmount * ($taxPercent / 100));
                $paymentData['tax_percentage'] = $taxPercent;
            } else {
                $paymentData['tax'] = 0;
                $paymentData['tax_percentage'] = 0;
            }

            $paymentData['doctor_id'] = $doctor->id;
            $paymentData['doctor_name'] = $doctor->name;
            $paymentData['doctor_department_name'] = $doctor->department->name;
            $paymentData['sub_total'] = $doctor->doctor_charges;
            $paymentData['discount'] = $discount;
            $paymentData['total'] = $netAmount;

            $paymentData['doctor_charges'] = $doctor->doctor_charges;
            $paymentData['doctor_portion'] = $doctor->doctor_portion;
            $paymentData['clinic_portion'] = $doctor->clinic_portion;
        }

        $payment = Payment::create($paymentData);

        if (!empty($paymentServiceData)) {
            $payment->services()->createMany($paymentServiceData);
        }

        $invoice_url = route('payments.invoice', $payment->id);

        return response()->json([
            'success' => true,
            'message' => 'Payment created successfully!',
            'redirect_url' => route('payments.index'),
            'invoice_url' => $invoice_url
        ]);
    }

    public function dailyClosing(Request $request)
    {
        if ($request->isMethod('get')) {
            // Handle GET request: Show the form
            return view('payments.dailyClosing');
        }

        if ($request->isMethod('post')) {
            // Validate the input
            $validatedData = $request->validate([
                'date' => [
                    'required',
                    'date',
                    function ($attribute, $value, $fail) {
                        if (strtotime($value) > strtotime(date('Y-m-d'))) {
                            $fail('The date cannot be greater than today.');
                        }
                    },
                ],
            ]);

            $date = $validatedData['date'];

            // Check if the date exists in payments
            $paymentsOnDate = Payment::whereDate('created_at', $date)->get();

            if ($paymentsOnDate->isEmpty()) {
                return redirect()->back()->withErrors(['date' => 'No payments found for the selected date.']);
            }

            // Set `closed` to true for all payments on the selected date
            Payment::whereDate('created_at', $date)->update(['closed' => true]);

            return redirect()->route('payments.dailyClosing')->with('success', 'Daily closing completed successfully!');
        }
    }

    // Display a specific payment
    public function show(Payment $payment)
    {
        $payment->load('services');
        return view('payments.show', compact('payment'));
    }

    // Refund a payment
    public function refund(Payment $payment)
    {
        if ($payment->closed) {
            return redirect()->route('payments.index')->with('error', 'This payment is closed and cannot be refunded.');
        }

        if ($payment->refunded) {
            return redirect()->route('payments.index')->with('error', 'This payment has already been refunded.');
        }

        // Mark the payment as refunded
        $payment->update(['refunded' => true]);

        return redirect()->route('payments.index')->with('success', 'Payment refunded successfully!');
    }

    public function generateInvoice(Payment $payment)
    {
        $payment->load('patient', 'services');
        $settings = \App\Models\Setting::first();

        session(['redirect_back_url' => route('payments.index')]);

        // return view('invoices.payment_invoice', compact('payment'));

        $pdf = Pdf::loadView('invoices.payment_invoice', compact('payment', 'settings'));
        
        return $pdf->stream('invoice-' . $payment->id . '.pdf');
    }

    public function getServicesByDepartment(Department $department)
    {
        try {
            $services = $department->services()
                ->select('id', 'name', 'charges')
                ->get();

            return response()->json($services);
        } catch (\Exception $e) {
            Log::error('Error fetching services for department: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch services'], 500);
        }
    }

    public function viewChargeDetails(Request $request, Patient $patient, $type)
    {
        // Get all departments and services with a direct approach
        $departments = Department::all()->keyBy('id');
        $services = Service::all();

        // Get settings for tax percentage
        $settings = \App\Models\Setting::first();

        // Manually prepare grouped structure
        $groupedServices = [];

        foreach ($services as $service) {
            $deptName = 'Uncategorized';

            if ($service->department_id && isset($departments[$service->department_id])) {
                $deptName = $departments[$service->department_id]->name;
            }

            if (!isset($groupedServices[$deptName])) {
                $groupedServices[$deptName] = [];
            }

            $groupedServices[$deptName][] = $service;
        }

        // Sort departments alphabetically but keep 'Uncategorized' at the end
        uksort($groupedServices, function ($a, $b) {
            if ($a === 'Uncategorized') return 1;
            if ($b === 'Uncategorized') return -1;
            return $a <=> $b;
        });

        // Get all doctors for the doctor selection dropdown
        $doctors = Doctor::all();

        return view('payments.viewChargeDetails', compact('patient', 'type', 'groupedServices', 'doctors', 'settings'));
    }
}
