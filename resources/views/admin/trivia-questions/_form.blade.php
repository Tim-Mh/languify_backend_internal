@csrf
@if (isset($question))
    @method('PUT')
@endif

@php
    $options = old('options', $question->options ?? ['', '', '', '']);
    $correctIndex = old('correct_index', $question->correct_index ?? 0);
@endphp

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Topic</label>
        <select name="topic_id" class="w-full border rounded px-3 py-2">
            @foreach ($topics as $topic)
                <option value="{{ $topic->id }}" @selected(old('topic_id', $question->topic_id ?? ($selectedTopicId ?? null)) == $topic->id)>{{ $topic->title }}</option>
            @endforeach
        </select>
        @error('topic_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    @if (isset($question))
        <div>
            <label class="block text-sm font-medium mb-1">Order</label>
            <input type="number" name="order_number" value="{{ old('order_number', $question->order_number) }}" class="w-full border rounded px-3 py-2">
            @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
    @else
        <div class="flex items-end text-xs text-gray-500">
            This question will be added to the end of the topic's list automatically.
        </div>
    @endif

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Question</label>
        <textarea name="question" rows="2" class="w-full border rounded px-3 py-2">{{ old('question', $question->question ?? '') }}</textarea>
        @error('question') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-2">Options — select the correct one</label>
        <div class="space-y-2">
            @for ($i = 0; $i < 4; $i++)
                <div class="flex items-center gap-2">
                    <input type="radio" name="correct_index" value="{{ $i }}" @checked((int) $correctIndex === $i) required>
                    <input type="text" name="options[{{ $i }}]" value="{{ $options[$i] ?? '' }}" placeholder="Option {{ $i + 1 }}" class="w-full border rounded px-3 py-2">
                </div>
            @endfor
        </div>
        @error('options') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        @error('options.*') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        @error('correct_index') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.trivia-questions.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
