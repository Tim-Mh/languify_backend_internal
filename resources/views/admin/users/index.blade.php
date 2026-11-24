@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="mx-auto max-w-7xl space-y-5">
        {{-- Filter chips: each one says how many learners it holds. --}}
        <nav class="flex flex-wrap gap-2" aria-label="Filter learners">
            @foreach ($statuses as $key => $label)
                <a href="{{ route('admin.users.index', array_filter(['status' => $key === 'all' ? null : $key, 'search' => $search ?: null])) }}"
                   @if ($status === $key) aria-current="true" @endif
                   class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-bold transition {{ $status === $key ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'bg-white text-gray-600 ring-1 ring-gray-200 hover:text-gray-900 hover:ring-gray-300' }}">
                    {{ $label }}
                    <span class="rounded-full px-2 py-0.5 text-xs {{ $status === $key ? 'bg-white/20' : 'bg-gray-100 text-gray-500' }}">{{ number_format($counts[$key]) }}</span>
                </a>
            @endforeach
        </nav>

        <form method="GET" class="flex flex-wrap items-end gap-3 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
            @if ($status !== 'all') <input type="hidden" name="status" value="{{ $status }}"> @endif
            <div class="min-w-0 flex-1 basis-64">
                <label for="search" class="mb-1 block text-xs font-bold text-gray-500">Search by name or email</label>
                <div class="relative">
                    <svg class="pointer-events-none absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                    <input type="search" id="search" name="search" value="{{ $search }}" placeholder="Type a name or an email address"
                           class="w-full rounded-xl border border-gray-200 py-2.5 pl-10 pr-3 outline-none focus:border-brand-400 focus:ring-2 focus:ring-brand-500/30">
                </div>
            </div>
            <button type="submit" class="rounded-xl bg-brand-600 px-5 py-2.5 font-bold text-white hover:bg-brand-700">Search</button>
            @if ($search || $status !== 'all')
                <a href="{{ route('admin.users.index') }}" class="py-2.5 text-sm font-bold text-gray-500 hover:text-gray-900">Clear all</a>
            @endif
        </form>

        <x-per-page :paginator="$users" noun="learners" />

        <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-100">
            <div class="relative overflow-x-auto">
                <table class="w-full min-w-[760px] text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/80 text-xs font-bold uppercase tracking-wide text-gray-500">
                        <tr>
                            <th class="px-5 py-3">Learner</th>
                            <th class="px-4 py-3">Timezone</th>
                            <th class="px-4 py-3">Plan</th>
                            <th class="px-4 py-3">Last lesson</th>
                            <th class="px-4 py-3">Joined</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($users as $user)
                            @php
                                $state = $user->gameState;
                                $plan = $user->activeSubscription?->plan_key ?? ($user->familyMembership ? 'family member' : null);
                            @endphp
                            <tr class="group cursor-pointer transition hover:bg-brand-50/40" data-row-link="{{ route('admin.users.show', $user) }}">
                                <td class="px-5 py-3">
                                    <a href="{{ route('admin.users.show', $user) }}" class="flex items-center gap-3">
                                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-100 font-bold uppercase text-brand-600">{{ mb_substr($user->full_name ?: $user->email, 0, 1) }}</span>
                                        <span class="min-w-0">
                                            <span class="flex items-center gap-1.5">
                                                <span class="truncate font-bold text-ink-900 group-hover:text-brand-600">{{ $user->full_name ?: 'No name yet' }}</span>
                                                @if ($user->is_tester)
                                                    <span class="rounded-full bg-sky-100 px-2 py-0.5 text-[10px] font-bold uppercase text-sky-800">Tester</span>
                                                @endif
                                            </span>
                                            <span class="block truncate text-gray-500">{{ $user->email }}</span>
                                        </span>
                                    </a>
                                </td>
                                {{-- The device-reported timezone. Streak days and daily resets
                                     are counted in it, so it explains "why did this learner's
                                     streak reset then?". --}}
                                <td class="whitespace-nowrap px-4 py-3">
                                    @if ($user->timezone)
                                        <span class="font-semibold text-ink-800">{{ $user->timezone }}</span>
                                    @else
                                        <span class="text-gray-400">Not set</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if ($plan)
                                        <span class="whitespace-nowrap rounded-full bg-violet-100 px-2.5 py-1 text-xs font-bold capitalize text-violet-800">{{ $plan }}</span>
                                    @else
                                        <span class="text-gray-400">Free</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-gray-600">
                                    @php $days = $state?->last_lesson_date ? (int) $state->last_lesson_date->startOfDay()->diffInDays(today()) : null; @endphp
                                    {{-- A date without a time, so counted in whole days. --}}
                                    {{ match (true) { $days === null => 'Never', $days <= 0 => 'Today', $days === 1 => 'Yesterday', $days < 30 => $days.' days ago', default => $state->last_lesson_date->format('M j, Y') } }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-gray-600" title="{{ $user->created_at->timezone(config('app.admin_timezone'))->format('Y-m-d g:i A') }} Pakistan time">
                                    {{ $user->created_at->timezone(config('app.admin_timezone'))->format('M j, Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-12 text-center">
                                    <p class="font-bold text-ink-900">No learners match these filters.</p>
                                    <a href="{{ route('admin.users.index') }}" class="mt-1 inline-block text-sm font-bold text-brand-600 hover:underline">Clear all filters</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>{{ $users->links() }}</div>
    </div>
@endsection

@push('scripts')
<script>
    // The whole row opens the learner, not only the name.
    document.querySelectorAll('[data-row-link]').forEach((row) => row.addEventListener('click', (event) => {
        if (event.target.closest('a, button, input')) return
        if (event.ctrlKey || event.metaKey) window.open(row.dataset.rowLink, '_blank')
        else location.href = row.dataset.rowLink
    }))
</script>
@endpush
