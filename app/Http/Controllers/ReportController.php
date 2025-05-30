<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentService;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Doctor;

class ReportController extends Controller
{
    public function generateDailyCollectionReport(Request $request)
    {
        $date = $request->input('date', now()->format('Y-m-d'));

        // Fetch doctor charges from `payments` - Only fetch records with doctor_charges > 0 for appointment charges
        $doctorPayments = Payment::whereDate('created_at', $date)
            ->where('doctor_charges', '>', 0) // Only appointment charges
            ->where('refunded', 0)
            ->select(
                'doctor_department_name',
                'doctor_name',
                DB::raw('SUM(CASE WHEN payment_mode = "Cash" THEN total ELSE 0 END) as cash'),
                DB::raw('SUM(CASE WHEN payment_mode = "Card" THEN total ELSE 0 END) as card'),
                DB::raw('SUM(CASE WHEN payment_mode = "Online" THEN total ELSE 0 END) as online'),
                DB::raw('SUM(CASE WHEN payment_mode = "Pay Order" THEN total ELSE 0 END) as pay_order'),
                DB::raw('SUM(CASE WHEN payment_mode = "Deposit" THEN total ELSE 0 END) as deposit'),
                DB::raw('SUM(total) as total')
            )
            ->groupBy('doctor_department_name', 'doctor_name')
            ->orderBy('doctor_department_name')
            ->get();

        // Fetch service payments directly from payments table - These are records with doctor_charges = 0
        $directServicePayments = Payment::whereDate('created_at', $date)
            ->where('doctor_charges', '=', 0) // Only service charges from payments table
            ->where('refunded', 0)
            ->whereNotIn('id', function($query) {
                $query->select('payment_id')
                    ->from('payment_services')
                    ->whereNotNull('payment_id');
            }) // Exclude payments that have associated services in payment_services table
            ->select(
                'doctor_department_name as department_name',
                DB::raw('"Service Charges" as service_name'),
                DB::raw('SUM(CASE WHEN payment_mode = "Cash" THEN total ELSE 0 END) as cash'),
                DB::raw('SUM(CASE WHEN payment_mode = "Card" THEN total ELSE 0 END) as card'),
                DB::raw('SUM(CASE WHEN payment_mode = "Online" THEN total ELSE 0 END) as online'),
                DB::raw('SUM(CASE WHEN payment_mode = "Pay Order" THEN total ELSE 0 END) as pay_order'),
                DB::raw('SUM(CASE WHEN payment_mode = "Deposit" THEN total ELSE 0 END) as deposit'),
                DB::raw('SUM(total) as total')
            )
            ->groupBy('doctor_department_name')
            ->orderBy('doctor_department_name')
            ->get();

        // Fetch services data from `payment_services` (this will be used in addition to direct service payments)
        $servicePayments = PaymentService::whereHas('payment', function ($query) use ($date) {
            $query->whereDate('created_at', $date)
            ->where('refunded', 0);
        })
            ->join('payments', 'payment_services.payment_id', '=', 'payments.id')
            ->select(
                'payment_services.department_name',
                'payment_services.service_name',
                DB::raw('SUM(CASE WHEN payments.payment_mode = "Cash" THEN payment_services.charges ELSE 0 END) as cash'),
                DB::raw('SUM(CASE WHEN payments.payment_mode = "Card" THEN payment_services.charges ELSE 0 END) as card'),
                DB::raw('SUM(CASE WHEN payments.payment_mode = "Online" THEN payment_services.charges ELSE 0 END) as online'),
                DB::raw('SUM(CASE WHEN payments.payment_mode = "Pay Order" THEN payment_services.charges ELSE 0 END) as pay_order'),
                DB::raw('SUM(CASE WHEN payments.payment_mode = "Deposit" THEN payment_services.charges ELSE 0 END) as deposit'),
                DB::raw('SUM(payment_services.charges) as total')
            )
            ->groupBy('payment_services.department_name', 'payment_services.service_name')
            ->orderBy('payment_services.department_name', 'asc')
            ->orderBy('payment_services.service_name', 'asc')
            ->get();

        // Structure the data by revenue streams
        $revenueStreams = [];

        $total = [
            'cash' => 0,
            'card' => 0,
            'online' => 0,
            'pay_order' => 0,
            'deposit' => 0,
            'total' => 0,
            'tax' => 0
        ];

        // Add doctor payments to revenue streams (appointment charges)
        foreach ($doctorPayments as $payment) {
            $department = $payment->doctor_department_name ?: 'N/A';
            if (!isset($revenueStreams[$department])) {
                $revenueStreams[$department] = [];
            }

            $revenueStreams[$department][] = [
                'service' => 'Consultation Fee',
                'name' => $payment->doctor_name ?: '-',
                'cash' => $payment->cash ?: '-',
                'card' => $payment->card ?: '-',
                'online' => $payment->online ?: '-',
                'pay_order' => $payment->pay_order ?: '-',
                'deposit' => $payment->deposit ?: '-',
                'amount' => $payment->total ?: '-',
            ];

            $total['cash'] += $payment->cash ?? 0;
            $total['card'] += $payment->card ?? 0;
            $total['online'] += $payment->online ?? 0;
            $total['pay_order'] += $payment->pay_order ?? 0;
            $total['deposit'] += $payment->deposit ?? 0;
            $total['total'] += $payment->total ?? 0;
        }

        // Add direct service payments to revenue streams
        foreach ($directServicePayments as $service) {
            $department = $service->department_name ?: 'N/A';
            if (!isset($revenueStreams[$department])) {
                $revenueStreams[$department] = [];
            }

            // Only add direct service payments if they're not already included in detailed service payments
            $serviceExists = false;
            foreach ($servicePayments as $detailedService) {
                if ($detailedService->department_name == $service->department_name) {
                    $serviceExists = true;
                    break;
                }
            }

            if (!$serviceExists) {
                $revenueStreams[$department][] = [
                    'service' => 'Service Charges',
                    'name' => '-', // No doctor name for service payments
                    'cash' => $service->cash ?: '-',
                    'card' => $service->card ?: '-',
                    'online' => $service->online ?: '-',
                    'pay_order' => $service->pay_order ?: '-',
                    'deposit' => $service->deposit ?: '-',
                    'amount' => $service->total ?: '-',
                ];

                $total['cash'] += $service->cash ?? 0;
                $total['card'] += $service->card ?? 0;
                $total['online'] += $service->online ?? 0;
                $total['pay_order'] += $service->pay_order ?? 0;
                $total['deposit'] += $service->deposit ?? 0;
                $total['total'] += $service->total ?? 0;
            }
        }

        // Add service payments to revenue streams (from payment_services table)
        foreach ($servicePayments as $service) {
            $department = $service->department_name ?: 'N/A';
            if (!isset($revenueStreams[$department])) {
                $revenueStreams[$department] = [];
            }

            // Include detailed service entries
            $revenueStreams[$department][] = [
                'service' => $service->service_name,
                'name' => '-', // No doctor name for service payments
                'cash' => $service->cash ?: '-',
                'card' => $service->card ?: '-',
                'online' => $service->online ?: '-',
                'pay_order' => $service->pay_order ?: '-',
                'deposit' => $service->deposit ?: '-',
                'amount' => $service->total ?: '-',
            ];

            $total['cash'] += $service->cash ?? 0;
            $total['card'] += $service->card ?? 0;
            $total['online'] += $service->online ?? 0;
            $total['pay_order'] += $service->pay_order ?? 0;
            $total['deposit'] += $service->deposit ?? 0;
            $total['total'] += $service->total ?? 0;
        }

        // Now also fetch total tax from card payments
        $cardTax = Payment::whereDate('created_at', $date)
            ->where('payment_mode', 'Card')
            ->sum('tax');
            
        $total['tax'] = $cardTax;

        // Generate PDF
        $data = [
            'total' => $total,
            'revenueStreams' => $revenueStreams,
            'date' => $date,
            'day' => date('l', strtotime($date))
        ];

        $pdf = Pdf::loadView('reports.daily_collection', $data);

        return $pdf->stream('daily_collection_' . $date . '.pdf');
    }

    public function doctorDailyReportForm()
    {
        $doctors = Doctor::all();
        return view('reports.doctor_daily_form', compact('doctors'));
    }

    public function dailyCollectionReportForm()
    {
        return view('reports.collection_form');
    }

    public function generateDoctorDailyReport(Request $request)
    {
        $date = $request->input('date', now()->format('Y-m-d'));
        $doctor = $request->input('doctor_id');

        if (!$doctor) {
            return redirect()->back()->with('error', 'Please select a doctor');
        }

        // First, get all payment IDs that have associated services
        $paymentIdsWithServices = PaymentService::select('payment_id')->distinct()->pluck('payment_id')->toArray();
        // Get all payments for the doctor on the specified date
        $payments = Payment::whereDate('payments.created_at', $date)
            ->where('payments.doctor_id', $doctor)
            ->where('payments.refunded', 0)
            ->whereNotIn('payments.id', $paymentIdsWithServices) // Only include payments without associated services
            ->where('doctor_charges', '>', 0) // Ensure it's an appointment charge (doctor_charges > 0)
            ->join('patients', 'payments.patient_id', '=', 'patients.id')
            ->select(
                'payments.id',
                'patients.patient_name as patient_name',
                DB::raw('CASE WHEN payments.payment_mode = "Cash" THEN payments.total ELSE 0 END as cash'),
                DB::raw('CASE WHEN payments.payment_mode = "Card" THEN payments.total ELSE 0 END as card'),
                DB::raw('CASE WHEN payments.payment_mode = "Online" THEN payments.total ELSE 0 END as online'),
                DB::raw('CASE WHEN payments.payment_mode = "Pay Order" THEN payments.total ELSE 0 END as pay_order'),
                DB::raw('CASE WHEN payments.payment_mode = "Deposit" THEN payments.total ELSE 0 END as deposit'),
                'payments.total',
                'payments.tax',
                'payments.doctor_charges',  // Added to distinguish appointment charges
                'payments.created_at'
            )
            ->orderBy('payments.created_at')
            ->get();

        $totals = [
            'cash' => $payments->sum('cash'),
            'card' => $payments->sum('card'),
            'online' => $payments->sum('online'),
            'pay_order' => $payments->sum('pay_order'),
            'deposit' => $payments->sum('deposit'),
            'total' => $payments->sum('total'),
            'tax' => $payments->where('payment_mode', 'Card')->sum('tax')
        ];

        $doctor_details = Doctor::find($doctor);

        $data = [
            'payments' => $payments,
            'totals' => $totals,
            'date' => $date,
            'doctor' => $doctor_details,
            'day' => date('l', strtotime($date))
        ];

        $pdf = Pdf::loadView('reports.doctor_daily_pdf', $data);
        return $pdf->stream('doctor_daily_collection_' . $date . '.pdf');
    }

    public function departmentDailyReportForm()
    {
        // Get all departments
        $departments = DB::table('departments')->get();
        return view('reports.department_daily_form', compact('departments'));
    }

    public function generateDepartmentDailyReport(Request $request)
    {
        $date = $request->input('date', now()->format('Y-m-d'));
        $department_id = $request->input('department_id');

        if (!$department_id) {
            return redirect()->back()->with('error', 'Please select a department');
        }

        $all_departments = $department_id === 'all';
        $department = null;

        // Get department details if not showing all departments
        if (!$all_departments) {
            $department = DB::table('departments')->where('id', $department_id)->first();

            if (!$department) {
                return redirect()->back()->with('error', 'Department not found');
            }
        }

        // Get all payments for services based on the department selection
        if ($all_departments) {
            // When selecting all departments, include the department_name in results
            $servicePayments = PaymentService::whereHas('payment', function($query) use ($date) {
                    $query->whereDate('created_at', $date)
                        ->where('refunded', 0);
                })
                ->join('payments', 'payment_services.payment_id', '=', 'payments.id')
                ->select(
                    DB::raw('COALESCE(payment_services.department_name, "Unknown Department") as department_name'),
                    'payment_services.service_name',
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Cash" THEN payment_services.charges ELSE 0 END) as cash'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Card" THEN payment_services.charges ELSE 0 END) as card'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Online" THEN payment_services.charges ELSE 0 END) as online'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Pay Order" THEN payment_services.charges ELSE 0 END) as pay_order'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Deposit" THEN payment_services.charges ELSE 0 END) as deposit'),
                    DB::raw('SUM(payment_services.charges) as total')
                )
                ->groupBy('payment_services.department_name', 'payment_services.service_name')
                ->orderBy('payment_services.department_name', 'asc')
                ->orderBy('payment_services.service_name', 'asc')
                ->get();

            // Diagnostic check - add these lines to log any issues
            Log::info('Service Payments Count: ' . $servicePayments->count());
            if ($servicePayments->count() > 0) {
                Log::info('Sample Service Payment: ' . json_encode($servicePayments->first()));
            }

            // For all departments, get consultations with department information
            $appointmentPayments = Payment::whereDate('payments.created_at', $date)
                ->where('payments.refunded', 0)
                ->where('payments.doctor_charges', '>', 0)
                ->whereNotNull('payments.doctor_id')
                ->leftJoin('doctors', 'payments.doctor_id', '=', 'doctors.id')
                ->leftJoin('departments', 'doctors.department_id', '=', 'departments.id')
                ->select(
                    DB::raw('COALESCE(departments.name, payments.doctor_department_name, "Unknown Department") as department_name'),
                    DB::raw('"Consultation Fee" as service_name'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Cash" THEN payments.total ELSE 0 END) as cash'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Card" THEN payments.total ELSE 0 END) as card'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Online" THEN payments.total ELSE 0 END) as online'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Pay Order" THEN payments.total ELSE 0 END) as pay_order'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Deposit" THEN payments.total ELSE 0 END) as deposit'),
                    DB::raw('SUM(payments.total) as total')
                )
                ->groupBy(DB::raw('COALESCE(departments.name, payments.doctor_department_name, "Unknown Department")'))
                ->get();

            // Diagnostic check
            Log::info('Appointment Payments Count: ' . $appointmentPayments->count());
            if ($appointmentPayments->count() > 0) {
                Log::info('Sample Appointment Payment: ' . json_encode($appointmentPayments->first()));
            }
        } else {
            // When selecting a specific department
            $servicePayments = PaymentService::where('department_name', $department->name)
                ->whereHas('payment', function($query) use ($date) {
                    $query->whereDate('created_at', $date)
                        ->where('refunded', 0);
                })
                ->join('payments', 'payment_services.payment_id', '=', 'payments.id')
                ->select(
                    DB::raw("'{$department->name}' as department_name"),
                    'payment_services.service_name',
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Cash" THEN payment_services.charges ELSE 0 END) as cash'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Card" THEN payment_services.charges ELSE 0 END) as card'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Online" THEN payment_services.charges ELSE 0 END) as online'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Pay Order" THEN payment_services.charges ELSE 0 END) as pay_order'),
                    DB::raw('SUM(CASE WHEN payments.payment_mode = "Deposit" THEN payment_services.charges ELSE 0 END) as deposit'),
                    DB::raw('SUM(payment_services.charges) as total')
                )
                ->groupBy('payment_services.service_name')
                ->orderBy('payment_services.service_name')
                ->get();

            // Initialize appointmentPayments as an empty collection
            $appointmentPayments = collect();
        }

        // Combine service payments and appointment payments
        $payments = $servicePayments->concat($appointmentPayments);

        // Diagnostic check
        Log::info('Total Combined Payments Count: ' . $payments->count());

        // Calculate totals
        $totals = [
            'cash' => $payments->sum('cash'),
            'card' => $payments->sum('card'),
            'online' => $payments->sum('online'),
            'pay_order' => $payments->sum('pay_order'),
            'deposit' => $payments->sum('deposit'),
            'total' => $payments->sum('total'),
            'tax' => 0 // We don't track tax per department, so initialize to 0
        ];

        // Add tax from card payments if needed
        if ($all_departments) {
            $cardTax = Payment::whereDate('created_at', $date)
                ->where('payment_mode', 'Card')
                ->sum('tax');
        } else {
            $cardTax = Payment::whereDate('created_at', $date)
                ->where('payment_mode', 'Card')
                ->whereHas('doctor', function($query) use ($department_id) {
                    $query->where('department_id', $department_id);
                })
                ->sum('tax');
        }
        
        $totals['tax'] = $cardTax;

        $data = [
            'payments' => $payments,
            'totals' => $totals,
            'date' => $date,
            'department' => $department,
            'all_departments' => $all_departments,
            'day' => date('l', strtotime($date))
        ];

        $pdf = Pdf::loadView('reports.department_daily_pdf', $data);
        return $pdf->stream('department_daily_collection_' . $date . '.pdf');
    }
}
