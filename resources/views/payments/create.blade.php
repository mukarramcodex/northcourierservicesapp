<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Create Payment</h1>
    <form method="POST" action="{{ route('payments.store') }}">
        @include('payments._form')
    </form>
</x-layouts.app>
