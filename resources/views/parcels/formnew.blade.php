@csrf
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-4 ">
    <form action="{{ route('parcels.store') }}" method="POST" class="space-y-6">

        {{-- Tracking Number --}}
        <div>
            <label class="block text-gray-700 font-medium">Tracking Number</label>
            <input type="text" name="tracking_number" value="{{ old('tracking_number') }}"
                   class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300 text-black">
            @error('tracking_number')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- Customer (Sender) --}}
        <div>
            <label class="block text-gray-700 font-medium">Sender (Customer)</label>
            <select name="customer_id" class="w-full border rounded-lg p-2 text-black">
                <option value="">-- Select Customer --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }} ({{ $customer->phone }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Receiver Info --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">Receiver Name</label>
                <input type="text" name="receiver_name" value="{{ old('receiver_name') }}"
                       class="w-full border rounded-lg p-2 text-black">
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Receiver Phone</label>
                <input type="text" name="receiver_phone" value="{{ old('receiver_phone') }}"
                       class="w-full border rounded-lg p-2 text-black">
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Receiver Address</label>
                <input type="text" name="receiver_address" value="{{ old('receiver_address') }}"
                       class="w-full border rounded-lg p-2 text-black">
            </div>
        </div>

        {{-- Parcel Info --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">Parcel Type</label>
                <input type="text" name="parcel_type" value="{{ old('parcel_type') }}"
                       class="w-full border rounded-lg p-2 text-black" placeholder="e.g. Document, Box">
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Weight (kg)</label>
                <input type="number" step="0.01" name="weight" value="{{ old('weight') }}"
                       class="w-full border rounded-lg p-2 text-black">
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Cost</label>
                <input type="number" step="0.01" name="cost" value="{{ old('cost', 0) }}"
                       class="w-full border rounded-lg p-2 text-black">
            </div>
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-gray-700 font-medium">Status</label>
            <select name="status" class="w-full border rounded-lg p-2 text-black">
                @foreach(['pending', 'in_transit', 'delivered', 'cancelled'] as $status)
                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Branches --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">Origin Branch</label>
                <select name="origin_branch_id" class="w-full border rounded-lg p-2 text-black">
                    <option value="">-- Select Branch --</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}" {{ old('origin_branch_id') == $branch->id ? 'selected' : '' }}>
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Destination Branch</label>
                <select name="destination_branch_id" class="w-full border rounded-lg p-2 text-black">
                    <option value="">-- Select Branch --</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}" {{ old('destination_branch_id') == $branch->id ? 'selected' : '' }}>
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Assigned Staff --}}
        <div>
            <label class="block text-gray-700 font-medium">Assigned Staff</label>
            <select name="assigned_staff_id" class="w-full border rounded-lg p-2 text-black">
                <option value="">-- Select Staff --</option>
                @foreach($staff as $member)
                    <option value="{{ $member->id }}" {{ old('assigned_staff_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Dates --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">Shipped At</label>
                <input type="datetime-local" name="shipped_at" value="{{ old('shipped_at') }}"
                       class="w-full border text-black rounded-lg p-2">
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Delivered At</label>
                <input type="datetime-local" name="delivered_at" value="{{ old('delivered_at') }}"
                       class="w-full border rounded-lg p-2 text-black">
            </div>
        </div>

        {{-- Submit --}}
        <div class="mt-2">
            <button type="submit"
                    class="bg-[#017236] hover:bg-[#015428] text-white px-6 py-2 rounded-lg shadow-md">
                Save Parcel
            </button>
        </div>
    </form>
</div>
