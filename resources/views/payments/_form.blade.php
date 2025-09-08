@csrf
<div class="mb-4">
    <label class="block">Amount</label>
    <input type="number" name="amount" step="0.01" value="{{ old('amount', $payment->amount ?? '') }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block">Method</label>
    <select name="method" class="w-full border rounded p-2">
        @foreach(['cash','card','bank_transfer','online'] as $method)
            <option value="{{ $method }}" @selected(old('method', $payment->method ?? '') == $method)>{{ ucfirst($method) }}</option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block">Status</label>
    <select name="status" class="w-full border rounded p-2">
        @foreach(['pending','completed','failed','refunded'] as $status)
            <option value="{{ $status }}" @selected(old('status', $payment->status ?? '') == $status)>{{ ucfirst($status) }}</option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block">Notes</label>
    <textarea name="notes" class="w-full border rounded p-2">{{ old('notes', $payment->notes ?? '') }}</textarea>
</div>

<button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
