@csrf
@if (isset($unit))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Chapter</label>
        <select name="chapter_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach ($chapters as $chapter)
                <option value="{{ $chapter->id }}" {{ (int) old('chapter_id', $unit->chapter_id ?? '') === $chapter->id ? 'selected' : '' }}>
                    {{ $chapter->language->flag_emoji }} {{ $chapter->language->name }} - {{ ucfirst($chapter->chapter_key->value) }}
                </option>
            @endforeach
        </select>
        @error('chapter_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $unit->title ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order Number</label>
        <input type="number" name="order_number" value="{{ old('order_number', $unit->order_number ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.units.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
