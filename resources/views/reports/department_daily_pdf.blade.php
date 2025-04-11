<!DOCTYPE html>
<html>
<head>
    <title>Department Daily Collection Report</title>
    <style>
        body { 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 11px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px;
            table-layout: fixed;
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 6px; 
            text-align: center;
            overflow: visible;
            white-space: normal;
            word-wrap: break-word;
        }
        th { 
            background-color: #f4f4f4; 
            font-weight: bold;
        }
        .total-row { 
            font-weight: bold; 
            background-color: #f8f8f8; 
        }
        .header { 
            margin-bottom: 1rem; 
            text-align: center;
        }
        .note {
            font-style: italic;
            text-align: center;
            margin-top: 10px;
            font-size: 10px;
        }
        
        /* Column widths for single department */
        .single-department th:nth-child(1), .single-department td:nth-child(1) { width: 35%; } /* Service Name */
        .single-department th:nth-child(2), .single-department td:nth-child(2),
        .single-department th:nth-child(3), .single-department td:nth-child(3),
        .single-department th:nth-child(4), .single-department td:nth-child(4),
        .single-department th:nth-child(5), .single-department td:nth-child(5) { width: 13%; } /* Payment modes */
        .single-department th:nth-child(6), .single-department td:nth-child(6) { width: 13%; } /* Total */

        /* Column widths for all departments */
        .all-departments th:nth-child(1), .all-departments td:nth-child(1) { width: 20%; } /* Department Name */
        .all-departments th:nth-child(2), .all-departments td:nth-child(2) { width: 20%; } /* Service Name */
        .all-departments th:nth-child(3), .all-departments td:nth-child(3),
        .all-departments th:nth-child(4), .all-departments td:nth-child(4),
        .all-departments th:nth-child(5), .all-departments td:nth-child(5),
        .all-departments th:nth-child(6), .all-departments td:nth-child(6) { width: 12%; } /* Payment modes */
        .all-departments th:nth-child(7), .all-departments td:nth-child(7) { width: 12%; } /* Total */
        
        /* Department row styling */
        .department-row {
            background-color: #f0f0f0;
        }
        
        /* Print specific styles */
        @media print {
            body {
                font-size: 10px;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            table { page-break-inside: auto; }
            tr { page-break-inside: avoid; page-break-after: auto; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h3 style="text-align: center; margin: 10px 0;">Department Daily Collection Report</h3>
        <p style="text-align: center; margin: 5px 0;">Date: {{ date('d M Y', strtotime($date)) }} ({{ $day }})</p>
        <p style="text-align: center; margin: 5px 0;">Department: {{ $all_departments ? 'All Departments' : ($department->name ?? 'N/A') }}</p>
    </div>

    @if($all_departments)
    <table class="all-departments">
        <thead>
            <tr>
                <th>Department</th>
                <th>Service</th>
                <th>Cash</th>
                <th>Credit Card</th>
                <th>Online</th>
                <th>Pay Order</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                // Group payments by department for better display
                $paymentsByDepartment = $payments->groupBy('department_name')->sortKeys();
                $servicesCount = [];
                
                // Count services per department for rowspan
                foreach($paymentsByDepartment as $deptName => $deptPayments) {
                    $servicesCount[$deptName] = $deptPayments->count();
                }
            @endphp
            
            @foreach($paymentsByDepartment as $deptName => $deptPayments)
                @php $firstService = true; @endphp
                
                @foreach($deptPayments->sortBy('service_name') as $index => $payment)
                <tr @if($index % 2 == 0) class="department-row" @endif>
                    @if($firstService)
                        <td rowspan="{{ $servicesCount[$deptName] }}">{{ $deptName }}</td>
                        @php $firstService = false; @endphp
                    @endif
                    <td>{{ $payment->service_name }}</td>
                    <td>{{ number_format($payment->cash, 0) }}</td>
                    <td>{{ number_format($payment->card, 0) }}</td>
                    <td>{{ number_format($payment->online, 0) }}</td>
                    <td>{{ number_format($payment->pay_order, 0) }}</td>
                    <td>{{ number_format($payment->total, 0) }}</td>
                </tr>
                @endforeach
            @endforeach
            
            <tr class="total-row">
                <td colspan="2">Grand Total</td>
                <td>{{ number_format($totals['cash'], 0) }}</td>
                <td>{{ number_format($totals['card'], 0) }}</td>
                <td>{{ number_format($totals['online'], 0) }}</td>
                <td>{{ number_format($totals['pay_order'], 0) }}</td>
                <td>{{ number_format($totals['total'], 0) }}</td>
            </tr>
        </tbody>
    </table>
    @else
    <table class="single-department">
        <thead>
            <tr>
                <th>Service</th>
                <th>Cash</th>
                <th>Credit Card</th>
                <th>Online</th>
                <th>Pay Order</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments->sortBy('service_name') as $index => $payment)
            <tr @if($index % 2 == 0) class="department-row" @endif>
                <td>{{ $payment->service_name }}</td>
                <td>{{ number_format($payment->cash, 0) }}</td>
                <td>{{ number_format($payment->card, 0) }}</td>
                <td>{{ number_format($payment->online, 0) }}</td>
                <td>{{ number_format($payment->pay_order, 0) }}</td>
                <td>{{ number_format($payment->total, 0) }}</td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td>Total</td>
                <td>{{ number_format($totals['cash'], 0) }}</td>
                <td>{{ number_format($totals['card'], 0) }}</td>
                <td>{{ number_format($totals['online'], 0) }}</td>
                <td>{{ number_format($totals['pay_order'], 0) }}</td>
                <td>{{ number_format($totals['total'], 0) }}</td>
            </tr>
        </tbody>
    </table>
    @endif
</body>
</html> 