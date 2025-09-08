<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Staff Members</h1>

    <a href="{{ route('staff.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Staff</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Phone</th>
                <th class="p-2 border">Role</th>
                <th class="p-2 border">Branch</th>
                <th class="p-2 border">Salary</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $member)
                <tr>
                    <td class="p-2 border">{{ $member->name }}</td>
                    <td class="p-2 border">{{ $member->email }}</td>
                    <td class="p-2 border">{{ $member->phone }}</td>
                    <td class="p-2 border">{{ $member->role }}</td>
                    <td class="p-2 border">{{ $member->branch->name ?? '—' }}</td>
                    <td class="p-2 border">{{ $member->salary }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('staff.show', $member) }}" class="text-blue-500">View</a> |
                        <a href="{{ route('staff.edit', $member) }}" class="text-green-500">Edit</a> |
                        <form action="{{ route('staff.destroy', $member) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500" onclick="return confirm('Delete this staff?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.app>
