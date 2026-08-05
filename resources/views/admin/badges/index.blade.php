@extends('layouts.admin')

@section('title', 'Badges')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">{{ number_format($totalAwards) }} total badge awards across all users.</p>
        <a href="{{ route('admin.badges.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Badge</a>
    </div>

    @foreach (['streak' => 'Streak Badges', 'xp' => 'XP Badges', 'lesson' => 'Lesson Badges'] as $category => $label)
        <h2 class="font-semibold mb-2 mt-6">{{ $label }}</h2>
        <div class="bg-white rounded-lg shadow overflow-hidden mb-4">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-sm text-gray-500">
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Tier</th>
                        <th class="px-4 py-2">Requirement</th>
                        <th class="px-4 py-2">Active</th>
                        <th class="px-4 py-2">Awarded To</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($badges->where('category', $category) as $badge)
                        <tr>
                            <td class="px-4 py-2">{{ $badge->title }}</td>
                            <td class="px-4 py-2 text-sm text-gray-500">{{ $badge->description }}</td>
                            <td class="px-4 py-2 text-sm">{{ $badge->tier }}</td>
                            <td class="px-4 py-2 text-sm text-gray-500">
                                {{ str_replace('_', ' ', $badge->requirement_type) }}
                                @if ($badge->requirement_type !== 'chapter_complete')
                                    &ge; {{ $badge->requirement_value }}
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                @if ($badge->is_active)
                                    <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Active</span>
                                @else
                                    <span class="text-gray-600 bg-gray-100 px-2 py-0.5 rounded text-sm">Inactive</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ number_format($counts->get($badge->key, 0)) }} users</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('admin.badges.edit', $badge) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.badges.destroy', $badge) }}" method="POST" class="inline" onsubmit="return confirm('Delete this badge? Any users who already earned it keep their historical award.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-6 text-center text-gray-500">No badges in this category.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endforeach
@endsection
