<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Parcel Details Slip</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .slip-container {
            border: 1px solid #000;
            padding: 10px;
            width: 800px;
            margin: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }
        .header .left,
        .header .right {
            width: 48%;
        }
        .header h2 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            font-size: 12px;
            padding: 4px;
            text-align: center;
        }
        .footer {
            margin-top: 5px;
            font-size: 10px;
            border-top: 1px solid #000;
            padding-top: 5px;
            text-align: center;
        }
        .note {
            font-size: 9px;
            text-align: left;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="slip-container">
    <!-- Header Section -->
    <div class="header">
        <div class="left">
            <p><strong>Customer Copy</strong></p>
            <p><strong>Booking ID:</strong> {{ $parcel->booking_id }}</p>
            <p><strong>Destination:</strong> {{ $parcel->destination }}</p>
            <p><strong>To:</strong> {{ $parcel->receiver_name }}</p>
            <p><strong>Mobile:</strong> {{ $parcel->receiver_phone }}</p>
            <p><strong>CNIC:</strong> {{ $parcel->receiver_cnic }}</p>
        </div>
        <div class="right">
            <h2>NCS</h2>
            <p><strong>Booking at:</strong> {{ $parcel->booking_time }}</p>
            <p><strong>Printing at:</strong> {{ now()->format('d-M-y H:i:s') }}</p>
            <p><strong>Origin:</strong> {{ $parcel->origin }}</p>
            <p><strong>From:</strong> {{ $parcel->customer->name }}</p>
            <p><strong>Mobile:</strong> {{ $parcel->customer->phone }}</p>
            <p><strong>CNIC:</strong> {{ $parcel->customer->cnic }}</p>
        </div>
    </div>

    <!-- Parcel Table -->
    <table>
        <thead>
        <tr>
            <th>Sr#</th>
            <th>Category</th>
            <th>Good Type</th>
            <th>Pack Type</th>
            <th>Pack Qty</th>
            <th>Unit Qty</th>
            <th>Total Wt. Kg</th>
            <th>Dec. Value</th>
        </tr>
        </thead>
        <tbody>
        @foreach($parcel->items as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->category }}</td>
            <td>{{ $item->good_type }}</td>
            <td>{{ $item->pack_type }}</td>
            <td>{{ $item->pack_qty }}</td>
            <td>{{ $item->unit_qty }}</td>
            <td>{{ $item->weight }}</td>
            <td>{{ number_format($item->declared_value, 0) }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Payment Info -->
    <table>
        <tr>
            <td><strong>Type:</strong> {{ strtoupper($parcel->payment_type) }}</td>
            <td><strong>Amount:</strong> {{ $parcel->amount }}</td>
            <td><strong>Other Charges:</strong> {{ $parcel->other_charges }}</td>
            <td><strong>Received Amount:</strong> {{ $parcel->received_amount }}</td>
            <td><strong>Due Amount:</strong> {{ $parcel->due_amount }}</td>
            <td><strong>Send Risk:</strong> {{ $parcel->send_risk ? 'YES' : 'NO' }}</td>
            <td><strong>Claim:</strong> {{ $parcel->claim ? 'YES' : 'NO' }}</td>
            <td><strong>Time Limit:</strong> {{ $parcel->time_limit ? 'YES' : 'NO' }}</td>
        </tr>
    </table>

    <!-- Notes -->
    <div class="note">
        <p><strong>Note:</strong>In case of loss or damage, 20% of the booking charges of the goods’ value will be applicable.
        Parcel will not be delivered without Original CNIC.
        Please receive your parcels within 7 days, otherwise store charges will apply.
        In case of loss of goods, company may pay 10 times of maximum booking charges of the value of the goods
        as damage. If non-custom paid items, the company will not be liable.
        Godown charges are also applicable at the time of delivery.</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>For More Information Contact: +92-312-3456789  – +92-312-3456789 or visit www.northcourierservies.pk </p>
    </div>
</div>
</body>
</html>
