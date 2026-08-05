@extends('layouts.admin')

@section('title', 'Badge Tiers')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">A badge's tier determines the gems/XP/hearts it awards when earned.</p>
        <a href="{{ route('admin.badge-tiers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Tier</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Gems</th>
                    <th class="px-4 py-2">XP</th>
                    <th class="px-4 py-2">Hearts</th>
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Used By</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($tiers as $tier)
                    <tr>
                        <td class="px-4 py-2 font-semibold">{{ $tier->name }}</td>
                        <td class="px-4 py-2">{{ $tier->gems_reward }}</td>
                        <td class="px-4 py-2">{{ $tier->xp_reward }}</td>
                        <td class="px-4 py-2">{{ $tier->hearts_reward }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ $tier->order_number }}</td>
                        <td class="px-4 py-2">{{ number_format($usageCounts->get($tier->name, 0)) }} badges</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.badge-tiers.edit', $tier) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.badge-tiers.destroy', $tier) }}" method="POST" class="inline" onsubmit="return confirm('Delete this tier? Badges still using it will grant no reward until reassigned.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">No badge tiers yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
