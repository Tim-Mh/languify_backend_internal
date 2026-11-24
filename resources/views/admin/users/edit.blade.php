@extends('layouts.admin')

@section('title', 'Edit user')

@php
    $input = 'w-full rounded-xl border border-gray-200 px-3 py-2.5 outline-none focus:border-brand-400 focus:ring-2 focus:ring-brand-500/30';
@endphp

@section('content')
    <div class="mx-auto max-w-2xl space-y-5">
        <a href="{{ route('admin.users.show', $user) }}" class="inline-flex items-center gap-1 text-sm font-bold text-gray-500 hover:text-gray-900">
            <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
            Back to {{ $user->full_name ?: $user->email }}
        </a>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
                <h2 class="font-display text-lg font-bold text-ink-900">Account</h2>
                <div class="mt-4 space-y-4">
                    <div>
                        <label for="full_name" class="mb-1.5 block text-sm font-bold text-ink-800">Full name</label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}" class="{{ $input }}">
                        @error('full_name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-bold text-ink-800">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="{{ $input }}">
                        @error('email') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>
                </div>
            </section>

            <section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
                <h2 class="font-display text-lg font-bold text-ink-900">Access</h2>

                <fieldset class="mt-4">
                    <legend class="mb-2 text-sm font-bold text-ink-800">Role</legend>
                    <div class="grid gap-3 sm:grid-cols-2">
                        @foreach (['user' => ['Learner', 'Uses the app. Cannot open this panel.'], 'admin' => ['Admin', 'Full access to this panel.']] as $value => [$label, $hint])
                            <label class="flex cursor-pointer gap-3 rounded-xl p-4 ring-1 ring-gray-200 has-[:checked]:bg-brand-50 has-[:checked]:ring-2 has-[:checked]:ring-brand-500">
                                <input type="radio" name="role" value="{{ $value }}" @checked(old('role', $user->role) === $value) class="mt-1 accent-brand-500">
                                <span>
                                    <span class="block font-bold text-ink-900">{{ $label }}</span>
                                    <span class="block text-xs text-gray-500">{{ $hint }}</span>
                                </span>
                            </label>
                        @endforeach
                    </div>
                    @error('role') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </fieldset>

                <div class="mt-5 divide-y divide-gray-100 border-t border-gray-100">
                    <label class="flex cursor-pointer items-start justify-between gap-4 py-4">
                        <span>
                            <span class="block font-bold text-ink-900">Email verified</span>
                            <span class="block text-xs text-gray-500">Turn on to skip the email code for this account.</span>
                        </span>
                        <input type="checkbox" name="email_verified" value="1" @checked(old('email_verified', (bool) $user->email_verified_at)) class="peer sr-only">
                        <span class="relative mt-1 h-6 w-11 shrink-0 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-brand-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2" aria-hidden="true"></span>
                    </label>
                    <label class="flex cursor-pointer items-start justify-between gap-4 py-4">
                        <span>
                            <span class="block font-bold text-ink-900">Tester</span>
                            <span class="block text-xs text-gray-500">Unlocks every chapter, lesson, exercise and trivia topic for this account, whatever its progress. Everyone else follows normal step-by-step progress.</span>
                        </span>
                        <input type="checkbox" name="is_tester" value="1" @checked(old('is_tester', $user->is_tester)) class="peer sr-only">
                        <span class="relative mt-1 h-6 w-11 shrink-0 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-brand-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2" aria-hidden="true"></span>
                    </label>
                </div>
            </section>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.users.show', $user) }}" class="rounded-xl px-5 py-2.5 font-bold text-gray-600 ring-1 ring-gray-200 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="rounded-xl bg-brand-600 px-6 py-2.5 font-bold text-white hover:bg-brand-700">Save changes</button>
            </div>
        </form>
    </div>
@endsection
