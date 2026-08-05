@csrf
@if (isset($tier))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Name (e.g. BRONZE, SILVER, GOLD)</label>
        <input type="text" name="name" value="{{ old('name', $tier->name ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="50">
        @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Gems Reward</label>
        <input type="number" name="gems_reward" value="{{ old('gems_reward', $tier->gems_reward ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('gems_reward') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">XP Reward</label>
        <input type="number" name="xp_reward" value="{{ old('xp_reward', $tier->xp_reward ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('xp_reward') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Hearts Reward</label>
        <input type="number" name="hearts_reward" value="{{ old('hearts_reward', $tier->hearts_reward ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('hearts_reward') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order</label>
        <input type="number" name="order_number" value="{{ old('order_number', $tier->order_number ?? ($nextOrder ?? 0)) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.badge-tiers.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
