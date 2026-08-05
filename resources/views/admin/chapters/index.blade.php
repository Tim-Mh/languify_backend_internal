@extends('layouts.admin')

@section('title', 'Chapters')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin.chapters.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Chapter</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Language</th>
                    <th class="px-4 py-2">Key</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($chapters as $chapter)
                    <tr>
                        <td class="px-4 py-2">{{ $chapter->language->flag_emoji }} {{ $chapter->language->name }}</td>
                        <td class="px-4 py-2">{{ $chapter->chapter_key->value }}</td>
                        <td class="px-4 py-2">{{ $chapter->title }}</td>
                        <td class="px-4 py-2">{{ $chapter->order_number }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.chapters.edit', $chapter) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.chapters.destroy', $chapter) }}" method="POST" class="inline" onsubmit="return confirm('Delete this chapter? This will also delete its units/lessons/exercises.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No chapters yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $chapters->links() }}
    </div>
@endsection
