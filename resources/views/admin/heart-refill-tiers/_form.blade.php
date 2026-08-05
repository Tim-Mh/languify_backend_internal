@csrf
@if (isset($heart_refill_tier))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Key</label>
        <input type="text" name="key" value="{{ old('key', $heart_refill_tier->key ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="50">
        @error('key') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $heart_refill_tier->title ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="255">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Subtitle</label>
        <input type="text" name="subtitle" value="{{ old('subtitle', $heart_refill_tier->subtitle ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="255">
        @error('subtitle') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Hearts Granted</label>
        <input type="number" name="hearts" value="{{ old('hearts', $heart_refill_tier->hearts ?? 1) }}" class="w-full border rounded px-3 py-2" min="1" max="5">
        @error('hearts') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Price (Gems)</label>
        <input type="number" name="price_gems" value="{{ old('price_gems', $heart_refill_tier->price_gems ?? 1) }}" class="w-full border rounded px-3 py-2" min="1">
        @error('price_gems') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Badge Label</label>
        <input type="text" name="badge_label" value="{{ old('badge_label', $heart_refill_tier->badge_label ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="50">
        @error('badge_label') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order</label>
        <input type="number" name="order_number" value="{{ old('order_number', $heart_refill_tier->order_number ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $heart_refill_tier->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="text-sm font-medium">Active</label>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.heart-refill-tiers.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
