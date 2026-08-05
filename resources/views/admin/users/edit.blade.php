@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium mb-1">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}" class="w-full border rounded px-3 py-2">
                @error('full_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2">
                @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Role</label>
                <select name="role" class="w-full border rounded px-3 py-2">
                    <option value="user" @selected(old('role', $user->role) === 'user')>User</option>
                    <option value="admin" @selected(old('role', $user->role) === 'admin')>Admin</option>
                </select>
                @error('role') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="email_verified" value="1" @checked($user->email_verified_at)>
                Email verified
            </label>

            <label class="flex items-start gap-2 text-sm">
                <input type="checkbox" name="is_tester" value="1" @checked(old('is_tester', $user->is_tester)) class="mt-0.5">
                <span>
                    <span class="font-medium">Tester</span>
                    <span class="block text-xs text-gray-500">Unlocks every chapter, lesson, exercise, and trivia topic for this account regardless of progress. Everyone else follows normal step-by-step progression.</span>
                </span>
            </label>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
                <a href="{{ route('admin.users.show', $user) }}" class="px-4 py-2 rounded border hover:bg-gray-50">Cancel</a>
            </div>
        </form>
    </div>
@endsection
