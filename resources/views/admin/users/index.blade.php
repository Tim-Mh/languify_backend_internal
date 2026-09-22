@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <form method="GET" class="mb-4 flex flex-wrap items-end gap-3">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Search</label>
            <input type="text" name="search" value="{{ $search }}" placeholder="Name or email"
                   class="border rounded px-3 py-2 w-64">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
        @if ($search)
            <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-500 hover:underline">Clear</a>
        @endif
    </form>

    <x-per-page :paginator="$users" noun="users" />

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Verified</th>
                    <th class="px-4 py-2">Timezone</th>
                    <th class="px-4 py-2">Joined</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($users as $user)
                    <tr>
                        <td class="px-4 py-2">{{ $user->full_name ?: '—' }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">
                            @if ($user->email_verified_at)
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Verified</span>
                            @else
                                <span class="text-yellow-700 bg-yellow-100 px-2 py-0.5 rounded text-sm">Unverified</span>
                            @endif
                        </td>
                        {{-- The device-reported timezone. Day boundaries for streaks and
                             daily resets are computed in it, so it is the field that
                             explains "why did this learner's streak reset then?". --}}
                        <td class="px-4 py-2 text-sm text-gray-600">
                            @if ($user->timezone)
                                {{ $user->timezone }}
                            @else
                                <span class="text-gray-400">Not set</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.users.show', $user) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
