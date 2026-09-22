@extends('layouts.admin')

@section('title', 'Daily Quests')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">3 active quests are assigned to each user per day, adaptively — see each user's difficulty level rise as they complete quests, or ease back down if they don't.</p>
        <a href="{{ route('admin.quests.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Quest</a>
    </div>

    <x-per-page :paginator="$quests" noun="quests" />

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Requirement</th>
                    <th class="px-4 py-2">Difficulty</th>
                    <th class="px-4 py-2">Reward</th>
                    <th class="px-4 py-2">Active</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($quests as $quest)
                    <tr>
                        <td class="px-4 py-2">{{ $quest->title }}</td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $quest->description }}</td>
                        <td class="px-4 py-2 text-sm">{{ str_replace('_', ' ', $quest->requirement_type) }} &ge; {{ $quest->target_count }}</td>
                        <td class="px-4 py-2 text-sm">{{ ['Easy', 'Medium', 'Hard'][$quest->difficulty - 1] ?? $quest->difficulty }}</td>
                        <td class="px-4 py-2 text-sm">{{ $quest->gems_reward }} gems, {{ $quest->xp_reward }} xp</td>
                        <td class="px-4 py-2">
                            @if ($quest->is_active)
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Active</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 px-2 py-0.5 rounded text-sm">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.quests.edit', $quest) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.quests.destroy', $quest) }}" method="POST" class="inline" onsubmit="return confirm('Delete this quest?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">No quests yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $quests->links() }}
    </div>
@endsection
