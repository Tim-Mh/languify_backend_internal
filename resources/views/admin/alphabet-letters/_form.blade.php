@csrf
@if (isset($letter))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Language</label>
        <select name="language_id" class="w-full border rounded px-3 py-2">
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" @selected(old('language_id', $letter->language_id ?? $selectedLanguageId ?? null) == $language->id)>
                    {{ $language->name }}
                </option>
            @endforeach
        </select>
        @error('language_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Character</label>
        <input type="text" name="character" value="{{ old('character', $letter->character ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="20">
        @error('character') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Romanization / pronunciation</label>
        <input type="text" name="romanization" value="{{ old('romanization', $letter->romanization ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="50">
        @error('romanization') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Example word</label>
        <input type="text" name="example_word" value="{{ old('example_word', $letter->example_word ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="100">
        @error('example_word') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Script group (optional, e.g. hiragana/katakana)</label>
        <input type="text" name="script_group" value="{{ old('script_group', $letter->script_group ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="50">
        @error('script_group') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order</label>
        <input type="number" name="order_number" value="{{ old('order_number', $letter->order_number ?? ($nextOrder ?? 0)) }}" class="w-full border rounded px-3 py-2" min="0">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.alphabet-letters.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
