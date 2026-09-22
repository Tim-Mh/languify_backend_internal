@extends('layouts.admin')

@section('title', 'Trivia Questions')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <form method="GET" class="flex items-end gap-2">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Topic</label>
                <select name="topic_id" onchange="this.form.submit()" class="border rounded px-3 py-2">
                    <option value="">All topics</option>
                    @foreach ($topics as $topic)
                        <option value="{{ $topic->id }}" @selected((string) $selectedTopicId === (string) $topic->id)>{{ $topic->title }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <a href="{{ route('admin.trivia-questions.create', $selectedTopicId ? ['topic_id' => $selectedTopicId] : []) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Question</a>
    </div>

    <x-per-page :paginator="$questions" noun="questions" />

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Topic</th>
                    <th class="px-4 py-2">Question</th>
                    <th class="px-4 py-2">Correct Answer</th>
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($questions as $question)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $question->topic?->title }}</td>
                        <td class="px-4 py-2">{{ \Illuminate\Support\Str::limit($question->question, 80) }}</td>
                        <td class="px-4 py-2 text-sm text-green-700">{{ $question->options[$question->correct_index] ?? '—' }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ $question->order_number }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.trivia-questions.edit', $question) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.trivia-questions.destroy', $question) }}" method="POST" class="inline" onsubmit="return confirm('Delete this question?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No trivia questions yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $questions->links() }}
    </div>
@endsection
