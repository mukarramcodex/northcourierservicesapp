<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4 text-black">Branches</h1>
    <a href="{{ route('branches.create') }}" class="bg-[#017236] text-white px-4 py-2 rounded">+ New Branch</a>

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-[#017236]">
                <th class="px-3 py-2">ID</th>
                <th class="px-3 py-2">Name</th>
                <th class="px-3 py-2">Code</th>
                <th class="px-3 py-2">City</th>
                <th class="px-3 py-2">Status</th>
                <th class="px-3 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $branch)
                <tr class="border-b bg-white">
                    <td class="px-3 py-2 text-green-800 font-medium">{{ $branch->id }}</td>
                    <td class="px-3 py-2 text-green-800 font-medium">{{ $branch->name }}</td>
                    <td class="px-3 py-2 text-green-800 font-medium">{{ $branch->code }}</td>
                    <td class="px-3 py-2 text-green-800 font-medium">{{ $branch->city }}</td>
                    <td class="px-3 py-2 text-green-800 font-medium">{{ ucfirst($branch->status) }}</td>
                    <td class="px-3 py-2 ">
                        <a href="{{ route('branches.show', $branch) }}" class="text-blue-600">View</a> |
                        <a href="{{ route('branches.edit', $branch) }}" class="text-yellow-600">Edit</a> |
                        <form action="{{ route('branches.destroy', $branch) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600" onclick="return confirm('Delete this branch?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $branches->links() }}
</x-layouts.app>
