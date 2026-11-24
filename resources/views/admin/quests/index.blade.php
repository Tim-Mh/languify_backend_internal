@extends('layouts.admin')

@section('title', 'Daily quests')

@php
    $goalText = [
        'lessons_completed' => fn ($n) => 'Finish '.$n.' '.($n === 1 ? 'lesson' : 'lessons'),
        'xp_earned' => fn ($n) => 'Earn '.$n.' XP',
        'perfect_lesson' => fn ($n) => $n.' perfect '.($n === 1 ? 'lesson' : 'lessons'),
        'units_completed' => fn ($n) => 'Finish '.$n.' '.($n === 1 ? 'unit' : 'units'),
    ];
    $difficulty = [1 => ['Easy', 'bg-emerald-100 text-emerald-800'], 2 => ['Medium', 'bg-amber-100 text-amber-800'], 3 => ['Hard', 'bg-rose-100 text-rose-700']];
    $chips = ['all' => 'All', 'active' => 'In the daily draw', 'off' => 'Switched off'];
@endphp

@section('content')
    <div class="mx-auto max-w-6xl space-y-5">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <p class="max-w-2xl text-sm text-gray-600">
                Every day each learner gets <strong>3 quests</strong>, picked at random from the ones switched on. A quest's goal and reward grow as the learner finishes more lessons, up to the cap you set.
            </p>
            <a href="{{ route('admin.quests.create') }}" class="btn-primary">
                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add quest
            </a>
        </div>

        @if ($counts['active'] < 3)
            <div class="rounded-xl bg-amber-100 px-4 py-3 text-sm font-semibold text-amber-800">
                Only {{ $counts['active'] }} {{ $counts['active'] === 1 ? 'quest is' : 'quests are' }} switched on, so learners get fewer than 3 quests a day.
            </div>
        @endif

        <nav class="flex flex-wrap gap-2" aria-label="Filter quests">
            @foreach ($chips as $key => $label)
                <a href="{{ route('admin.quests.index', array_filter(['status' => $key === 'all' ? null : $key, 'per_page' => request('per_page')])) }}"
                   @if ($status === $key) aria-current="true" @endif
                   class="{{ $status === $key ? 'chip-active' : 'chip' }}">
                    {{ $label }}
                    <span class="rounded-full px-2 py-0.5 text-xs {{ $status === $key ? 'bg-white/20' : 'bg-gray-100 text-gray-500' }}">{{ $counts[$key] }}</span>
                </a>
            @endforeach
        </nav>

        <x-per-page :paginator="$quests" noun="quests" />

        <div class="card overflow-hidden">
            <div class="relative overflow-x-auto">
                <table class="w-full min-w-[860px] text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/80">
                        <tr>
                            <th class="th">Quest</th>
                            <th class="th">Goal for a new learner</th>
                            <th class="th">Grows</th>
                            <th class="th">Reward at start</th>
                            <th class="th">Status</th>
                            <th class="th">Handed out</th>
                            <th class="th"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($quests as $quest)
                            @php
                                $goal = isset($goalText[$quest->requirement_type]) ? $goalText[$quest->requirement_type]((int) $quest->target_count) : $quest->requirement_type.' x'.$quest->target_count;
                                [$diffLabel, $diffClass] = $difficulty[$quest->difficulty] ?? [(string) $quest->difficulty, 'bg-gray-100 text-gray-700'];
                                $grows = $quest->target_increment > 0 && $quest->max_target !== null && $quest->max_target > $quest->target_count;
                                $timesHandedOut = (int) ($assigned[$quest->id] ?? 0);
                            @endphp
                            <tr class="hover:bg-brand-50/40">
                                <td class="td">
                                    <span class="block font-bold text-ink-900">{{ $quest->title }}</span>
                                    @if ($quest->description)
                                        <span class="block text-xs text-gray-500">{{ $quest->description }}</span>
                                    @endif
                                </td>
                                <td class="td">
                                    <span class="whitespace-nowrap font-semibold text-ink-900">{{ $goal }}</span>
                                    <span class="mt-1 block"><span class="tag {{ $diffClass }}">{{ $diffLabel }}</span></span>
                                </td>
                                <td class="td text-gray-600">
                                    @if ($grows)
                                        +{{ $quest->target_increment }} every {{ \App\Services\QuestService::LESSONS_PER_STEP }} lessons,
                                        <span class="whitespace-nowrap">up to {{ $quest->max_target }}</span>
                                    @elseif ($quest->target_increment > 0)
                                        <span class="font-semibold text-amber-700" title="Set the highest the goal can go to let it grow.">No, cap not set</span>
                                    @else
                                        <span class="text-gray-400">Fixed goal</span>
                                    @endif
                                </td>
                                <td class="td whitespace-nowrap font-bold text-ink-900">
                                    +{{ number_format($quest->gems_reward) }} gems · +{{ number_format($quest->xp_reward) }} XP
                                </td>
                                <td class="td">
                                    @if ($quest->is_active)
                                        <span class="tag bg-emerald-100 text-emerald-800">In the draw</span>
                                    @else
                                        <span class="tag bg-gray-100 text-gray-600">Off</span>
                                    @endif
                                </td>
                                <td class="td whitespace-nowrap text-gray-600">{{ number_format($timesHandedOut) }} {{ $timesHandedOut === 1 ? 'time' : 'times' }}</td>
                                <td class="td">
                                    <x-admin.row-actions
                                        :edit="route('admin.quests.edit', $quest)"
                                        :delete="route('admin.quests.destroy', $quest)"
                                        :name="'quest '.$quest->title"
                                        confirm="Learners who have it today lose it, and its history ({{ number_format($timesHandedOut) }} handed out) is deleted. To stop using it but keep the history, switch it off instead." />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-5 py-12 text-center">
                                    <p class="font-bold text-ink-900">No quests here.</p>
                                    @if ($status !== 'all')
                                        <a href="{{ route('admin.quests.index') }}" class="mt-1 inline-block text-sm font-bold text-brand-600 hover:underline">Show all quests</a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>{{ $quests->links() }}</div>
    </div>
@endsection
