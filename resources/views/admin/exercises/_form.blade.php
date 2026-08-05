@csrf
@if (isset($exercise))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Lesson</label>
        <select name="lesson_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach ($lessons as $lesson)
                <option value="{{ $lesson->id }}" {{ (int) old('lesson_id', $exercise->lesson_id ?? '') === $lesson->id ? 'selected' : '' }}>
                    {{ $lesson->unit->chapter->language->flag_emoji }} {{ ucfirst($lesson->unit->chapter->chapter_key->value) }} / {{ $lesson->unit->title }} / {{ $lesson->title }}
                </option>
            @endforeach
        </select>
        @error('lesson_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Type</label>
        <select name="type" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach ($types as $type)
                <option value="{{ $type->value }}" {{ old('type', $exercise->type->value ?? '') === $type->value ? 'selected' : '' }}>
                    {{ $type->value }}
                </option>
            @endforeach
        </select>
        @error('type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order Number</label>
        <input type="number" name="order_number" value="{{ old('order_number', $exercise->order_number ?? 0) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Session Number</label>
        <input type="number" name="session_number" min="1" value="{{ old('session_number', $exercise->session_number ?? 1) }}" class="w-full border rounded px-3 py-2">
        @error('session_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        <p class="text-xs text-gray-500 mt-1">
            Which play of the lesson serves this exercise. A learner gets session 1 on their first play,
            session 2 on the second, and so on (capped at the highest session authored). Leave at 1 for
            lessons that aren't split into sessions.
        </p>
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Data (JSON)</label>
        <textarea name="data" rows="10" class="w-full border rounded px-3 py-2 font-mono text-sm">{{ old('data', isset($exercise) ? json_encode($exercise->data, JSON_PRETTY_PRINT) : '') }}</textarea>
        @error('data') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        <div class="text-xs text-gray-500 mt-2 space-y-1">
            <p><strong>match_pairs:</strong> {"word": "Coffee", "options": [{"text": "Coffee", "image": "/img.png"}, ...], "correct_answer": "Coffee"}</p>
            <p><strong>fill_blank:</strong> {"sentence": "Give me tea ____!", "options": ["please", "or"], "correct_answer": "please"}</p>
            <p><strong>tap_word:</strong> {"target_sentence": "I have a dog", "words": ["dog", "I", "a", "have"], "correct_order": ["I", "have", "a", "dog"]}</p>
            <p><strong>listen_select:</strong> {"audio_text": "Milk", "audio_url": "/audio.mp3", "options": ["Milk", "Tea"], "correct_answer": "Milk"}</p>
            <p><strong>multiple_choice:</strong> {"question": "What does \"Hello\" mean?", "options": ["Greeting", "Sorry"], "correct_answer": "Greeting"}</p>
            <p><strong>translate:</strong> {"prompt_words": [{"text": "Un", "en": "a"}, {"text": "café", "en": "coffee"}], "word_bank": ["A", "coffee", "tea"], "correct": ["A", "coffee"]} — the learner taps native-language tiles to build the translation of the course-language phrase. Every entry in <em>correct</em> must exist in <em>word_bank</em> (repeat a tile if a word is used twice).</p>
            <p class="pt-1"><strong>Hover hints:</strong> an <em>en</em> value on a word/option makes it hoverable in the app. Hints are shown automatically while a word is new or not yet retained by that learner — you don't set that here.</p>
            <p><strong>paragraph_translation:</strong> {"source_text": {"en": "...", "es": "...", "de": "...", "fr": "...", "ja": "...", "ko": "..."}, "reference_translation": "..."} — source_text is shown in the learner's native language; reference_translation is the correct answer in this exercise's own learning language (should match one of the source_text entries for that language).</p>
        </div>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.exercises.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
