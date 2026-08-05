@csrf
@if (isset($tier))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Name (e.g. Bronze, Silver, Gold)</label>
        <input type="text" name="name" value="{{ old('name', $tier->name ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="50">
        @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order (ascending = better tier)</label>
        <input type="number" name="order_number" value="{{ old('order_number', $tier->order_number ?? ($nextOrder ?? 0)) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Promotion reward — Gems</label>
        <input type="number" name="promotion_gems" value="{{ old('promotion_gems', $tier->promotion_gems ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        <p class="text-xs text-gray-500 mt-1">Given when a learner is promoted INTO this tier at the weekly rollover.</p>
        @error('promotion_gems') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Promotion reward — XP</label>
        <input type="number" name="promotion_xp" value="{{ old('promotion_xp', $tier->promotion_xp ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('promotion_xp') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.league-tiers.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
