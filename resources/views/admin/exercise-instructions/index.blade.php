@extends('layouts.admin')

@section('title', 'Exercise Instructions')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin.exercise-instructions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Instruction</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Language</th>
                    <th class="px-4 py-2">Exercise Type</th>
                    <th class="px-4 py-2">Template</th>
                    <th class="px-4 py-2">Fallback Template</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($instructions as $instruction)
                    <tr>
                        <td class="px-4 py-2">{{ $instruction->language->flag_emoji }} {{ $instruction->language->name }}</td>
                        <td class="px-4 py-2">{{ $instruction->exercise_type->value }}</td>
                        <td class="px-4 py-2">{{ $instruction->template }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ $instruction->fallback_template ?? '—' }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.exercise-instructions.edit', $instruction) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.exercise-instructions.destroy', $instruction) }}" method="POST" class="inline" onsubmit="return confirm('Delete this instruction?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No instructions yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $instructions->links() }}
    </div>
@endsection
