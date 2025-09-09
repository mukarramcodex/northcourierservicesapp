@csrf
<div class="space-y-4">
    <div>
        <label class="block text-black font-medium">Amount</label>
        <input type="number" name="amount"
            value="{{ old('amount', $payment->amount ?? '') }}"
            class="w-full border-2 rounded p-2 bg-white text-black">
    </div>

    <div>
        <label class="block text-black font-medium">Method</label>
        <select name="method"
            class="w-full border-2 rounded p-2 bg-white text-black">
            @foreach(['cash','card','bank_transfer','online'] as $method)
                <option value="{{ $method }}"
                    @selected(old('method', $payment->method ?? '') == $method)>
                    {{ ucfirst($method) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-black font-medium">Status</label>
        <select name="status"
            class="w-full border-2 rounded p-2 bg-white text-black">
            @foreach(['pending','completed','failed','refunded'] as $status)
                <option value="{{ $status }}"
                    @selected(old('status', $payment->status ?? '') == $status)>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-black font-medium">Notes</label>
        <textarea name="notes"
            class="w-full border-2 rounded p-2 bg-white text-black">{{ old('notes', $payment->notes ?? '') }}</textarea>
    </div>
</div>


<div>
    <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded">
        Save
    </button>
    <a href="{{ route('payments.index') }}" class="mt-4 bg-blue-500 text-white px-4 py-2.5 rounded">Back</a>
</div>
