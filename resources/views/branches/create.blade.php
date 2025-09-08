<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Create Branch</h1>
    <form method="POST" action="{{ route('branches.store') }}">
        @include('branches._form')
    </form>
</x-layouts.app>
