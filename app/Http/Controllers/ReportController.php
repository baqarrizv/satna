<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentService;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Doctor;

class ReportController extends Controller
{
    public function generateDailyCollectionReport(Request $request)
    {
        $date = $request->input('date', now()->format('Y-m-d'));
            
        // Fetch doctor charges from `payments`
        $doctorPayments = Payment::whereDate('created_at', $date)
            ->select(
                'doctor_department_name',
                'doctor_name',
                DB::raw('SUM(CASE WHEN payment_mode = "Cash" THEN total ELSE 0 END) as cash'),
                DB::raw('SUM(CASE WHEN payment_mode = "CC" THEN total ELSE 0 END) as cc'),
                DB::raw('SUM(CASE WHEN payment_mode = "Online" THEN total ELSE 0 END) as online'),
                DB::raw('SUM(total) as total')
            )
            ->groupBy('doctor_department_name', 'doctor_name')
            ->orderBy('doctor_department_name')
            ->get();
    
        // Fetch services data from `payment_services`
        $servicePayments = PaymentService::whereHas('payment', function ($query) use ($date) {
            $query->whereDate('created_at', $date);
        })
        ->select(
            'department_name',
            'service_name',
            DB::raw('SUM(charges) as total')
        )
        ->groupBy('department_name', 'service_name')
        ->orderBy('department_name')
        ->get();
    
        // Structure the data by revenue streams
        $revenueStreams = [];
    
        $total = [
            'cash' => 0,
            'cc' => 0,
            'online' => 0,
            'total' => 0
        ];
        // Add doctor payments to revenue streams
        foreach ($doctorPayments as $payment) {
            $department = $payment->doctor_department_name ?: 'N/A';
            if (!isset($revenueStreams[$department])) {
                $revenueStreams[$department] = [];
            }
    
            $revenueStreams[$department][] = [
                'service' => 'Consultation Fee',
                'name' => $payment->doctor_name ?: '-',
                'cash' => $payment->cash ?: '-',
                'cc' => $payment->cc ?: '-',
                'online' => $payment->online ?: '-',
                'amount' => $payment->total ?: '-',
            ];

            $total['cash'] += $payment->cash ?? 0;
            $total['cc'] += $payment->cc ?? 0;
            $total['online'] += $payment->online ?? 0;
            $total['total'] += $payment->total ?? 0;
        }
    
        // Add service payments to revenue streams
        foreach ($servicePayments as $service) {
            $department = $service->department_name ?: 'N/A';
            if (!isset($revenueStreams[$department])) {
                $revenueStreams[$department] = [];
            }
    
            $revenueStreams[$department][] = [
                'service' => $service->service_name,
                'name' => $payment->doctor_name ?: '-',                
                'cash' => '-', // No breakdown by payment mode for services
                'cc' => '-',
                'online' => '-',
                'amount' => $service->total ?: '-',
            ];

            $total['total'] += $service->total;
        }
    
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

    public function generateDoctorDailyReport(Request $request)
    {
        $date = $request->input('date', now()->format('Y-m-d'));
        $doctor = $request->input('doctor_id');
        
        if (!$doctor) {
            return redirect()->back()->with('error', 'Please select a doctor');
        }

        $payments = Payment::whereDate('payments.created_at', $date)
            ->where('doctor_id', $doctor)
            ->join('patients', 'payments.patient_id', '=', 'patients.id')
            ->select(
                'patients.patient_name as patient_name',
                DB::raw('SUM(CASE WHEN payments.payment_mode = "Cash" THEN payments.total ELSE 0 END) as cash'),
                DB::raw('SUM(CASE WHEN payments.payment_mode = "CC" THEN payments.total ELSE 0 END) as cc'),
                DB::raw('SUM(CASE WHEN payments.payment_mode = "Online" THEN payments.total ELSE 0 END) as online'),
                DB::raw('SUM(payments.total) as total')
            )
            ->groupBy('patient_name')
            ->get();

        $totals = [
            'cash' => $payments->sum('cash'),
            'cc' => $payments->sum('cc'),
            'online' => $payments->sum('online'),
            'total' => $payments->sum('total')
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
}
