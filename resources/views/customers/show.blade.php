<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Customer #{{ $customer->id }}</h1>
    <ul>
        <li><strong>Name:</strong> {{ $customer->name }}</li>
        <li><strong>Email:</strong> {{ $customer->email }}</li>
        <li><strong>Phone:</strong> {{ $customer->phone }}</li>
        <li><strong>Address:</strong> {{ $customer->address }}</li>
        <li><strong>City:</strong> {{ $customer->city }}</li>
        <li><strong>Country:</strong> {{ $customer->country }}</li>
        <li><strong>Status:</strong> {{ ucfirst($customer->status) }}</li>
    </ul>
</x-layouts.app>
