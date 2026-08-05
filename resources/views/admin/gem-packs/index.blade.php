@extends('layouts.admin')

@section('title', 'Gem Packs')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin.gem-packs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Gem Pack</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Key</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Gems</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Badge Label</th>
                    <th class="px-4 py-2">Active</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($gemPacks as $pack)
                    <tr>
                        <td class="px-4 py-2">{{ $pack->key }}</td>
                        <td class="px-4 py-2">{{ $pack->title }}</td>
                        <td class="px-4 py-2">{{ $pack->gems }}</td>
                        <td class="px-4 py-2">${{ number_format($pack->amount_cents / 100, 2) }}</td>
                        <td class="px-4 py-2">{{ $pack->badge_label ?? '—' }}</td>
                        <td class="px-4 py-2">
                            @if ($pack->is_active)
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Active</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 px-2 py-0.5 rounded text-sm">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.gem-packs.edit', $pack) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.gem-packs.destroy', $pack) }}" method="POST" class="inline" onsubmit="return confirm('Delete this gem pack?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">No gem packs yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $gemPacks->links() }}
    </div>
@endsection
