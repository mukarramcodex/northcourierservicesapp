@csrf
<div class="mb-4">
    <label class="block">Name</label>
    <input type="text" name="name" value="{{ old('name', $customer->name ?? '') }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block">Email</label>
    <input type="email" name="email" value="{{ old('email', $customer->email ?? '') }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block">Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $customer->phone ?? '') }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block">Address</label>
    <textarea name="address" class="w-full border rounded p-2">{{ old('address', $customer->address ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block">City</label>
    <input type="text" name="city" value="{{ old('city', $customer->city ?? '') }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block">Status</label>
    <select name="status" class="w-full border rounded p-2">
        <option value="active" @selected(old('status', $customer->status ?? '') == 'active')>Active</option>
        <option value="inactive" @selected(old('status', $customer->status ?? '') == 'inactive')>Inactive</option>
    </select>
</div>

<button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
