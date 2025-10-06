<div class="mx-auto">
    <form action="{{ route('parcels.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Error Handling --}}
        @if ($errors->any())
            <div class="bg-red-200 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Customer Information --}}
            <div class="p-4 rounded-lg shadow bg-white">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Customer Information</h3>
                <div class="space-y-4">
                    <label class="block font-medium text-gray-700">Customer</label>
                    <select name="customer_id" class="w-full border rounded p-2 mt-1" required>
                        <option value="">Select Customer</option>
                        @foreach($customer as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Receiver Information --}}
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Receiver Information</h3>
                <div class="space-y-4">
                    <div class="flex gap-2">
                        <div class="w-1/2">
                            <label class="block font-medium text-gray-700">Name</label>
                            <input type="text" name="receiver_name" class="w-full border rounded p-2 mt-1" required>
                        </div>
                        <div class="w-1/2">
                            <label class="block font-medium text-gray-700">CNIC</label>
                            <input type="text" name="receiver_cnic" maxlength="15" class="w-full border rounded p-2 mt-1">
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div class="w-1/2">
                            <label class="block font-medium text-gray-700">Phone</label>
                            <input type="tel" name="receiver_phone" maxlength="11" class="w-full border rounded p-2 mt-1" required>
                        </div>
                        <div class="w-1/2">
                            <label class="block font-medium text-gray-700">Address</label>
                            <input type="text" name="receiver_address" class="w-full border rounded p-2 mt-1" required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Parcel Information --}}
            <div class="bg-white p-4 rounded-lg shadow col-span-2">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Parcel Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div>
                        <label class="block font-medium text-gray-700">Tracking Number</label>
                        <input type="text" name="tracking_number"
                            value="NCS{{ str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT) }}"
                            class="w-full border rounded p-2 mt-1 bg-gray-100" readonly>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Receipt Number</label>
                        <input type="text" name="receipt_number" value="{{ $nextReceipt }}"
                            class="w-full border rounded p-2 mt-1 bg-gray-100" readonly>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Booking ID</label>
                        <input type="text" name="booking_id"
                            value="{{ str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT) }}"
                            class="w-full border rounded p-2 mt-1 bg-gray-100" readonly>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Booking Time</label>
                        <input type="datetime-local" name="booking_time" id="bookingTime"
                            class="w-full border rounded p-2 mt-1 bg-gray-100" readonly>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div>
                        <label class="block font-medium text-gray-700">Origin Branch</label>
                        <select name="origin_branch_id" class="w-full border rounded p-2 mt-1" required>
                            <option value="">Select Branch</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Destination Branch</label>
                        <select name="destination_branch_id" class="w-full border rounded p-2 mt-1" required>
                            <option value="">Select Branch</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Assigned Staff</label>
                        <select name="assigned_staff_id" class="w-full border rounded p-2 mt-1">
                            <option value="">Select Staff</option>
                            @foreach($staff as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Parcel Type</label>
                        <input type="text" name="parcel_type" class="w-full border rounded p-2 mt-1" placeholder="Box, Envelope, Crate">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div>
                        <label class="block font-medium text-gray-700">Weight</label>
                        <input type="text" name="weight" class="w-full border rounded p-2 mt-1" required>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Dimension</label>
                        <input type="text" name="dimension" class="w-full border rounded p-2 mt-1">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Fare</label>
                        <input type="number" name="fare" class="w-full border rounded p-2 mt-1" required>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Other Charges</label>
                        <input type="number" name="other_charges" class="w-full border rounded p-2 mt-1" value="0">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div>
                        <label class="block font-medium text-gray-700">Discount</label>
                        <input type="number" name="discount" class="w-full border rounded p-2 mt-1" value="0">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Amount</label>
                        <input type="number" name="amount" class="w-full border rounded p-2 mt-1" required>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Total Amount</label>
                        <input type="number" name="total_amount" class="w-full border rounded p-2 mt-1" required>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Payment Type</label>
                        <select name="payment_type" class="w-full border rounded p-2 mt-1" required>
                            <option value="Cash">Cash</option>
                            <option value="Card">Card</option>
                            <option value="Online">Online</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div>
                        <label class="block font-medium text-gray-700">Received Amount</label>
                        <input type="number" name="received_amount" class="w-full border rounded p-2 mt-1" value="0">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Due Amount</label>
                        <input type="number" name="due_amount" class="w-full border rounded p-2 mt-1" value="0">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Send Risk</label>
                        <select name="send_risl" class="w-full border rounded p-2 mt-1" required>
                            <option value="No" selected>NO</option>
                            <option value="YES">YES</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Claim</label>
                        <select name="claim" class="w-full border rounded p-2 mt-1" required>
                            <option value="NO" selected>NO</option>
                            <option value="YES">YES</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block font-medium text-gray-700">Goods Description</label>
                        <textarea name="goods_description" rows="3" class="w-full border rounded p-2 mt-1"></textarea>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Remarks</label>
                        <textarea name="remarks" rows="3" class="w-full border rounded p-2 mt-1"></textarea>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Time Limit</label>
                        <select name="time_limit" class="w-full border rounded p-2 mt-1">
                            <option value="NO" selected>NO</option>
                            <option value="YES">YES</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block font-medium text-gray-700">Status</label>
                        <select name="status" class="w-full border rounded p-2 mt-1">
                            <option value="Pending">Pending</option>
                            <option value="In Transit">In Transit</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Shipped At</label>
                        <input type="date" name="shipped_at" class="w-full border rounded p-2 mt-1">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Delivered At</label>
                        <input type="date" name="delivered_at" class="w-full border rounded p-2 mt-1">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-200">
                Create Parcel
            </button>
        </div>
    </form>
</div>

<script>
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const localDatetime = `${year}-${month}-${day}T${hours}:${minutes}`;
    document.getElementById('bookingTime').value = localDatetime;
</script>
