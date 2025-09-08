<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Payment #{{ $payment->id }}</h1>
    <ul>
        <li><strong>Amount:</strong> {{ $payment->amount }}</li>
        <li><strong>Method:</strong> {{ ucfirst($payment->method) }}</li>
        <li><strong>Status:</strong> {{ ucfirst($payment->status) }}</li>
        <li><strong>Customer:</strong> {{ $payment->customer->name ?? 'N/A' }}</li>
        <li><strong>Parcel:</strong> {{ $payment->parcel->tracking_no ?? 'N/A' }}</li>
    </ul>
</x-layouts.app>
