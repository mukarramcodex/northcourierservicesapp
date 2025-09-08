<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Customers</h1>
    <a href="{{ route('customers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ New Customer</a>

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-3 py-2">ID</th>
                <th class="px-3 py-2">Name</th>
                <th class="px-3 py-2">Email</th>
                <th class="px-3 py-2">Phone</th>
                <th class="px-3 py-2">Status</th>
                <th class="px-3 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr class="border-b">
                    <td class="px-3 py-2">{{ $customer->id }}</td>
                    <td class="px-3 py-2">{{ $customer->name }}</td>
                    <td class="px-3 py-2">{{ $customer->email }}</td>
                    <td class="px-3 py-2">{{ $customer->phone }}</td>
                    <td class="px-3 py-2">{{ ucfirst($customer->status) }}</td>
                    <td class="px-3 py-2">
                        <a href="{{ route('customers.show', $customer) }}" class="text-blue-600">View</a> |
                        <a href="{{ route('customers.edit', $customer) }}" class="text-yellow-600">Edit</a> |
                        <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600" onclick="return confirm('Delete this customer?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $customers->links() }}
</x-layouts.app>
