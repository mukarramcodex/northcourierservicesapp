<x-layouts.app>
    <div class="flex items-center justify-between px-4 pb-2">
        <h1 class="text-2xl font-bold mb-4 text-[#015428]">Parcels</h1>
        <a href="{{ route('parcels.create') }}" class="bg-[#017236] text-white px-4 py-2 rounded">+ Add Parcel</a>
    </div>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-[#017236]">
                <th class="p-2">Tracking #</th>
                <th class="p-2">Customer</th>
                <th class="p-2">Receiver</th>
                <th class="p-2">Status</th>
                <th class="p-2">Origin</th>
                <th class="p-2">Destination</th>
                <th class="p-2">Staff</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parcels as $parcel)
                <tr class="border-b bg-white">
                    <td class="p-2 border text-green-800 font-medium">{{ $parcel->tracking_number }}</td>
                    <td class="p-2 border text-green-800 font-medium">{{ $parcel->customer->name ?? '—' }}</td>
                    <td class="p-2 border text-green-800 font-medium">{{ $parcel->receiver_name }}</td>
                    <td class="p-2 border text-green-800 font-medium">{{ ucfirst($parcel->status) }}</td>
                    <td class="p-2 border text-green-800 font-medium">{{ $parcel->originBranch->name ?? '—' }}</td>
                    <td class="p-2 border text-green-800 font-medium">{{ $parcel->destinationBranch->name ?? '—' }}</td>
                    <td class="p-2 border text-green-800 font-medium">{{ $parcel->staff->name ?? '—' }}</td>
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

    {{ $parcels->links() }}
</x-layouts.app>
