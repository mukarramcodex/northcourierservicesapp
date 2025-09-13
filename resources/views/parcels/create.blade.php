<x-layouts.app>
    <h1 class="text-2xl font-bold mb-2 text-black">Create Parcel</h1>
    <form action="{{ route('parcels.store') }}" method="POST">
        <div class="max-w-6xl mx-auto p-4">
            @include('parcels._form')
        </div>
    </form>
</x-layouts.app>
