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
        }

        .logo-section img {
            max-height: 60px;
            object-fit: contain;
        }

        .company-info {
            flex: 1;
            text-align: right;
        }

        .invoice-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
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
<body style="font-family: 'Helvetica', 'Arial', sans-serif; line-height: 1.4; color: #1f2937; background-color: #fff; padding: 2rem; font-size: 0.875rem;">
    <div style="max-width: 800px; margin: 0 auto; padding: 2rem; border: 1px solid #e5e7eb; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
        <!-- Header Section -->
        <table style="width: 100%; margin-bottom: 2rem; border-bottom: 2px solid #e5e7eb;">
            <tr>
                <td style="width: 50%;">
                    <img src="{{ config('settings.logo_light') }}" alt="{{ config('settings.title') }}" style="max-height: 60px; object-fit: contain;">
                    <h1 style="color: #2563eb; font-size: 1.5rem; margin-bottom: 0.5rem;">INVOICE</h1>
                </td>
                <td style="width: 50%; text-align: right;">
                    <h2>{{ config('settings.title') }}</h2>
                    <p>{{ config('settings.phone') }}</p>
                    <p>{{ config('settings.email') }}</p>
                    <p><strong>Invoice #:</strong> {{ $payment->id }}</p>
                    <p><strong>Date:</strong> {{ $payment->created_at->format('d-M-Y') }}</p>
                </td>
            </tr>
        </table>

        <!-- Details Grid -->
        <table style="width: 100%; margin-bottom: 1.5rem;">
            <tr>
                <!-- Patient Information -->
                <td style="padding: 1rem; background-color: #f8fafc; border-radius: 0.5rem; vertical-align: top;">
                    <h3 style="color: #2563eb; margin-bottom: 0.5rem; font-size: 1rem;">Patient Information</h3>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Name</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->patient->patient_name }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Patient ID</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->patient_id }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Contact</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->patient->patient_contact }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">FC-File #</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->fc_number }} {{ $payment->file_number }}</td>
                        </tr>
                    </table>
                </td>

                <!-- Medical Information -->
                <td style="padding: 1rem; background-color: #f8fafc; border-radius: 0.5rem; vertical-align: top;">
                    <h3 style="color: #2563eb; margin-bottom: 0.5rem; font-size: 1rem;">Medical Information</h3>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Doctor</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->doctor_name }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #1e40af; width: 40%;">Payment Mode</th>
                            <td style="padding: 0.5rem; text-align: left; border-bottom: 1px solid #e5e7eb;">{{ $payment->payment_mode }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Payment Details -->
        <table style="width: 100%; margin-top: 1.5rem; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="padding: 0.75rem; background-color: #2563eb; color: white; font-weight: 600;">Description</th>
                    <th style="padding: 0.75rem; background-color: #2563eb; color: white; font-weight: 600; text-align: right;">Amount</th>
                </tr>
            </thead>
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
                <tr>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Discount</td>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; text-align: right;">-{{ number_format($payment->discount, 2) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td style="padding: 0.75rem; background-color: #f8fafc; font-weight: 700;">Total Amount</td>
                    <td style="padding: 0.75rem; background-color: #f8fafc; font-weight: 700; text-align: right;">{{ number_format($payment->total, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- Footer -->
        <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 2px solid #e5e7eb; text-align: center; color: #6b7280; font-size: 0.75rem;">
            <p>Thank you for choosing our services!</p>
            <p>This is a computer-generated invoice. No signature is required.</p>
        </div>
    </div>
</body>
</html>