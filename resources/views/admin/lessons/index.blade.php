@extends('layouts.admin')

@section('title', 'Lessons')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin.lessons.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Lesson</a>
    </div>

    <x-per-page :paginator="$lessons" noun="lessons" />

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Language</th>
                    <th class="px-4 py-2">Chapter</th>
                    <th class="px-4 py-2">Unit</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($lessons as $lesson)
                    <tr>
                        <td class="px-4 py-2">{{ $lesson->unit->chapter->language->flag_emoji }} {{ $lesson->unit->chapter->language->name }}</td>
                        <td class="px-4 py-2">{{ ucfirst($lesson->unit->chapter->chapter_key->value) }}</td>
                        <td class="px-4 py-2">{{ $lesson->unit->title }}</td>
                        <td class="px-4 py-2">{{ $lesson->title }}</td>
                        <td class="px-4 py-2">{{ $lesson->order_number }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.lessons.edit', $lesson) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.lessons.destroy', $lesson) }}" method="POST" class="inline" onsubmit="return confirm('Delete this lesson? This will also delete its exercises.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No lessons yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $lessons->links() }}
    </div>
@endsection
