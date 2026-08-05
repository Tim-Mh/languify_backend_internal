@csrf
@if (isset($gem_pack))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Key</label>
        <input type="text" name="key" value="{{ old('key', $gem_pack->key ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="50">
        @error('key') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $gem_pack->title ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="255">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Gems</label>
        <input type="number" name="gems" value="{{ old('gems', $gem_pack->gems ?? 1) }}" class="w-full border rounded px-3 py-2" min="1">
        @error('gems') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Price (USD)</label>
        <input type="number" step="0.01" name="amount_dollars" value="{{ old('amount_dollars', isset($gem_pack) ? number_format($gem_pack->amount_cents / 100, 2, '.', '') : '') }}" class="w-full border rounded px-3 py-2" min="0.01">
        @error('amount_dollars') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Badge Label</label>
        <input type="text" name="badge_label" value="{{ old('badge_label', $gem_pack->badge_label ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="50">
        @error('badge_label') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order</label>
        <input type="number" name="order_number" value="{{ old('order_number', $gem_pack->order_number ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $gem_pack->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="text-sm font-medium">Active</label>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.gem-packs.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
