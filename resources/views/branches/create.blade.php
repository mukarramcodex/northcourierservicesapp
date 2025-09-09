<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4 text-black">Create Branch</h1>
    <form method="POST" action="{{ route('branches.store') }}">
        <div class="max-w-6xl mx-auto p-4">
            @include('branches._form')
        </div>
    </form>
</x-layouts.app>
