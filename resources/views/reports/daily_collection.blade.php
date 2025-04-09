<!DOCTYPE html>
<html>
<head>
    <title>Daily Collection View</title>
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
            margin-bottom: 20px;
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
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        /* Column widths */
        th:nth-child(1), td:nth-child(1) { width: 10%; } /* Revenue Streams */
        th:nth-child(2), td:nth-child(2) { width: 12%; } /* Service */
        th:nth-child(3), td:nth-child(3) { width: 12%; } /* Consultants */
        th:nth-child(4), td:nth-child(4),
        th:nth-child(5), td:nth-child(5),
        th:nth-child(6), td:nth-child(6),
        th:nth-child(7), td:nth-child(7),
        th:nth-child(8), td:nth-child(8) { width: 12%; } /* Payment modes */
        th:nth-child(9), td:nth-child(9) { width: 10%; } /* Amount */
        
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
        <h3 style="text-align: center; margin: 10px 0;">Daily Collection</h3>
        <p style="text-align: center; margin: 5px 0;">{{ $day }} : {{ $date }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Revenue Streams</th>
                <th>Service</th>
                <th>Consultants</th>
                <th>Cash</th>
                <th>Card</th>
                <th>Pay Order</th>
                <th>Online</th>
                <th>Deposit</th>
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
                            <td>{{ $item['service'] ?? '-' }}</td>
                            <td>{{ $item['name'] ?? '-' }}</td>
                            <td>{{ number_format($item['cash'] ?? 0, 2) }}</td>
                            <td>{{ number_format($item['card'] ?? 0, 2) }}</td>
                            <td>{{ number_format($item['pay_order'] ?? 0, 2) }}</td>
                            <td>{{ number_format($item['online'] ?? 0, 2) }}</td>
                            <td>{{ number_format($item['deposit'] ?? 0, 2) }}</td>
                            <td>{{ number_format($item['amount'] ?? 0, 2) }}</td>
                        </tr>
                    @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: center; font-weight: bold;">Total</td>
                <td>{{ number_format($total['cash'] ?? 0, 2) }}</td>
                <td>{{ number_format($total['card'] ?? 0, 2) }}</td>
                <td>{{ number_format($total['pay_order'] ?? 0, 2) }}</td>
                <td>{{ number_format($total['online'] ?? 0, 2) }}</td>
                <td>{{ number_format($total['deposit'] ?? 0, 2) }}</td>
                <td>{{ number_format($total['total'] ?? 0, 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
