<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Create Customer</h1>
    <form method="POST" action="{{ route('customers.store') }}">
        @include('customers._form')
    </form>
</x-layouts.app>
