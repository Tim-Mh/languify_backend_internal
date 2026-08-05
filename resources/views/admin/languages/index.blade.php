@extends('layouts.admin')

@section('title', 'Languages')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin.languages.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Language</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Flag</th>
                    <th class="px-4 py-2">Code</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Native Name</th>
                    <th class="px-4 py-2">Active</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($languages as $language)
                    <tr>
                        <td class="px-4 py-2 text-xl">{{ $language->flag_emoji }}</td>
                        <td class="px-4 py-2">{{ $language->code }}</td>
                        <td class="px-4 py-2">{{ $language->name }}</td>
                        <td class="px-4 py-2">{{ $language->native_name }}</td>
                        <td class="px-4 py-2">
                            @if ($language->is_active)
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Active</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 px-2 py-0.5 rounded text-sm">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.languages.edit', $language) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.languages.destroy', $language) }}" method="POST" class="inline" onsubmit="return confirm('Delete this language? This will also delete its chapters/units/lessons/exercises.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No languages yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $languages->links() }}
    </div>
@endsection
