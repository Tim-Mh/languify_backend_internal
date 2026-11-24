@php $letter ??= null; @endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label for="language_id" class="field-label">Language</label>
        <select id="language_id" name="language_id" required class="field-input">
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" @selected((int) old('language_id', $letter?->language_id ?? $selectedLanguageId ?? 0) === $language->id)>{{ $language->flag_emoji }} {{ $language->name }}</option>
            @endforeach
        </select>
        @error('language_id') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="character" class="field-label">Letter</label>
        <input type="text" id="character" name="character" value="{{ old('character', $letter?->character) }}" required maxlength="20" class="field-input text-2xl" placeholder="あ">
        @error('character') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="romanization" class="field-label">How it sounds</label>
        <input type="text" id="romanization" name="romanization" value="{{ old('romanization', $letter?->romanization) }}" maxlength="50" class="field-input" placeholder="a">
        <p class="field-hint">Written in Latin letters.</p>
        @error('romanization') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="example_word" class="field-label">Example word</label>
        <input type="text" id="example_word" name="example_word" value="{{ old('example_word', $letter?->example_word) }}" maxlength="100" class="field-input" placeholder="あめ (ame, rain)">
        @error('example_word') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="order_number" class="field-label">Position</label>
        <input type="number" id="order_number" name="order_number" min="0" value="{{ old('order_number', $letter?->order_number ?? $nextOrder ?? 0) }}" required class="field-input">
        <p class="field-hint">Lower numbers come first.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>
