@extends('layouts.admin')

@section('title', 'Alphabet Letters')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">The characters shown in each language's "Learn the Alphabet" screen, in order.</p>
        <a href="{{ route('admin.alphabet-letters.create', ['language_id' => $selectedLanguage?->id]) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Letter</a>
    </div>

    <form method="GET" class="mb-4">
        <label class="block text-sm font-medium mb-1">Language</label>
        <select name="language_id" onchange="this.form.submit()" class="border rounded px-3 py-2">
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" @selected($selectedLanguage?->id === $language->id)>{{ $language->name }}</option>
            @endforeach
        </select>
    </form>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Character</th>
                    <th class="px-4 py-2">Romanization</th>
                    <th class="px-4 py-2">Example word</th>
                    <th class="px-4 py-2">Script group</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($letters as $letter)
                    <tr>
                        <td class="px-4 py-2 text-gray-500">{{ $letter->order_number }}</td>
                        <td class="px-4 py-2 font-semibold text-lg">{{ $letter->character }}</td>
                        <td class="px-4 py-2">{{ $letter->romanization }}</td>
                        <td class="px-4 py-2">{{ $letter->example_word }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ $letter->script_group }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.alphabet-letters.edit', $letter) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.alphabet-letters.destroy', $letter) }}" method="POST" class="inline" onsubmit="return confirm('Delete this letter?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No letters for this language yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
