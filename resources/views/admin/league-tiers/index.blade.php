@extends('layouts.admin')

@section('title', 'League Tiers')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">A user's league tier determines their weekly leaderboard cohort. Order ranks tiers from lowest to highest.</p>
        <a href="{{ route('admin.league-tiers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Tier</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Used By</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($tiers as $tier)
                    <tr>
                        <td class="px-4 py-2 font-semibold">{{ $tier->name }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ $tier->order_number }}</td>
                        <td class="px-4 py-2">{{ number_format($usageCounts->get($tier->id, 0)) }} users</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.league-tiers.edit', $tier) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.league-tiers.destroy', $tier) }}" method="POST" class="inline" onsubmit="return confirm('Delete this tier? Users currently in it will be moved back to the lowest tier the next time they open the leaderboard.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">No league tiers yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
