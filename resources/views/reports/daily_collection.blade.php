<!DOCTYPE html>
<html>
<head>
    <title>Daily Collection View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body style="font-size: 0.875rem">
    <div class="header">
        <h3 style="text-align: center;">Daily Collection</h3>
        <p style="text-align: center;">{{ $day }} : {{ $date }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Revenue Streams</th>
                <th>Service</th>
                <th>Consultants</th>
                <th>Cash</th>
                <th>CC</th>
                <th>Online</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($revenueStreams as $stream => $details)
                <tr>
                    <td rowspan="{{ count($details) }}">{{ $stream }}</td>
                    @foreach($details as $index => $item)
                        @if ($index > 0)
                            <tr>
                        @endif
                            <td>{{ $item['service'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['cash'] }}</td>
                            <td>{{ $item['cc'] }}</td>
                            <td>{{ $item['online'] }}</td>
                            <td>{{ $item['amount'] }}</td>
                        </tr>
                    @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: center;">Total</td>
                <td>{{ number_format($total['cash'], 2) }}</td>
                <td>{{ number_format($total['cc'], 2) }}</td>
                <td>{{ number_format($total['online'], 2) }}</td>
                <td>{{ number_format($total['total'], 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
