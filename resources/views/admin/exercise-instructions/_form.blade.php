@php
    $instruction ??= null;
    $defaults ??= [];
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="language_id" class="field-label">Learner's language</label>
        <select id="language_id" name="language_id" required class="field-input">
            <option value="">Choose a language</option>
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" @selected((int) old('language_id', $instruction?->language_id ?? $defaults['language_id'] ?? 0) === $language->id)>{{ $language->flag_emoji }} {{ $language->name }}</option>
            @endforeach
        </select>
        @error('language_id') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="exercise_type" class="field-label">Exercise type</label>
        <select id="exercise_type" name="exercise_type" required class="field-input">
            <option value="">Choose a type</option>
            @foreach ($types as $type)
                <option value="{{ $type->value }}" @selected(old('exercise_type', $instruction?->exercise_type->value ?? $defaults['exercise_type'] ?? null) === $type->value)>{{ $type->label() }}</option>
            @endforeach
        </select>
        @error('exercise_type') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="template" class="field-label">Instruction</label>
        <input type="text" id="template" name="template" dir="auto" value="{{ old('template', $instruction?->template) }}" required maxlength="1000" class="field-input" placeholder="Pick the right word for {word}">
        <p class="field-hint">Write it in the learner's language. These spots are filled in from each exercise: <code>{word}</code> <code>{sentence}</code> <code>{target_sentence}</code> <code>{question}</code></p>
        @error('template') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>
