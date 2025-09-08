<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Edit Customer</h1>
    <form method="POST" action="{{ route('customers.update', $customer) }}">
        @method('PUT')
        @include('customers._form')
    </form>
</x-layouts.app>
