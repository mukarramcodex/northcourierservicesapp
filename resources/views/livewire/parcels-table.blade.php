<div>
    <!-- Search & Filter -->
    <div class="flex items-center gap-4 mb-4">
        <input type="text" wire:model.debounce.500ms="search"
               placeholder="Search parcels..."
               class="border rounded px-3 py-2 w-1/3 bg-[#017236]">

        <select wire:model="status" class="border rounded px-3 py-2 bg-[#017236]">
            <option value="">All Status</option>
            <option value="pending">Pending</option>
            <option value="in_transit">In Transit</option>
            <option value="delivered">Delivered</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>

    <!-- Table -->
    <table class="w-full border-collapse border">
        <thead>
            <tr class="bg-[#017236]">
                <th wire:click="sortBy('tracking_number')" class="cursor-pointer px-3 py-2">
                    Tracking #
                    @if($sortField === 'tracking_number')
                        {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                    @endif
                </th>
                <th wire:click="sortBy('receiver_name')" class="cursor-pointer px-3 py-2">
                    Receiver
                    @if($sortField === 'receiver_name')
                        {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                    @endif
                </th>
                <th>Status</th>
                <th wire:click="sortBy('created_at')" class="cursor-pointer px-3 py-2">
                    Created At
                    @if($sortField === 'created_at')
                        {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                    @endif
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($parcels as $parcel)
                <tr class="border-t">
                    <td class="px-3 py-2">{{ $parcel->tracking_number }}</td>
                    <td class="px-3 py-2">{{ $parcel->receiver_name }}</td>
                    <td class="px-3 py-2">
                        <span class="px-2 py-1 rounded text-white
                            @if($parcel->status === 'pending') bg-yellow-500
                            @elseif($parcel->status === 'in transit') bg-blue-500
                            @elseif($parcel->status === 'delivered') bg-green-500
                            @elseif($parcel->status === 'cancelled') bg-red-500
                            @endif">
                            {{ ucfirst($parcel->status) }}
                        </span>
                    </td>
                    <td class="px-3 py-2">{{ $parcel->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">No parcels found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $parcels->links() }}
    </div>
</div>
