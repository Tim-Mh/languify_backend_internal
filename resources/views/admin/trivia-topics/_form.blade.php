@csrf
@if (isset($topic))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Language</label>
        <select name="language_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" {{ (int) old('language_id', $topic->language_id ?? '') === $language->id ? 'selected' : '' }}>
                    {{ $language->flag_emoji }} {{ $language->name }}
                </option>
            @endforeach
        </select>
        @error('language_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $topic->title ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Description</label>
        <input type="text" name="description" value="{{ old('description', $topic->description ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Icon</label>
        <select name="icon" class="w-full border rounded px-3 py-2">
            @foreach ($icons as $value => $label)
                <option value="{{ $value }}" @selected(old('icon', $topic->icon ?? '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('icon') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order</label>
        <input type="number" name="order_number" value="{{ old('order_number', $topic->order_number ?? ($nextOrder ?? 0)) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.trivia-topics.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
