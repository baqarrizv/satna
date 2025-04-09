<!DOCTYPE html>
<html>
<head>
    <title>Doctor Daily Collection Report</title>
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
        
        /* Column widths */
        th:nth-child(1), td:nth-child(1) { width: 30%; } /* Patient Name */
        th:nth-child(2), td:nth-child(2),
        th:nth-child(3), td:nth-child(3),
        th:nth-child(4), td:nth-child(4),
        th:nth-child(5), td:nth-child(5) { width: 14%; } /* Payment modes */
        th:nth-child(6), td:nth-child(6) { width: 14%; } /* Total */
        
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
        <h3 style="text-align: center; margin: 10px 0;">Doctor Daily Collection Report</h3>
        <p style="text-align: center; margin: 5px 0;">Date: {{ date('d M Y', strtotime($date)) }} ({{ $day }})</p>
        <p style="text-align: center; margin: 5px 0;">
            <span style="float: left; min-width: 50%;"> Doctor: {{ $doctor->name }}</span> 
            <span style="float: right; min-width: 50%;"> Department: {{ $doctor->department->name ?? 'N/A' }}</span>
        </p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Cash</th>
                <th>Credit Card</th>
                <th>Pay Order</th>
                <th>Deposit</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->patient_name }}</td>
                <td>{{ number_format($payment->cash, 2) }}</td>
                <td>{{ number_format($payment->card, 2) }}</td>
                <td>{{ number_format($payment->pay_order, 2) }}</td>
                <td>{{ number_format($payment->deposit, 2) }}</td>
                <td>{{ number_format($payment->total, 2) }}</td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td>Total</td>
                <td>{{ number_format($totals['cash'], 2) }}</td>
                <td>{{ number_format($totals['card'], 2) }}</td>
                <td>{{ number_format($totals['pay_order'], 2) }}</td>
                <td>{{ number_format($totals['deposit'], 2) }}</td>
                <td>{{ number_format($totals['total'], 2) }}</td>
            </tr>
            <!-- <tr>
                <td>Tax from Card Payments</td>
                <td>-</td>
                <td>{{ number_format($totals['tax'], 2) }}</td>
                <td>-</td>
                <td>-</td>
                <td>{{ number_format($totals['tax'], 2) }}</td>
            </tr> -->
        </tbody>
    </table>
</body>
</html> 