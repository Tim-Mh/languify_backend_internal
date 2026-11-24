@php
    $chapter ??= null;
    $defaults ??= [];
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="language_id" class="field-label">Language</label>
        <select id="language_id" name="language_id" required class="field-input">
            <option value="">Choose a language</option>
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" @selected((int) old('language_id', $chapter?->language_id ?? $defaults['language_id'] ?? 0) === $language->id)>{{ $language->flag_emoji }} {{ $language->name }}</option>
            @endforeach
        </select>
        @error('language_id') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="chapter_key" class="field-label">Kind of chapter</label>
        <select id="chapter_key" name="chapter_key" required class="field-input">
            <option value="">Choose one</option>
            @foreach ($chapterKeys as $key)
                <option value="{{ $key->value }}" @selected(old('chapter_key', $chapter?->chapter_key->value) === $key->value)>{{ ucfirst(str_replace('_', ' ', $key->value)) }}</option>
            @endforeach
        </select>
        <p class="field-hint">Each language has one chapter of each kind. The app uses it for the chapter's look.</p>
        @error('chapter_key') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="title" class="field-label">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $chapter?->title) }}" required class="field-input" placeholder="Beginner">
        @error('title') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="order_number" class="field-label">Position</label>
        <input type="number" id="order_number" name="order_number" min="0" value="{{ old('order_number', $chapter?->order_number ?? $defaults['order_number'] ?? 1) }}" required class="field-input">
        <p class="field-hint">Lower numbers come first in the course.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>
