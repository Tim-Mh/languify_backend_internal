@extends('layouts.admin')

@section('title', 'Badges')

@php
    $categoryLabels = ['streak' => 'Streak', 'xp' => 'XP', 'lesson' => 'Lessons'];
    $earnText = [
        'streak' => fn ($n) => 'Reach a '.$n.'-day streak',
        'total_xp' => fn ($n) => 'Earn '.number_format($n).' XP in total',
        'total_lessons_completed' => fn ($n) => 'Finish '.number_format($n).' '.($n === 1 ? 'lesson' : 'lessons'),
        'perfect_lessons' => fn ($n) => number_format($n).' perfect '.($n === 1 ? 'lesson' : 'lessons'),
        'units_completed_count' => fn ($n) => 'Finish '.number_format($n).' '.($n === 1 ? 'unit' : 'units'),
        'max_lessons_in_a_day' => fn ($n) => number_format($n).' lessons in one day',
        'chapter_complete' => fn ($n) => 'Finish a chapter',
    ];
    $tierTone = [
        'BRONZE' => 'bg-orange-100 text-orange-800',
        'SILVER' => 'bg-slate-200 text-slate-700',
        'GOLD' => 'bg-yellow-100 text-yellow-800',
        'PLATINUM' => 'bg-sky-100 text-sky-800',
        'LEGENDARY' => 'bg-violet-100 text-violet-800',
    ];
    $groups = $badges->groupBy('category')->sortBy(fn ($g, $key) => array_search($key, array_keys($categoryLabels)));
@endphp

@section('content')
    <div class="mx-auto max-w-7xl space-y-6">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <p class="max-w-2xl text-sm text-gray-600">Learners claim a badge in the app once they reach its requirement, and get the gems, XP and hearts set on that badge.</p>
            <a href="{{ route('admin.badges.create') }}" class="btn-primary">
                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add badge
            </a>
        </div>

        <section class="card p-4" aria-labelledby="tiers-heading">
            <div class="flex flex-wrap items-start justify-between gap-3">
                <div>
                    <h2 id="tiers-heading" class="font-display text-base font-bold text-ink-900">Tiers</h2>
                    <p class="text-xs text-gray-500">A tier sets a badge's look. They are listed lowest to highest; on a learner's page their badges are shown highest tier first. A tier can only be deleted once no badge uses it.</p>
                </div>
                <form action="{{ route('admin.badge-tiers.store') }}" method="POST" class="flex items-start gap-2">
                    @csrf
                    <div>
                        <label for="tier-name" class="sr-only">New tier name</label>
                        <input type="text" id="tier-name" name="name" value="{{ old('name') }}" required maxlength="50" placeholder="New tier, e.g. Diamond" class="field-input w-52 py-1.5 text-sm">
                        @error('name') <p class="field-error">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="btn-secondary py-1.5 text-sm">Add tier</button>
                </form>
            </div>
            <ul class="mt-3 flex flex-wrap gap-2">
                @forelse ($tiers as $tier)
                    @php $used = (int) $tierUsage->get($tier->name, 0); @endphp
                    <li class="flex items-center gap-1 rounded-full bg-gray-50 py-1 pl-1 pr-1 ring-1 ring-gray-100">
                        <span class="tag {{ $tierTone[$tier->name] ?? 'bg-gray-100 text-gray-700' }}">{{ ucfirst(strtolower($tier->name)) }}</span>
                        <span class="text-xs text-gray-500">{{ $used }} {{ $used === 1 ? 'badge' : 'badges' }}</span>
                        <form action="{{ route('admin.badge-tiers.destroy', $tier) }}" method="POST"
                              data-confirm="{{ $used ? 'This tier is used by '.$used.' '.($used === 1 ? 'badge' : 'badges').', so it cannot be deleted until they are moved to another tier.' : 'Badges will no longer be able to use this tier.' }}"
                              data-confirm-title="Delete tier {{ ucfirst(strtolower($tier->name)) }}?">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon-btn !p-1 hover:!bg-rose-50 hover:!text-rose-600" aria-label="Delete tier {{ ucfirst(strtolower($tier->name)) }}" title="Delete">
                                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                            </button>
                        </form>
                    </li>
                @empty
                    <li class="text-sm text-gray-500">No tiers yet. Add one to start adding badges.</li>
                @endforelse
            </ul>
        </section>

        <dl class="grid grid-cols-2 gap-3">
            @foreach ([
                ['Badges', number_format($badges->count()), 'text-ink-900', number_format($badges->where('is_active', true)->count()).' can be claimed'],
                ['Times claimed', number_format($totalAwards), 'text-brand-600', 'All badges, all learners'],
            ] as [$label, $value, $tone, $hint])
                <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
                    <dt class="text-xs font-bold text-gray-500">{{ $label }}</dt>
                    <dd class="mt-1 font-display text-2xl font-bold {{ $tone }}">{{ $value }}</dd>
                    <dd class="text-xs text-gray-500">{{ $hint }}</dd>
                </div>
            @endforeach
        </dl>

        @forelse ($groups as $groupKey => $groupBadges)
            <section class="space-y-3" aria-labelledby="group-{{ $groupKey }}">
                <h2 id="group-{{ $groupKey }}" class="font-display text-base font-bold text-ink-900">{{ $categoryLabels[$groupKey] ?? ucfirst($groupKey) }} badges <span class="text-sm font-semibold text-gray-400">({{ $groupBadges->count() }})</span></h2>
                <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                    @foreach ($groupBadges as $badge)
                        @php $claimed = (int) $counts->get($badge->key, 0); @endphp
                        <li class="card flex flex-col p-4 {{ $badge->is_active ? '' : 'opacity-70' }}">
                            <div class="flex items-start justify-between gap-2">
                                <span class="tag {{ $tierTone[$badge->tier] ?? 'bg-gray-100 text-gray-700' }}">{{ ucfirst(strtolower($badge->tier)) }}</span>
                                <x-admin.row-actions
                                    :edit="route('admin.badges.edit', $badge)"
                                    :delete="route('admin.badges.destroy', $badge)"
                                    :name="'badge '.$badge->title"
                                    confirm="Nobody can claim it any more. The {{ number_format($claimed) }} learners who already have it keep their record. To pause it instead, switch it off." />
                            </div>
                            <div class="mt-1 flex flex-col items-center text-center">
                                @if ($url = $badge->imageUrl())
                                    <img src="{{ $url }}" alt="" class="h-20 w-20 object-contain" loading="lazy">
                                @else
                                    <span class="flex h-20 w-20 items-center justify-center rounded-full bg-amber-100 text-3xl font-bold text-amber-700">{{ mb_substr($badge->title, 0, 1) }}</span>
                                @endif
                                <h3 class="mt-2 font-bold leading-tight text-ink-900">{{ $badge->title }}</h3>
                                <p class="mt-0.5 text-xs text-gray-500">{{ $badge->description }}</p>
                                <p class="mt-2 text-sm font-semibold text-ink-800">{{ isset($earnText[$badge->requirement_type]) ? $earnText[$badge->requirement_type]((int) $badge->requirement_value) : $badge->requirement_type }}</p>
                                @if ($badge->requirement_type === 'chapter_complete')
                                    <p class="mt-1 text-xs font-semibold text-amber-700">Cannot be claimed at the moment: the claim check never counts a finished chapter.</p>
                                @endif
                            </div>
                            <div class="mt-auto pt-3">
                                <div class="flex flex-wrap justify-center gap-1.5 text-xs font-bold">
                                    <span class="rounded-full bg-sky-50 px-2 py-1 text-sky-700">+{{ number_format($badge->gems_reward) }} gems</span>
                                    <span class="rounded-full bg-amber-50 px-2 py-1 text-amber-700">+{{ number_format($badge->xp_reward) }} XP</span>
                                    <span class="rounded-full bg-rose-50 px-2 py-1 text-rose-700">+{{ $badge->hearts_reward }} {{ $badge->hearts_reward === 1 ? 'heart' : 'hearts' }}</span>
                                </div>
                                <div class="mt-3 flex items-center justify-between border-t border-gray-100 pt-2 text-xs">
                                    @if ($badge->is_active)
                                        <span class="font-bold text-emerald-700">Can be claimed</span>
                                    @else
                                        <span class="font-bold text-gray-500">Off</span>
                                    @endif
                                    <span class="text-gray-500">Claimed by {{ number_format($claimed) }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>
        @empty
            <div class="card p-10 text-center">
                <p class="font-bold text-ink-900">No badges yet.</p>
                <a href="{{ route('admin.badges.create') }}" class="mt-2 inline-block text-sm font-bold text-brand-600 hover:underline">Add the first one</a>
            </div>
        @endforelse
    </div>
@endsection
