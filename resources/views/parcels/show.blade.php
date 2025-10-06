<x-layouts.app>
     <div class="flex items-center justify-between px-4 pb-2">
        <h1 class="text-2xl font-bold mb-4 text-[color:var(--primary-color)]">Parcel #{{ $parcel->tracking_number }}</h1>
        <div class="flex items-center justify-center gap-3 ">
            <a href="{{ route('parcels.index') }}" class="bg-[color:var(--primary-color)] text-white px-4 py-2 rounded">Go Back </a>
            <a href="#" class="bg-[color:var(--primary-color)] text-white px-4 py-2 rounded">Download ⬇️</a>
        </div>
    </div>

    <table class="table-auto border-collapse border border-gray-300 w-full text-left">
    <tbody>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Parcel ID</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->id }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Booking ID</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->booking_id }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Status</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ ucfirst($parcel->status) }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Payment Status</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ ucfirst($parcel->payment) }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Customer Name</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->customer->name }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Customer Phone</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->customer->phone }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Receiver Name</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->receiver_name }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Receiver Email</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->receiver_email }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Receiver Phone</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->receiver_phone }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Receiver Address</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->receiver_address }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Parcel Type</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->parcel_type }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Weight</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->weight }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Stack</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->stack }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Dimension</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->dimension }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Goods Description</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->goods_description}}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Note</th>
            <td class="border border-gray-300 px-4 py-2 text-black">Note</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Remarks</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->remarks}}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Fare</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->fare}}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Discount</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->discount}}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Commission</th>
            <td class="border border-gray-300 px-4 py-2 text-black">Commission</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Amount</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->amount}}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Total Amount</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->total_amount}}</td>
        </tr>

        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Origin Branch</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->originBranch->name }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Destination Branch</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->destinationBranch->name }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Staff Name</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->staff->name }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Staff Phone</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->staff->phone }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Shipped At</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->shipped_at }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Delivered At</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->delivered_at }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Origin</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->origin }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Destination</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->destination }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Booking Time</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->booking_time }}</td>
            <th class="border border-gray-300 px-4 py-2 text-black">Receipt Number</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $parcel->receipt_number }}</td>
        </tr>
    </tbody>
</table>

</x-layouts.app>
