<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Parcel Details</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #000;
        }

        .receipt-container {
            border: 1px solid #000;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }

        .company-name {
            font-size: 20px;
            font-weight: bold;
        }

        .receipt-number {
            margin-top: 10px;
            font-weight: bold;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .details-table td {
            padding: 5px;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            width: 120px;
        }

        .section-title {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .items-table th,
        .items-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .items-table th {
            background-color: #eee;
        }

        .total-section {
            text-align: right;
            font-weight: bold;
            font-size: 14px;
            margin-top: 10px;
        }

        .barcode-section {
            text-align: center;
            margin: 30px 0;
        }

        .barcode-text {
            margin-top: 5px;
            font-family: monospace;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            border-top: 1px solid #000;
            padding-top: 10px;
        }

        .footer-content {
            font-style: italic;
            margin: 3px;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <div class="company-name">NCS TRACKING LTD.</div>
            <div>www.ncstracking.com</div>
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
                <td>{{ $parcel->booking_point }}</td>
            </tr>
            <tr>
                <td class="label">STATUS:</td>
                <td>{{ $parcel->status }}</td>
                <td class="label">DELIVERY POINT:</td>
                <td>{{ $parcel->delivery_point }}</td>
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
