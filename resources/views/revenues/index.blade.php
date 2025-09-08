<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Revenues</h1>

    <a href="{{ route('revenues.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Revenue</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Date</th>
                <th class="p-2 border">Parcel</th>
                <th class="p-2 border">Branch</th>
                <th class="p-2 border">Staff</th>
                <th class="p-2 border">Amount</th>
                <th class="p-2 border">Source</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($revenues as $revenue)
                <tr>
                    <td class="p-2 border">{{ $revenue->revenue_date ?? '—' }}</td>
                    <td class="p-2 border">{{ $revenue->parcel->tracking_number ?? '—' }}</td>
                    <td class="p-2 border">{{ $revenue->branch->name ?? '—' }}</td>
                    <td class="p-2 border">{{ $revenue->staff->name ?? '—' }}</td>
                    <td class="p-2 border">{{ $revenue->amount }}</td>
                    <td class="p-2 border">{{ $revenue->source }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('revenues.show', $revenue) }}" class="text-blue-500">View</a> |
                        <a href="{{ route('revenues.edit', $revenue) }}" class="text-green-500">Edit</a> |
                        <form action="{{ route('revenues.destroy', $revenue) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500" onclick="return confirm('Delete this revenue?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.app>
