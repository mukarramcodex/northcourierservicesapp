<x-layouts.app>
    <h1 class="text-2xl font-bold mb-1 text-black">Edit Parcel</h1>
    <form action="{{ route('parcels.update', $parcel) }}" method="POST">
        @method('PUT')
        @include('parcels._form')
    </form>
</x-layouts.app>
