<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Edit Branch</h1>
    <form method="POST" action="{{ route('branches.update', $branch) }}">
        @method('PUT')
        @include('branches._form')
    </form>
</x-layouts.app>
