@php
    $exercise ??= null;
    $defaults ??= [];
    $selectedLesson = (int) old('lesson_id', $exercise?->lesson_id ?? $defaults['lesson_id'] ?? 0);
    $selectedType = old('type', $exercise?->type->value);

    // One worked example per type, shown under the content box for whichever
    // type is picked.
    $examples = [
        'match_pairs' => ['{"word": "Coffee", "options": [{"text": "Coffee", "image": "/img.png"}, {"text": "Tea", "image": "/tea.png"}], "correct_answer": "Coffee"}', 'Pick the picture that matches the word.'],
        'fill_blank' => ['{"sentence": "Give me tea ____!", "options": ["please", "or"], "correct_answer": "please"}', 'Fill the gap in a sentence.'],
        'tap_word' => ['{"target_sentence": "I have a dog", "words": ["dog", "I", "a", "have"], "correct_order": ["I", "have", "a", "dog"]}', 'Tap the words in the right order.'],
        'listen_select' => ['{"audio_text": "Milk", "audio_url": "/audio.mp3", "options": ["Milk", "Tea"], "correct_answer": "Milk"}', 'Hear a word and pick it.'],
        'multiple_choice' => ['{"question": "What does \\"Hello\\" mean?", "options": ["Greeting", "Sorry"], "correct_answer": "Greeting"}', 'One question, a few answers.'],
        'translate' => ['{"prompt_words": [{"text": "Un", "en": "a"}, {"text": "café", "en": "coffee"}], "word_bank": ["A", "coffee", "tea"], "correct": ["A", "coffee"]}', 'Learners tap native-language tiles to translate the phrase. Every entry in "correct" must also be in "word_bank" (repeat a tile if a word is used twice).'],
        'paragraph_translation' => ['{"source_text": {"en": "...", "es": "...", "de": "...", "fr": "...", "ja": "...", "ko": "..."}, "reference_translation": "..."}', 'The paragraph is shown in the learner\'s own language; "reference_translation" is the right answer in the language being learned.'],
    ];
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label for="lesson_id" class="field-label">Lesson</label>
        <select id="lesson_id" name="lesson_id" required class="field-input">
            <option value="">Choose a lesson</option>
            @foreach ($lessons as $group => $groupLessons)
                <optgroup label="{{ $group }}">
                    @foreach ($groupLessons as $lesson)
                        <option value="{{ $lesson->id }}" @selected($selectedLesson === $lesson->id)>{{ $lesson->title }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
        @error('lesson_id') <p class="field-error">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="type" class="field-label">Type</label>
        <select id="type" name="type" required class="field-input">
            <option value="">Choose a type</option>
            @foreach ($types as $type)
                <option value="{{ $type->value }}" @selected($selectedType === $type->value)>{{ $type->label() }}</option>
            @endforeach
        </select>
        @error('type') <p class="field-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="session_number" class="field-label">Play</label>
        <input type="number" id="session_number" name="session_number" min="1" value="{{ old('session_number', $exercise?->session_number ?? $defaults['session_number'] ?? 1) }}" required class="field-input">
        <p class="field-hint">Which time through the lesson this shows up. Learners get play 1 the first time, play 2 the second, and so on. Leave at 1 if the lesson has one set.</p>
        @error('session_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="order_number" class="field-label">Position</label>
        <input type="number" id="order_number" name="order_number" min="0" value="{{ old('order_number', $exercise?->order_number ?? $defaults['order_number'] ?? 1) }}" required class="field-input">
        <p class="field-hint">Lower numbers come first within the play.</p>
        @error('order_number') <p class="field-error">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <div class="mb-1.5 flex items-center justify-between gap-3">
            <label for="data" class="field-label !mb-0">Content (JSON)</label>
            <span class="flex items-center gap-3">
                <span id="json-state" class="text-xs font-bold" aria-live="polite"></span>
                <button type="button" id="json-format" class="text-xs font-bold text-brand-600 hover:underline">Tidy up</button>
            </span>
        </div>
        <textarea id="data" name="data" rows="12" required spellcheck="false" class="field-input font-mono text-sm">{{ old('data', $exercise ? json_encode($exercise->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : '') }}</textarea>
        @error('data') <p class="field-error">{{ $message }}</p> @enderror

        <div class="mt-3 rounded-xl bg-gray-50 p-4 text-sm ring-1 ring-gray-100">
            @foreach ($examples as $key => [$json, $hint])
                <div data-example="{{ $key }}" @if ($selectedType !== $key) hidden @endif>
                    <p class="font-bold text-ink-800">Example</p>
                    <p class="mt-0.5 text-gray-600">{{ $hint }}</p>
                    <pre class="mt-2 whitespace-pre-wrap break-all rounded-lg bg-white p-3 font-mono text-xs text-gray-700 ring-1 ring-gray-200">{{ $json }}</pre>
                    <button type="button" data-use-example="{{ $key }}" class="mt-2 text-xs font-bold text-brand-600 hover:underline">Start from this example</button>
                </div>
            @endforeach
            <p data-example="" class="text-gray-500" @if ($selectedType) hidden @endif>Pick a type to see an example of its content.</p>
            <p class="mt-3 border-t border-gray-200 pt-3 text-xs text-gray-500">
                <strong>Hover hints:</strong> adding an <code>"en"</code> value to a word or option makes it hoverable in the app. Hints show by themselves while a word is still new to that learner.
            </p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    (() => {
        const examples = @json(collect($examples)->map(fn ($e) => $e[0]));
        const type = document.getElementById('type');
        const data = document.getElementById('data');
        const state = document.getElementById('json-state');

        const showExample = () => {
            document.querySelectorAll('[data-example]').forEach((el) => { el.hidden = el.dataset.example !== type.value; });
        };

        // Says whether the content parses, as it is typed, so a missing comma
        // is caught before Save rather than after.
        const check = () => {
            if (!data.value.trim()) { state.textContent = ''; return null; }
            try {
                const parsed = JSON.parse(data.value);
                state.textContent = 'Valid JSON';
                state.className = 'text-xs font-bold text-emerald-600';
                return parsed;
            } catch (e) {
                state.textContent = 'Not valid JSON yet';
                state.className = 'text-xs font-bold text-rose-600';
                return null;
            }
        };

        type.addEventListener('change', showExample);
        data.addEventListener('input', check);
        document.getElementById('json-format').addEventListener('click', () => {
            const parsed = check();
            if (parsed !== null) data.value = JSON.stringify(parsed, null, 4);
        });
        document.querySelectorAll('[data-use-example]').forEach((button) => button.addEventListener('click', () => {
            data.value = JSON.stringify(JSON.parse(examples[button.dataset.useExample]), null, 4);
            check();
            data.focus();
        }));
        check();
    })();
</script>
@endpush
