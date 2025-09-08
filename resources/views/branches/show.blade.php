<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Branch #{{ $branch->id }}</h1>
    <ul>
        <li><strong>Name:</strong> {{ $branch->name }}</li>
        <li><strong>Code:</strong> {{ $branch->code }}</li>
        <li><strong>Phone:</strong> {{ $branch->phone }}</li>
        <li><strong>Email:</strong> {{ $branch->email }}</li>
        <li><strong>Address:</strong> {{ $branch->address }}</li>
        <li><strong>City:</strong> {{ $branch->city }}</li>
        <li><strong>Country:</strong> {{ $branch->country }}</li>
        <li><strong>Status:</strong> {{ ucfirst($branch->status) }}</li>
    </ul>
</x-layouts.app>
