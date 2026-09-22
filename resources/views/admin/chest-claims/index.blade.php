@extends('layouts.admin')

@section('title', 'Chest Claims')

@section('content')
    <form method="GET" class="mb-4 flex items-end gap-3">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Chest Type</label>
            <select name="chest_type" onchange="this.form.submit()" class="border rounded px-3 py-2">
                <option value="">All types</option>
                @foreach ($chestTypes as $type)
                    <option value="{{ $type->value }}" @selected($selectedType === $type->value)>{{ ucfirst(str_replace('_', ' ', $type->value)) }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <x-per-page :paginator="$claims" noun="claims" />

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Chest Type</th>
                    <th class="px-4 py-2">Reference</th>
                    <th class="px-4 py-2">Gems</th>
                    <th class="px-4 py-2">XP</th>
                    <th class="px-4 py-2">Hearts</th>
                    <th class="px-4 py-2">Claimed At</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($claims as $claim)
                    <tr>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.users.show', $claim->user_id) }}" class="text-blue-600 hover:underline">{{ $claim->user?->email ?? 'User #' . $claim->user_id }}</a>
                        </td>
                        <td class="px-4 py-2 capitalize">{{ str_replace('_', ' ', $claim->chest_type->value) }}</td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $claim->reference }}</td>
                        <td class="px-4 py-2">{{ $claim->gems_awarded }}</td>
                        <td class="px-4 py-2">{{ $claim->xp_awarded }}</td>
                        <td class="px-4 py-2">{{ $claim->hearts_awarded }}</td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $claim->claimed_at?->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">No chest claims yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $claims->links() }}
    </div>
@endsection
