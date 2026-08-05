@csrf
@if (isset($lesson))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Unit</label>
        <select name="unit_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}" {{ (int) old('unit_id', $lesson->unit_id ?? '') === $unit->id ? 'selected' : '' }}>
                    {{ $unit->chapter->language->flag_emoji }} {{ $unit->chapter->language->name }} - {{ ucfirst($unit->chapter->chapter_key->value) }} - {{ $unit->title }}
                </option>
            @endforeach
        </select>
        @error('unit_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $lesson->title ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order Number</label>
        <input type="number" name="order_number" value="{{ old('order_number', $lesson->order_number ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.lessons.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
