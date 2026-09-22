@extends('layouts.admin')

@section('title', 'Chest Reward Configs')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin.chest-reward-configs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Chest Reward Config</a>
    </div>

    <x-per-page :paginator="$chestRewardConfigs" noun="configs" />

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Chest Type</th>
                    <th class="px-4 py-2">Reference</th>
                    <th class="px-4 py-2">Label</th>
                    <th class="px-4 py-2">Reward Range</th>
                    <th class="px-4 py-2">Active</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($chestRewardConfigs as $config)
                    <tr>
                        <td class="px-4 py-2">{{ $config->chest_type->value }}</td>
                        <td class="px-4 py-2">{{ $config->reference ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $config->label }}</td>
                        <td class="px-4 py-2 text-sm text-gray-600">
                            gems: {{ $config->min_gems }}-{{ $config->max_gems }},
                            xp: {{ $config->min_xp }}-{{ $config->max_xp }},
                            hearts: {{ $config->min_hearts }}-{{ $config->max_hearts }}
                        </td>
                        <td class="px-4 py-2">
                            @if ($config->is_active)
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Active</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 px-2 py-0.5 rounded text-sm">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.chest-reward-configs.edit', $config) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.chest-reward-configs.destroy', $config) }}" method="POST" class="inline" onsubmit="return confirm('Delete this chest reward config?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No chest reward configs yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $chestRewardConfigs->links() }}
    </div>
@endsection
