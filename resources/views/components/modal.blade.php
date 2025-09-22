@props(['id' => 'modal', 'title' => 'Modal', 'action' => '#', 'method' => 'POST'])

<div
    x-data="{ open: false }"
    x-show="open"
    x-cloak
    @open-modal.window="if ($event.detail.id === '{{ $id }}') open = true"
    @close-modal.window="if ($event.detail.id === '{{ $id }}') open = false"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
>
    <div @click.away="open = false" class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
        <h2 class="text-lg font-bold mb-4">{{ $title }}</h2>

        <form method="POST" action="{{ $action }}">
            @csrf
            @if(strtoupper($method) === 'PUT')
                @method('PUT')
            @endif

            {{ $slot }}

            <div class="mt-4 flex justify-end gap-2">
                <button type="button" @click="open = false" class="px-4 py-2 bg-gray-200 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>
