<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $payment->id }}</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --text-color: #1f2937;
            --border-color: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.4;
            color: var(--text-color);
            background-color: #fff;
            padding: 2rem;
            font-size: 0.875rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--border-color);
        }

        .logo-section {
            flex: 1;
            text-align: center;
        }

        .logo {
            max-width: 200px;
            height: auto;
            margin-bottom: 1rem;
        }

        .invoice-info {
            flex: 1;
            text-align: right;
        }

        .invoice-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-top: 0.5rem;
            text-align: center;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .details-section {
            padding: 1rem;
            background-color: #f8fafc;
            border-radius: 0.5rem;
        }

        .details-section h3 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table th,
        .details-table td {
            padding: 0.5rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .details-table th {
            font-weight: 600;
            color: var(--secondary-color);
            width: 40%;
        }

        .payment-table {
            width: 100%;
            margin-top: 1.5rem;
            border-collapse: collapse;
        }

        .payment-table th,
        .payment-table td {
            padding: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }

        .payment-table thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
        }

        .payment-table tfoot {
            background-color: #f8fafc;
            font-weight: 700;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 2px solid var(--border-color);
            text-align: center;
            color: #6b7280;
            font-size: 0.75rem;
        }

        .logo-img {
            max-height: 80px;
            width: auto;
            display: block;
            margin: 0 auto;
        }

        @media print {
            body {
                padding: 0;
            }

            .container {
                border: none;
                box-shadow: none;
                padding: 0;
            }

            .payment-table thead th {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
        
        }
    </style>
</head>
<body style="font-family: 'Helvetica', 'Arial', sans-serif; line-height: 1.4; color: #1f2937; background-color: #fff; font-size: 0.875rem;">
    <div style="max-width: 100%; margin: 0 auto;">
        <!-- Header Section -->
        <table style="width: 100%; margin-bottom: 1rem; border-bottom: 2px solid #e5e7eb;">
            <tr>
                <td style="text-align: center; padding: 10px 0;">   
                    <img src="{{ public_path(config('settings.logo_light') ? str_replace(asset(''), '', config('settings.logo_light')) : 'assets/images/settings/Setna.jpg') }}" alt="{{ config('settings.title') }}" class="logo-img">
                    <h1 style="color: #2563eb; font-size: 1.5rem; text-align: center; margin-top: 0.5rem;">Payment Slip</h1>
                </td>                
            </tr>
        </table>

        <!-- Details Grid -->
        <table style="width: 100%; margin-bottom: 1.5rem;">
            <tr>
                <!-- Patient Information -->
                <td style="padding: 1rem; background-color: #f8fafc; border-radius: 0.5rem; vertical-align: top;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Date</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->created_at->format('d-M-Y') }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Patient Name</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->patient->patient_name }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Doctor Name</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->doctor_name ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </td>

                <!-- Medical Information -->
                <td style="padding: 1rem; background-color: #f8fafc; border-radius: 0.5rem; vertical-align: top;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Receipt #</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->id }}</td>
                        </tr>                        
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">FC-File #</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->fc_number ?? '' }} {{ $payment->file_number ?? '' }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Payment Method</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->payment_mode }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Receive From</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->receiver_name ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Payment Details -->
        <table style="width: 100%; margin-top: 1.5rem; border-collapse: collapse;">
            <tbody>
                @if ($payment->doctor_charges > 0)
                    <tr>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Doctor Charges</td>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; text-align: right;">{{ number_format($payment->doctor_charges, 2) }}</td>
                    </tr>
                @else
                    @foreach ($payment->services as $service)
                        <tr>
                            <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">{{ $service->service_name }}</td>
                            <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; text-align: right;">{{ number_format($service->charges, 2) }}</td>
                        </tr>
                    @endforeach
                @endif                
            </tbody>
            <tfoot>
                <tr>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: 600;">Sub Total</td>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; text-align: right; font-weight: 600;">{{ number_format($payment->sub_total, 2) }}</td>
                </tr>
                
                @if($payment->discount > 0)
                <tr>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Discount</td>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; text-align: right;">{{ number_format($payment->discount, 2) }}</td>
                </tr>
                @endif
                
                @if($payment->payment_mode === 'Card')
                <tr>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Tax (1.7%)</td>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; text-align: right;">{{ number_format($payment->tax, 2) }}</td>
                </tr>
                @endif
                
                <tr>
                    <td style="padding: 0.75rem; background-color: #f8fafc; font-weight: 700;">Total Amount</td>
                    <td style="padding: 0.75rem; background-color: #f8fafc; font-weight: 700; text-align: right;">
                        @if($payment->payment_mode === 'Card')
                            {{ number_format($payment->total + $payment->tax, 2) }}
                        @else
                            {{ number_format($payment->total, 2) }}
                        @endif
                    </td>
                </tr>
            </tfoot>
        </table>
        
        <!-- Footer -->
        <div style="margin-top: 2rem; text-align: center; font-size: 0.75rem; color: #6b7280;">
            <p>Thank you for choosing Setna Medical Center</p>
        </div>
        
        <!-- Divider line -->
        <hr style="border: 0; border-top: 1px solid black; margin: 1.5rem 0;">
        
        <!-- Print info -->
        <table style="width: 100%; font-size: 0.7rem; color: #6b7280;">
            <tr>
                <td style="text-align: left;">
                    User: {{ Auth::user()->name ?? 'System' }}
                </td>
                <td style="text-align: right;">
                    Created At: {{ $payment->created_at }}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>