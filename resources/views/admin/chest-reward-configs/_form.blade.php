@csrf
@if (isset($chest_reward_config))
    @method('PUT')
@endif

@php
    $chestType = old('chest_type', $chest_reward_config->chest_type?->value ?? 'daily');
@endphp

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Chest Type</label>
        <select name="chest_type" class="w-full border rounded px-3 py-2">
            <option value="daily" @selected($chestType === 'daily')>Daily</option>
            <option value="streak" @selected($chestType === 'streak')>Streak</option>
            <option value="unit_bonus" @selected($chestType === 'unit_bonus')>Unit Bonus</option>
        </select>
        @error('chest_type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Reference</label>
        <input type="text" name="reference" value="{{ old('reference', $chest_reward_config->reference ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="20">
        <p class="text-xs text-gray-500 mt-1">Only used for Streak type — the day count, e.g. 7</p>
        @error('reference') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Label</label>
        <input type="text" name="label" value="{{ old('label', $chest_reward_config->label ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="255">
        @error('label') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Reward Description</label>
        <input type="text" name="reward_description" value="{{ old('reward_description', $chest_reward_config->reward_description ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="255">
        @error('reward_description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Badge Key</label>
        <input type="text" name="badge_key" value="{{ old('badge_key', $chest_reward_config->badge_key ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="50">
        @error('badge_key') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Min Gems</label>
        <input type="number" name="min_gems" value="{{ old('min_gems', $chest_reward_config->min_gems ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('min_gems') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Max Gems</label>
        <input type="number" name="max_gems" value="{{ old('max_gems', $chest_reward_config->max_gems ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('max_gems') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Min XP</label>
        <input type="number" name="min_xp" value="{{ old('min_xp', $chest_reward_config->min_xp ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('min_xp') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Max XP</label>
        <input type="number" name="max_xp" value="{{ old('max_xp', $chest_reward_config->max_xp ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('max_xp') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Min Hearts</label>
        <input type="number" name="min_hearts" value="{{ old('min_hearts', $chest_reward_config->min_hearts ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('min_hearts') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Max Hearts</label>
        <input type="number" name="max_hearts" value="{{ old('max_hearts', $chest_reward_config->max_hearts ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('max_hearts') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order</label>
        <input type="number" name="order_number" value="{{ old('order_number', $chest_reward_config->order_number ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $chest_reward_config->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="text-sm font-medium">Active</label>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.chest-reward-configs.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
