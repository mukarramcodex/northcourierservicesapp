<x-layouts.app :title="'Add Tracking Log for '.$parcel->tracking_number">

    <h2 class="text-lg font-bold mb-4">Add New Log ({{ $parcel->tracking_number }})</h2>

    <form action="{{ route('trackinglogs.store', $parcel) }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Status</label>
            <input type="text" name="status" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label>Location</label>
            <input type="text" name="location" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Remarks</label>
            <textarea name="remarks" class="w-full border rounded p-2"></textarea>
        </div>

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">
            Save Log
        </button>
    </form>

</x-layouts.app>
