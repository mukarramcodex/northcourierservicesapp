<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Parcel Details</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            margin: 0;
            color: #000;
        }

        .receipt-container {
            border: 1px solid #000;
            padding: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 5px;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        .company-name {
            font-size: 16px;
            font-weight: bold;
        }

        .receipt-number {
            margin-top: 3px;
            font-size: 11px;
            font-weight: bold;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
            font-size: 9px;
        }

        .details-table td {
            padding: 2px;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            width: 70px;
        }

        .section-title {
            font-weight: bold;
            margin: 5px 0 3px 0;
            font-size: 10px;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
            font-size: 9px;
        }

        .items-table th,
        .items-table td {
            border: 1px solid #000;
            padding: 2px;
            text-align: left;
        }

        .items-table th {
            background-color: #eee;
        }

        .barcode-section {
            text-align: center;
            margin: 5px 0;
        }

        .barcode-section img {
            max-width: 90%;
            height: auto;
        }

        .barcode-text {
            margin-top: 2px;
            font-family: monospace;
            font-size: 10px;
        }

        .footer {
            margin-top: 5px;
            text-align: center;
            font-size: 8px;
            border-top: 1px solid #000;
            padding-top: 3px;
        }

        .footer-content {
            font-style: italic;
            margin: 1px;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <div class="company-name">North Courier Services</div>
            <div>www.northcourierservices.pk</div>
            <div class="receipt-number">RECEIPT # {{ $parcel->receipt_number }}</div>
        </div>

        <table class="details-table">
            <tr>
                <td class="label">TRACKING #</td>
                <td>{{ $parcel->tracking_number }}</td>
                <td class="label">ORIGIN:</td>
                <td>{{ $parcel->origin }}</td>
            </tr>
            <tr>
                <td class="label">BOOKING DATE:</td>
                <td>{{ $parcel->booking_time }}</td>
                <td class="label">DESTINATION:</td>
                <td>{{ $parcel->destination }}</td>
            </tr>
            <tr>
                <td class="label">PAYMENT:</td>
                <td>{{ $parcel->payment_status }}</td>
                <td class="label">BOOKING POINT:</td>
                <td>{{ $parcel->originBranch->name }}</td>
            </tr>
            <tr>
                <td class="label">STATUS:</td>
                <td>{{ $parcel->status }}</td>
                <td class="label">DELIVERY POINT:</td>
                <td>{{ $parcel->destinationBranch->name }}</td>
            </tr>
        </table>

        <table class="details-table" style="width: 100%; margin-top: 20px;">
            <tr>
                <td style="width: 50%; vertical-align: top;">
                    <strong>SENDER'S DETAILS</strong><br>
                    <table style="width: 100%; margin-top: 5px;">
                        <tr><td class="label">Name:</td><td>{{ $parcel->sender_name }}</td></tr>
                        <tr><td class="label">Email:</td><td>{{ $parcel->sender_email }}</td></tr>
                        <tr><td class="label">CNIC:</td><td>{{ $parcel->sender_cnic }}</td></tr>
                        <tr><td class="label">Phone:</td><td>{{ $parcel->sender_phone }}</td></tr>
                    </table>
                </td>
                <td style="width: 50%; vertical-align: top;">
                    <strong>RECEIVER'S DETAILS</strong><br>
                    <table style="width: 100%; margin-top: 5px;">
                        <tr><td class="label">Name:</td><td>{{ $parcel->receiver_name }}</td></tr>
                        <tr><td class="label">Email:</td><td>{{ $parcel->receiver_email }}</td></tr>
                        <tr><td class="label">CNIC:</td><td>{{ $parcel->receiver_cnic }}</td></tr>
                        <tr><td class="label">Phone:</td><td>{{ $parcel->receiver_phone }}</td></tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="section-title">Product Details</div>
        <table class="details-table">
            <tr>
                <td class="label">PACKING:</td>
                <td>{{ $parcel->packing_type }}</td>
                <td class="label">WEIGHT:</td>
                <td>{{ $parcel->weight }} KG</td>
            </tr>
            <tr>
                <td class="label">DESCRIPTION:</td>
                <td>{{ $parcel->goods_description }}</td>
                <td class="label">PIECES:</td>
                <td>{{ $parcel->pieces }}</td>
            </tr>
            <tr>
                <td class="label">REMARKS:</td>
                <td>{{ $parcel->remarks }}</td>
                <td class="label">PAYMENT:</td>
                <td>{{ $parcel->payment_status }}</td>
            </tr>
            {{-- <tr>
                <td class="label">STATUS:</td>
                <td>{{ $parcel->status }}</td>
                <td class="label">DELIVERY POINT:</td>
                <td>{{ $parcel->delivery_point }}</td>
            </tr> --}}
        </table>
        <table class="items-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Fare</td>
                    <td>{{ $parcel->fare }}</td>
                </tr>
                <tr>
                    <td>Total Amount:</td>
                    <td>{{ $parcel->total_amount }}</td>
                </tr>
            </tbody>
        </table>

        {{-- <div class="total-section">
            Total Amount: {{ $parcel->total_amount }}
        </div> --}}

        <div class="barcode-section">
            <img src="data:image/svg+xml;base64,{{ $barcode }}" alt="Barcode" height="50">
            <div class="barcode-text">{{ $parcel->tracking_number }}</div>
        </div>

        <div class="footer">
            <div class="footer-content">Thank you for your business!</div>
            <div class="footer-content">NCS TRACKING MANAGEMENT</div>
            <div class="footer-content">www.ncstracking.com</div>
        </div>
    </div>
</body>
</html>
