@extends('layouts.admin')

@section('title', 'Trivia Topics')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin.trivia-topics.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Topic</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Language</th>
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Key</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Questions</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($topics as $topic)
                    <tr>
                        <td class="px-4 py-2 text-gray-500">{{ $topic->language?->flag_emoji }} {{ $topic->language?->name }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ $topic->order_number }}</td>
                        <td class="px-4 py-2">{{ $topic->key }}</td>
                        <td class="px-4 py-2">{{ $topic->title }}</td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $topic->description }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.trivia-questions.index', ['topic_id' => $topic->id]) }}" class="text-blue-600 hover:underline">
                                {{ $topic->questions_count }} questions
                            </a>
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.trivia-topics.edit', $topic) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.trivia-topics.destroy', $topic) }}" method="POST" class="inline" onsubmit="return confirm('Delete this topic? This will also delete its questions.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">No trivia topics yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $topics->links() }}
    </div>
@endsection
