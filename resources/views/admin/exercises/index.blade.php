@extends('layouts.admin')

@section('title', 'Exercises')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin.exercises.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Exercise</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Lesson</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Data</th>
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($exercises as $exercise)
                    <tr>
                        <td class="px-4 py-2">
                            {{ $exercise->lesson->unit->chapter->language->flag_emoji }}
                            {{ ucfirst($exercise->lesson->unit->chapter->chapter_key->value) }} /
                            {{ $exercise->lesson->unit->title }} /
                            {{ $exercise->lesson->title }}
                        </td>
                        <td class="px-4 py-2">{{ $exercise->type->value }}</td>
                        <td class="px-4 py-2 max-w-md truncate text-sm text-gray-500">{{ json_encode($exercise->data) }}</td>
                        <td class="px-4 py-2">{{ $exercise->order_number }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.exercises.edit', $exercise) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.exercises.destroy', $exercise) }}" method="POST" class="inline" onsubmit="return confirm('Delete this exercise?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No exercises yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $exercises->links() }}
    </div>
@endsection
