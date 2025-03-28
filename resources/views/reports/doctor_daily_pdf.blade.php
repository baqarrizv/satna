<!DOCTYPE html>
<html>
<head>
    <title>Doctor Daily Collection Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .total-row { font-weight: bold; background-color: #f8f8f8; }
        .header { margin-bottom: 3rem; }
    </style>
</head>
<body style="font-size: 0.875rem">
    <div class="header">
        <h3 style="text-align: center;">Doctor Daily Collection Report</h3>
        <p style="text-align: center;">Date: {{ date('d M Y', strtotime($date)) }} ({{ $day }})</p>
        <p style="text-align: center;">
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
                <th>Online</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->patient_name }}</td>
                <td>{{ $payment->cash ?: '-' }}</td>
                <td>{{ $payment->cc ?: '-' }}</td>
                <td>{{ $payment->online ?: '-' }}</td>
                <td>{{ $payment->total }}</td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td>Total</td>
                <td>{{ $totals['cash'] }}</td>
                <td>{{ $totals['cc'] }}</td>
                <td>{{ $totals['online'] }}</td>
                <td>{{ $totals['total'] }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html> 