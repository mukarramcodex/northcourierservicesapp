<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Parcels</h1>

    <a href="{{ route('parcels.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Parcel</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Tracking #</th>
                <th class="p-2 border">Customer</th>
                <th class="p-2 border">Receiver</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Origin</th>
                <th class="p-2 border">Destination</th>
                <th class="p-2 border">Staff</th>
                <th class="p-2 border">Cost</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parcels as $parcel)
                <tr>
                    <td class="p-2 border">{{ $parcel->tracking_number }}</td>
                    <td class="p-2 border">{{ $parcel->customer->name ?? '—' }}</td>
                    <td class="p-2 border">{{ $parcel->receiver_name }}</td>
                    <td class="p-2 border">{{ ucfirst($parcel->status) }}</td>
                    <td class="p-2 border">{{ $parcel->originBranch->name ?? '—' }}</td>
                    <td class="p-2 border">{{ $parcel->destinationBranch->name ?? '—' }}</td>
                    <td class="p-2 border">{{ $parcel->staff->name ?? '—' }}</td>
                    <td class="p-2 border">{{ $parcel->cost }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('parcels.show', $parcel) }}" class="text-blue-500">View</a> |
                        <a href="{{ route('parcels.edit', $parcel) }}" class="text-green-500">Edit</a> |
                        <form action="{{ route('parcels.destroy', $parcel) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500" onclick="return confirm('Delete this parcel?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.app>
