<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Edit Payment</h1>
    <form method="POST" action="{{ route('payments.update', $payment) }}">
        @method('PUT')
        @include('payments._form')
    </form>
</x-layouts.app>
