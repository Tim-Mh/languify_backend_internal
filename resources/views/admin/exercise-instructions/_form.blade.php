@csrf
@if (isset($instruction))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Language</label>
        <select name="language_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" {{ (int) old('language_id', $instruction->language_id ?? '') === $language->id ? 'selected' : '' }}>
                    {{ $language->flag_emoji }} {{ $language->name }}
                </option>
            @endforeach
        </select>
        @error('language_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Exercise Type</label>
        <select name="exercise_type" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach ($types as $type)
                <option value="{{ $type->value }}" {{ old('exercise_type', $instruction->exercise_type->value ?? '') === $type->value ? 'selected' : '' }}>
                    {{ $type->value }}
                </option>
            @endforeach
        </select>
        @error('exercise_type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Template</label>
        <input type="text" name="template" value="{{ old('template', $instruction->template ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('template') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        <p class="text-xs text-gray-500 mt-1">Use {word}, {sentence}, {target_sentence}, {question} placeholders — filled in from the exercise's own data.</p>
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Fallback Template (optional)</label>
        <input type="text" name="fallback_template" value="{{ old('fallback_template', $instruction->fallback_template ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('fallback_template') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        <p class="text-xs text-gray-500 mt-1">Used instead of Template when an exercise's data is missing a placeholder the Template needs (e.g. a grammar-only multiple_choice exercise with no "word" field). Usually a fixed generic phrase with no placeholders.</p>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.exercise-instructions.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
