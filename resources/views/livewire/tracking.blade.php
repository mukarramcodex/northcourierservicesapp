{{-- resources/views/livewire/tracking.blade.php --}}
<div class="min-h-screen bg-gray-50 flex flex-col">
    {{-- Hero Section --}}
    <div class="bg-gradient-to-r from-green-600 to-emerald-500 text-white py-20 text-center">
        <h1 class="text-4xl font-bold">Track Your Parcel</h1>
        <p class="mt-2 text-lg opacity-90">
            Enter your tracking number below to get the latest updates
        </p>
    </div>

    {{-- Tracking Form --}}
    <div class="max-w-2xl mx-auto -mt-12 w-full px-4">
        <div class="bg-white p-6 rounded-2xl shadow-xl">
            <form wire:submit.prevent="trackParcel" class="flex flex-col sm:flex-row gap-4">
                <input
                    type="text"
                    wire:model="trackParcel"
                    placeholder="Enter tracking number"
                    class="flex-1 border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600 text-black"
                >
                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-md"
                >
                    Track
                </button>
            </form>

            {{-- Error --}}
            @if ($errorMessage)
                <div class="mt-4 p-3 bg-red-100 text-red-700 rounded-lg">
                    {{ $errorMessage }}
                </div>
            @endif
        </div>
    </div>

    {{-- Tracking Details --}}
    <div class="max-w-3xl mx-auto mt-12 w-full px-4">
        @if ($parcel)
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tracking Details</h2>

                {{-- Parcel Info Card --}}
                <div class="grid sm:grid-cols-2 gap-6 mb-8">
                    <div class="p-4 bg-gray-50 rounded-xl">
                        <p class="text-gray-600">Tracking Number</p>
                        <p class="font-semibold text-lg">{{ $parcel->tracking_number }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl">
                        <p class="text-gray-600">Status</p>
                        <p class="font-semibold text-lg">{{ ucfirst($parcel->status) }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl">
                        <p class="text-gray-600">Origin</p>
                        <p class="font-semibold text-lg">{{ $parcel->origin }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl">
                        <p class="text-gray-600">Destination</p>
                        <p class="font-semibold text-lg">{{ $parcel->destination }}</p>
                    </div>
                </div>

                {{-- Tracking Timeline --}}
                <div class="relative border-l-4 border-green-600 pl-6 space-y-8">
                    <div class="flex items-start">
                        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-green-600 text-white">
                            📦
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold">Parcel Created</p>
                            <p class="text-sm text-gray-500">{{ $parcel->created_at->format('d M Y, h:i A') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-green-500 text-white">
                            🚚
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold">In Transit</p>
                            <p class="text-sm text-gray-500">
                                {{ $parcel->shipped_at ? $parcel->shipped_at->format('d M Y, h:i A') : 'Pending' }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-8 h-8 flex items-center justify-center rounded-full
                            {{ $parcel->delivered_at ? 'bg-green-600' : 'bg-gray-400' }} text-white">
                            ✅
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold">Delivered</p>
                            <p class="text-sm text-gray-500">
                                {{ $parcel->delivered_at ? $parcel->delivered_at->format('d M Y, h:i A') : 'Not Delivered Yet' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- Footer --}}
    <footer class="mt-16 py-6 text-center text-gray-500 text-sm">
        © {{ now()->year }} North Courier Service. All rights reserved.
    </footer>
</div>
