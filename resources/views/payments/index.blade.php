<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4 text-black">Payments</h1>
    <a href="{{ route('payments.create') }}" class="bg-[#017236] text-white px-4 py-2 rounded">+ New Payment</a>

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-[#017236]">
                <th class="px-3 py-2">ID</th>
                <th class="px-3 py-2">Customer</th>
                <th class="px-3 py-2">Amount</th>
                <th class="px-3 py-2">Method</th>
                <th class="px-3 py-2">Status</th>
                <th class="px-3 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr class="border-b bg-white">
                    <td class="px-3 py-2 text-green-800 font-medium">{{ $payment->id }}</td>
                    <td class="px-3 py-2 text-green-800 font-medium">{{ $payment->customer->name ?? 'N/A' }}</td>
                    <td class="px-3 py-2 text-green-800 font-medium">{{ $payment->amount }}</td>
                    <td class="px-3 py-2 text-green-800 font-medium">{{ ucfirst($payment->method) }}</td>
                    <td class="px-3 py-2 text-green-800 font-medium">{{ ucfirst($payment->status) }}</td>
                    <td class="px-3 py-2 text-green-800 font-medium">
                        <a href="{{ route('payments.show', $payment) }}" class="text-blue-600">View</a> |
                        <a href="{{ route('payments.edit', $payment) }}" class="text-yellow-600">Edit</a> |
                        <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600" onclick="return confirm('Delete this payment?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $payments->links() }}
</x-layouts.app>
