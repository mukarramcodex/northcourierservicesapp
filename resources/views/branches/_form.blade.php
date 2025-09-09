@csrf
<div class="grid grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block mb-1 text-black font-medium">Branch Name</label>
        <input type="text" name="name" value="{{ old('name', $branch->name ?? '') }}" class="w-full border-2 rounded p-2 bg-white text-black">
    </div>
    <div>
        <label class="block mb-1 text-black font-medium">Branch Code</label>
        <input type="text" name="code" value="{{ old('code', $branch->code ?? '') }}" class="w-full  border-2 rounded p-2 bg-white text-black">
    </div>
</div>

<div class="grid grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block mb-1 text-black font-medium">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $branch->phone ?? '') }}" class="w-full  border-2 rounded p-2 bg-white text-black">
    </div>
    <div>
        <label class="block mb-1 text-black font-medium">Email</label>
        <input type="email" name="email" value="{{ old('email', $branch->email ?? '') }}" class="w-full  border-2 rounded p-2 bg-white text-black">
    </div>
</div>

<div class="grid grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block mb-1 text-black font-medium">City</label>
        <input type="text" name="city" value="{{ old('city', $branch->city ?? '') }}" class="w-full border-2 rounded p-2 bg-white text-black">
    </div>
    <div>
        <label class="block mb-1 text-black font-medium">Country</label>
        <input type="text" name="country" value="{{ old('country', $branch->country ?? 'Pakistan') }}" class="w-full border-2 rounded p-2 text-black bg-white">
    </div>
</div>

<div class="mb-4">
    <label class="block mb-1 text-black font-medium">Address</label>
    <textarea name="address" class="w-full border-2 rounded p-2 bg-white text-black">{{ old('address', $branch->address ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block mb-1 text-black font-medium">Status</label>
    <select name="status" class="w-full border-2 rounded p-2 text-black bg-white">
        <option value="active" @selected(old('status', $branch->status ?? '') == 'active')>Active</option>
        <option value="inactive" @selected(old('status', $branch->status ?? '') == 'inactive')>Inactive</option>
    </select>
</div>

<button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
