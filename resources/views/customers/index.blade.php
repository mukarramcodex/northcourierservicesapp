<x-layouts.app>
    <div class="flex items-center justify-between px-4 pb-2">
        <h1 class="text-2xl font-bold mb-4 text-[#015428]">Customers</h1>
        <a href="{{ route('customers.create') }}" class="bg-[#017236] hover:bg-green-900 text-white px-4 py-2 rounded">+ New Customer</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="p-6 bg-[#017236] hover:bg-green-900 shadow rounded-2xl text-white flex items-center justify-between">
           <div>
                <h3 class="text-sm font-semibold ">Total Customers</h3>
                <p class="text-md font-bold">Total</p>
            </div>
            <div>
                <x-heroicon-o-users class="w-10 h-10 text-white/80" />
            </div>
        </div>
        <div class="p-4 bg-[#017236] hover:bg-green-900 shadow rounded-2xl text-white flex items-center justify-between">
            <div>
                <h3 class="text-sm font-semibold ">Active</h3>
                <p class="text-md font-bold">Total</p>
            </div>
            <div>
                <x-heroicon-o-bolt class="w-10 h-10 text-white/80" />
            </div>
        </div>
        <div
            class="p-4 bg-[#017236] hover:bg-green-900 shadow rounded-2xl text-white flex items-center justify-between">
            <div>
                <h3 class="text-sm font-semibold ">Inactive</h3>
                <p class="text-md font-bold">Total</p>
            </div>
            <div>
                <x-heroicon-o-bolt-slash class="w-10 h-10 text-white/80" />
            </div>
        </div>
        <div
            class="p-4 bg-[#017236] hover:bg-green-900 shadow rounded-2xl text-white flex items-center justify-between">
            <div>
                <h3 class="text-sm font-semibold ">Revenue</h3>
                <p class="text-md font-bold">Total</p>
            </div>
            <div>
                <x-heroicon-o-banknotes class="w-10 h-10 text-white/80" />
            </div>
        </div>
    </div>

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-[#017236]">
                <th class="px-3 py-2">ID</th>
                <th class="px-3 py-2">Name</th>
                <th class="px-3 py-2">Email</th>
                <th class="px-3 py-2">Phone</th>
                <th class="px-3 py-2">Status</th>
                <th class="px-3 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
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
                            <button class="text-red-600"
                                onclick="return confirm('Delete this customer?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $customers->links() }}
</x-layouts.app>
