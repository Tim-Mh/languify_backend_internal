@php
    $unit ??= null;
    $defaults ??= [];
    $selected = (int) old('chapter_id', $unit?->chapter_id ?? $defaults['chapter_id'] ?? 0);
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label for="chapter_id" class="field-label">Chapter</label>
        <select id="chapter_id" name="chapter_id" required class="field-input">
            <option value="">Choose a chapter</option>
            @foreach ($chapters as $language => $group)
                <optgroup label="{{ $language }}">
                    @foreach ($group as $chapter)
                        <option value="{{ $chapter->id }}" @selected($selected === $chapter->id)>{{ $chapter->title }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
        @error('chapter_id') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="title" class="field-label">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $unit?->title) }}" required class="field-input" placeholder="Greetings">
        @error('title') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="order_number" class="field-label">Position</label>
        <input type="number" id="order_number" name="order_number" min="0" value="{{ old('order_number', $unit?->order_number ?? $defaults['order_number'] ?? 1) }}" required class="field-input">
        <p class="field-hint">Lower numbers come first in the chapter.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>
