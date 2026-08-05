@csrf
@if (isset($chapter))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Language</label>
        <select name="language_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" {{ (int) old('language_id', $chapter->language_id ?? '') === $language->id ? 'selected' : '' }}>
                    {{ $language->flag_emoji }} {{ $language->name }}
                </option>
            @endforeach
        </select>
        @error('language_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Chapter Key</label>
        <select name="chapter_key" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach ($chapterKeys as $key)
                <option value="{{ $key->value }}" {{ old('chapter_key', $chapter->chapter_key->value ?? '') === $key->value ? 'selected' : '' }}>
                    {{ ucfirst($key->value) }}
                </option>
            @endforeach
        </select>
        @error('chapter_key') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $chapter->title ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order Number</label>
        <input type="number" name="order_number" value="{{ old('order_number', $chapter->order_number ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.chapters.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
