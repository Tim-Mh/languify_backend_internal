@csrf
@if (isset($option))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Attribute Type</label>
        <select name="attribute_type" class="w-full border rounded px-3 py-2">
            @foreach ($attributeTypes as $type)
                <option value="{{ $type }}" @selected(old('attribute_type', $option->attribute_type ?? $selectedType ?? null) === $type)>
                    {{ $type }}
                </option>
            @endforeach
        </select>
        @error('attribute_type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Value (DiceBear option string, or hex color)</label>
        <input type="text" name="value" value="{{ old('value', $option->value ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="64">
        @error('value') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Price (Gems)</label>
        <input type="number" name="price_gems" value="{{ old('price_gems', $option->price_gems ?? 0) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('price_gems') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order</label>
        <input type="number" name="order_number" value="{{ old('order_number', $option->order_number ?? ($nextOrder ?? 0)) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_default" id="is_default" value="1" {{ old('is_default', $option->is_default ?? false) ? 'checked' : '' }}>
        <label for="is_default" class="text-sm font-medium">Default (free, unlocked for every new user)</label>
    </div>
</div>

<p class="mt-3 text-xs text-gray-500">Only one option per attribute type should be marked Default — that's the free starting look every user gets.</p>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.avatar-options.index', ['attribute_type' => $option->attribute_type ?? $selectedType ?? null]) }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
