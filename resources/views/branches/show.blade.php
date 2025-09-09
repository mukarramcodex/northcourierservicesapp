<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4 text-black">Branch #{{ $branch->id }}</h1>

    <table class="table-auto border-collapse border border-gray-300 w-full text-left">
    <tbody>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Code</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $branch->code }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Name</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $branch->name }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Phone</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $branch->phone }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Email</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $branch->email }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Address</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $branch->address }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">City</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $branch->city }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Country</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ $branch->country }}</td>
        </tr>
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-black">Status</th>
            <td class="border border-gray-300 px-4 py-2 text-black">{{ ucfirst($branch->status) }}</td>
        </tr>
    </tbody>
</table>

</x-layouts.app>
