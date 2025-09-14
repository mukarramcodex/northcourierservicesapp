<x-layouts.app :title="'Tracking Logs for '.$parcel->tracking_number">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold">Tracking Logs ({{ $parcel->tracking_number }})</h2>
        <a href="{{ route('trackinglogs.create', $parcel) }}"
           class="bg-primary text-white px-4 py-2 rounded-lg">+ Add Log</a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Date</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Location</th>
                    <th class="p-3">Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr class="border-b">
                    <td class="p-3">{{ $log->logged_at->format('d M Y H:i') }}</td>
                    <td class="p-3 font-semibold">{{ $log->status }}</td>
                    <td class="p-3">{{ $log->location ?? '-' }}</td>
                    <td class="p-3">{{ $log->remarks ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layouts.app>
