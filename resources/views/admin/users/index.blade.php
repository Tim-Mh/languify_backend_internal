@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <form method="GET" class="mb-4 flex flex-wrap items-end gap-3">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Search</label>
            <input type="text" name="search" value="{{ $search }}" placeholder="Name or email"
                   class="border rounded px-3 py-2 w-64">
        </div>
        <div>
            <label class="block text-xs text-gray-500 mb-1">Role</label>
            <select name="role" class="border rounded px-3 py-2">
                <option value="">All roles</option>
                <option value="user" @selected($role === 'user')>User</option>
                <option value="admin" @selected($role === 'admin')>Admin</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
        @if ($search || $role)
            <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-500 hover:underline">Clear</a>
        @endif
    </form>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-500">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2">Verified</th>
                    <th class="px-4 py-2">Course</th>
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
                            @if ($user->role === 'admin')
                                <span class="text-purple-700 bg-purple-100 px-2 py-0.5 rounded text-sm">Admin</span>
                            @else
                                <span class="text-gray-600 bg-gray-100 px-2 py-0.5 rounded text-sm">User</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if ($user->email_verified_at)
                                <span class="text-green-700 bg-green-100 px-2 py-0.5 rounded text-sm">Verified</span>
                            @else
                                <span class="text-yellow-700 bg-yellow-100 px-2 py-0.5 rounded text-sm">Unverified</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-600">
                            @if ($user->learningLanguage)
                                {{ $user->nativeLanguage?->code }} → {{ $user->learningLanguage->code }}
                            @else
                                —
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
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
