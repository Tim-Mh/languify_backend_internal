@extends('layouts.admin')

@section('title', 'Heart Refill Tiers')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin.heart-refill-tiers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Heart Refill Tier</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Key</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Subtitle</th>
                    <th class="px-4 py-2">Hearts Granted</th>
                    <th class="px-4 py-2">Price (Gems)</th>
                    <th class="px-4 py-2">Badge Label</th>
                    <th class="px-4 py-2">Active</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($heartRefillTiers as $tier)
                    <tr>
                        <td class="px-4 py-2">{{ $tier->key }}</td>
                        <td class="px-4 py-2">{{ $tier->title }}</td>
                        <td class="px-4 py-2">{{ $tier->subtitle ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $tier->hearts }}</td>
                        <td class="px-4 py-2">{{ $tier->price_gems }}</td>
                        <td class="px-4 py-2">{{ $tier->badge_label ?? '—' }}</td>
                        <td class="px-4 py-2">
                            @if ($tier->is_active)
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Active</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 px-2 py-0.5 rounded text-sm">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.heart-refill-tiers.edit', $tier) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.heart-refill-tiers.destroy', $tier) }}" method="POST" class="inline" onsubmit="return confirm('Delete this heart refill tier?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">No heart refill tiers yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $heartRefillTiers->links() }}
    </div>
@endsection
