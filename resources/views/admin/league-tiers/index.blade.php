@extends('layouts.admin')

@section('title', 'League tiers')

@php
    // Promotion looks for the league numbered exactly one higher, so a gap
    // or a repeat stops learners moving past it.
    $steps = $tiers->pluck('order_number')->values();
    $brokenLadder = $steps->isNotEmpty() && $steps->unique()->count() === $steps->count()
        ? $steps->last() - $steps->first() !== $steps->count() - 1
        : $steps->isNotEmpty();
    $totalMembers = $usageCounts->sum();
@endphp

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        <div class="flex flex-wrap items-start justify-end gap-4">
            <a href="{{ route('admin.league-tiers.create') }}" class="btn-primary">
                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add league
            </a>
        </div>

        @if ($brokenLadder)
            <div class="rounded-xl bg-amber-100 px-4 py-3 text-sm font-semibold text-amber-800">
                The step numbers have a gap or a repeat ({{ $steps->join(', ') }}). Learners only move to the league numbered exactly one above or below, so number them 1, 2, 3 and so on.
            </div>
        @endif

        <dl class="grid grid-cols-2 gap-3">
            <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
                <dt class="text-xs font-bold text-gray-500">Leagues</dt>
                <dd class="mt-1 font-display text-2xl font-bold text-ink-900">{{ $tiers->count() }}</dd>
                <dd class="text-xs text-gray-500">From starting to top league</dd>
            </div>
            <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
                <dt class="text-xs font-bold text-gray-500">Competing this week</dt>
                <dd class="mt-1 font-display text-2xl font-bold text-brand-600">{{ number_format($totalMembers) }}</dd>
                <dd class="text-xs text-gray-500">Learners in any league</dd>
            </div>
        </dl>

        <div class="card overflow-hidden">
            <div class="relative overflow-x-auto">
                <table class="w-full min-w-[700px] text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/80">
                        <tr>
                            <th class="th">Step</th>
                            <th class="th">League</th>
                            <th class="th">Reward for moving up into it</th>
                            <th class="th">Learners in it now</th>
                            <th class="th"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($tiers as $tier)
                            @php $members = (int) $usageCounts->get($tier->id, 0); @endphp
                            <tr class="hover:bg-brand-50/40">
                                <td class="td w-20 font-bold text-gray-400">{{ $tier->order_number }}</td>
                                <td class="td">
                                    <div class="flex items-center gap-3">
                                        <x-admin.league-badge :tier="$tier" size="h-14 w-14" />
                                        <div>
                                            <span class="font-bold text-ink-900">{{ $tier->name }}</span>
                                            @if ($loop->first)
                                                <span class="tag ml-1 bg-sky-100 text-sky-800">Starting league</span>
                                            @elseif ($loop->last)
                                                <span class="tag ml-1 bg-violet-100 text-violet-800">Top league</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="td whitespace-nowrap">
                                    @if ($tier->promotion_gems || $tier->promotion_xp)
                                        <span class="font-bold text-ink-900">+{{ number_format($tier->promotion_gems) }} gems · +{{ number_format($tier->promotion_xp) }} XP</span>
                                    @else
                                        <span class="text-gray-400">None</span>
                                    @endif
                                </td>
                                <td class="td whitespace-nowrap text-gray-600">{{ number_format($members) }}</td>
                                <td class="td">
                                    {{-- Deleting would wipe this week's standings for its members, so the controller refuses while anyone is in it. --}}
                                    <x-admin.row-actions
                                        :edit="route('admin.league-tiers.edit', $tier)"
                                        :delete="$members === 0 ? route('admin.league-tiers.destroy', $tier) : null"
                                        :name="$tier->name.' league'"
                                        confirm="Nobody is in this league this week. Check the step numbers of the others afterwards, so there is no gap. It cannot be undone.">
                                        @if ($members > 0)
                                            <span class="inline-flex p-2 text-gray-300" title="{{ $members }} {{ $members === 1 ? 'learner is' : 'learners are' }} in it this week, so it cannot be deleted">
                                                <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>
                                                <span class="sr-only">In use, cannot be deleted</span>
                                            </span>
                                        @endif
                                    </x-admin.row-actions>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-12 text-center">
                                    <p class="font-bold text-ink-900">No leagues yet.</p>
                                    <a href="{{ route('admin.league-tiers.create') }}" class="mt-1 inline-block text-sm font-bold text-brand-600 hover:underline">Add the first one</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <p class="text-xs text-gray-500">On top of the promotion reward, everyone who finishes a week in the top half of their leaderboard gets 10 gems. That amount is fixed in the code.</p>
    </div>
@endsection
