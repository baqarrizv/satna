<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentService;
use App\Models\Patient;
use App\Models\Service;    
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use DataTables;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $payments = Payment::with('patient');
            
            return Datatables::of($payments)
                ->addIndexColumn()
                ->addColumn('fc_file', function($payment) {
                    return $payment->fc_number . ' ' . $payment->file_number;
                })
                ->addColumn('invoice', function($payment) {
                    return '<a href="' . route('payments.invoice', $payment->id) . '" class="btn btn-sm">
                        <span class="badge rounded-pill bg-warning-subtle text-info font-size-12">Download</span>
                    </a>';
                })
                ->addColumn('action', function($payment) {
                    if(!$payment->closed && !$payment->refunded && auth()->user()->can('Refund Payments')) {
                        return '<form action="' . route('payments.refund', $payment->id) . '" method="POST" style="display:inline-block;">
                            ' . csrf_field() . '
                            ' . method_field('PUT') . '
                            <button type="submit" class="btn btn-sm" onclick="return confirm(\'Are you sure?\')">
                                <span class="badge rounded-pill bg-warning-subtle text-warning font-size-12">Refund</span>
                            </button>
                        </form>';
                    } elseif($payment->refunded) {
                        return '<span class="badge rounded-pill bg-success-subtle text-success font-size-12">Refunded</span>';
                    } else {
                        return '<span class="badge rounded-pill bg-danger-subtle text-danger font-size-12">Closed</span>';
                    }
                })
                ->editColumn('total', function($payment) {
                    return number_format($payment->total, 2);
                })
                ->rawColumns(['invoice', 'action'])
                ->make(true);
        }

        return view('payments.index');
    }

    // Show the form for Adding Charges
    public function addCharges(Request $request)
    {
        if ($request->isMethod('get')) {
            // Handle GET request: Show the form
            return view('payments.addCharges');
        }

        if ($request->isMethod('post')) {
            // Validate the input
            $validatedData = $request->validate([
                'type' => 'required|string',
                'patient' => 'required|string',
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
                return redirect()->route('payments.addCharges')
                    ->withErrors(['patient' => 'Patient not found. Please check the ID or contact number.']);
            }

            $type = $validatedData['type'];  
            
            if ($type === 'Appointment Charges' && empty($patient->doctor->doctor_charges)) {
                return redirect()->route('payments.addCharges')
                    ->withErrors(['patient' => 'Assign a doctor to this patient before adding Appointment Charges']);
            }
            
            $services = Service::all();      
            
            return view('payments.viewChargeDetails', compact('patient', 'type', 'services'));
        }
    }

    // Store a new payment in the database
    public function applyCharges(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'type' => 'required|in:Appointment Charges,Service Charges',
            'discount' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'payment_mode' => 'required|string',
            'remarks' => 'nullable|string'
        ]);
        
        if (!empty($request->services)) {
            $validatedServices = $request->validate([
                'services.*' => 'required|exists:services,id',
                'charges.*' => 'required|numeric|min:0',
            ]);
        }

        $patient = Patient::findOrFail($request->patient_id);
                
        $paymentData = [
            'patient_id' => $patient->id,
            'fc_number' => $patient->fc_number,
            'file_number' => $patient->file_number,
            'payment_mode' => $request->payment_mode,
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
            $paymentData['total'] = $sub_total - $request->discount;
        }

        if ($request->type === 'Appointment Charges') {
            $discount = min($request->discount, $patient->doctor->doctor_charges);
            $total = $patient->doctor->doctor_charges - $discount;            
       
            $paymentData['doctor_name'] = $patient->doctor->name;
            $paymentData['doctor_department_name'] = $patient->doctor->department->name;
            $paymentData['sub_total'] = $patient->doctor->doctor_charges;
            $paymentData['discount'] = $discount;
            $paymentData['total'] = $total;

            $paymentData['doctor_charges'] = $patient->doctor->doctor_charges;            
            $paymentData['doctor_portion'] = $patient->doctor->doctor_portion;
            $paymentData['clinic_portion'] = $patient->doctor->clinic_portion;
        } 
        
        $payment = Payment::create($paymentData);
      
        if (!empty($paymentServiceData)) {         
            $payment->services()->createMany($paymentServiceData);   
        }

        session()->flash('invoice_url', route('payments.invoice', $payment->id));

        // Redirect to payments list with a success message
        return redirect()->route('payments.index')->with('success', 'Payment created successfully!');
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
        
        session(['redirect_back_url' => route('payments.index')]);
        
        // return view('invoices.payment_invoice', compact('payment'));

        $pdf = Pdf::loadView('invoices.payment_invoice', compact('payment'));
        return $pdf->stream('invoice-' . $payment->id . '.pdf');
    }

}
