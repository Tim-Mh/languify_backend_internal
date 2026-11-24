@extends('layouts.admin')

@section('title', $user->full_name ?: $user->email)

@php
    $state = $user->gameState;
    $plan = $user->activeSubscription;
    $membership = $user->familyMembership;
    $ownedGroup = $user->familyGroupOwned;
    $card = 'rounded-2xl bg-white p-5 shadow-sm ring-1 ring-gray-100';
    $heading = 'font-display text-lg font-bold text-ink-900';
    $adminTz = config('app.admin_timezone');
    $usd = fn (?int $cents) => '$'.number_format(($cents ?? 0) / 100, 2);
    $days = fn (int $n) => $n.' '.\Illuminate\Support\Str::plural('day', $n);
    $pkt = fn ($date) => $date?->copy()->timezone($adminTz);

    $statusStyles = [
        'active' => ['Active', 'bg-emerald-100 text-emerald-800'], 'trialing' => ['Trial', 'bg-sky-100 text-sky-800'],
        'past_due' => ['Payment failed', 'bg-rose-100 text-rose-800'], 'unpaid' => ['Unpaid', 'bg-rose-100 text-rose-800'],
        'canceled' => ['Cancelled', 'bg-gray-200 text-gray-700'], 'expired' => ['Expired', 'bg-gray-100 text-gray-600'],
        'incomplete' => ['Not paid', 'bg-amber-100 text-amber-800'], 'completed' => ['Paid', 'bg-emerald-100 text-emerald-800'],
        'pending' => ['Not paid', 'bg-amber-100 text-amber-800'],
    ];
    $tag = fn (string $status) => $statusStyles[$status] ?? [ucfirst(str_replace('_', ' ', $status)), 'bg-gray-100 text-gray-600'];

    // Plain names for where gems came from or went.
    $reasons = [
        'admin.adjustment' => 'Admin adjustment', 'avatar.unlock' => 'Avatar items bought', 'chest.reward' => 'Chests',
        'league.weekly' => 'League rewards', 'ledger.opening_balance' => 'Balance before tracking began', 'lesson.bonus' => 'Lesson bonuses',
        'quest.claim' => 'Daily quests', 'shop.hearts_refill' => 'Heart refills', 'trivia.reward' => 'Trivia', 'shop.gems_purchase' => 'Gems bought',
    ];
    $reason = fn (string $key) => $reasons[$key] ?? ucfirst(str_replace(['.', '_'], ' ', $key));

@endphp

@section('content')
    <div class="mx-auto max-w-7xl space-y-6">
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-1 text-sm font-bold text-gray-500 hover:text-gray-900">
            <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
            Back to users
        </a>

        {{-- 1. Header --}}
        <section class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-100">
            <div class="h-20 bg-gradient-to-r from-ink-900 via-ink-800 to-brand-600"></div>
            <div class="px-5 pb-5">
                <span class="-mt-10 flex h-20 w-20 items-center justify-center rounded-2xl bg-brand-100 font-display text-3xl font-bold uppercase text-brand-600 ring-4 ring-white">{{ mb_substr($user->full_name ?: $user->email, 0, 1) }}</span>
                <div class="mt-3 flex flex-wrap items-end justify-between gap-4">
                    <div class="min-w-0">
                        <h2 class="truncate font-display text-xl font-bold text-ink-900">{{ $user->full_name ?: 'No name yet' }}</h2>
                        <p class="truncate text-sm text-gray-500">{{ $user->email }}</p>
                        <div class="mt-2 flex flex-wrap gap-1.5">
                            @if ($user->role === 'admin') <span class="tag bg-ink-900 text-white">Admin</span> @endif
                            <span data-tester-tag class="tag bg-sky-100 text-sky-800 {{ $user->isTester() ? '' : 'hidden' }}">Tester</span>
                            @if ($plan)
                                <span class="tag bg-violet-100 capitalize text-violet-800">{{ $plan->plan_key }} plan</span>
                            @elseif ($membership)
                                <span class="tag bg-violet-100 text-violet-800">Family member</span>
                            @else
                                <span class="tag bg-gray-100 text-gray-600">Free</span>
                            @endif
                        </div>
                        <dl class="mt-3 flex flex-wrap gap-x-6 gap-y-1 text-sm">
                            <div class="flex gap-1.5"><dt class="text-gray-500">Joined</dt><dd class="font-semibold text-ink-900">{{ $pkt($user->created_at)->format('M j, Y') }}</dd></div>
                            <div class="flex gap-1.5"><dt class="text-gray-500">Last active</dt><dd class="font-semibold text-ink-900">{{ $lastActive ? \Illuminate\Support\Carbon::parse($lastActive)->format('M j, Y') : 'Never' }}</dd></div>
                            <div class="flex gap-1.5"><dt class="text-gray-500">Timezone</dt><dd class="font-semibold text-ink-900">{{ $user->timezone ?: 'Not set' }}</dd></div>
                        </dl>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        @php $onAllowlist = in_array(strtolower($user->email), array_map('strtolower', (array) config('app.tester_emails', [])), true); @endphp
                        <label class="flex cursor-pointer items-center gap-2.5 rounded-xl px-3 py-2 ring-1 ring-gray-200 {{ $onAllowlist ? 'cursor-not-allowed opacity-70' : 'hover:bg-gray-50' }}"
                               @if ($onAllowlist) title="This email is on the tester list in the server settings, so it is always a tester." @endif>
                            <input type="checkbox" class="peer sr-only" id="tester-toggle" data-url="{{ route('admin.users.tester', $user) }}"
                                   @checked($user->isTester()) @disabled($onAllowlist)>
                            <span class="relative h-6 w-11 shrink-0 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-sky-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2" aria-hidden="true"></span>
                            <span class="text-sm font-bold text-ink-900">Tester account</span>
                        </label>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                              data-confirm="This removes all of {{ $user->full_name ?: $user->email }}'s progress, purchases and content. It cannot be undone."
                              data-confirm-title="Delete this user?">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        {{-- 2. Key numbers --}}
        <dl class="grid grid-cols-2 gap-3 sm:grid-cols-4 xl:grid-cols-7">
            @foreach ([
                ['Current streak', $days((int) ($state->streak ?? 0)), 'text-orange-600', null],
                ['Longest streak', $days((int) ($state->longest_streak ?? 0)), 'text-orange-600', null],
                ['Total XP', number_format($state->total_xp ?? 0), 'text-amber-600', null],
                ['Gems', number_format($state->gems ?? 0), 'text-sky-600', null],
                ['Hearts', $state->hearts ?? 0, 'text-rose-600', null],
                ['Lessons done', number_format($state->total_lessons_completed ?? 0), 'text-emerald-600', number_format($state->perfect_lessons ?? 0).' perfect'],
                ['Money spent', $usd($spentCents), 'text-violet-600', 'Plans and gems'],
            ] as [$label, $value, $tone, $note])
                <div class="{{ $card }} !p-4">
                    <dt class="text-xs font-bold text-gray-500">{{ $label }}</dt>
                    <dd class="mt-1 font-display text-xl font-bold {{ $tone }}">{{ $value }}</dd>
                    @if ($note) <dd class="text-xs font-semibold text-gray-500">{{ $note }}</dd> @endif
                </div>
            @endforeach
        </dl>

        <div>
            {{-- 3. Activity --}}
            <section class="{{ $card }}" aria-labelledby="activity-heading">
                <div class="flex flex-wrap items-baseline justify-between gap-2">
                    <h2 id="activity-heading" class="{{ $heading }}">Activity</h2>
                    <p class="text-sm text-gray-500">Practised on <strong class="text-ink-900">{{ $calendar['activeDays'] }}</strong> of the last {{ collect($calendar['weeks'])->flatten(1)->count() }} days · the number in a square is lessons played that day</p>
                </div>

                @php
                    // Darker green for busier days, like a contribution graph.
                    $shade = fn (array $day) => ! $day['active'] ? 'bg-gray-100'
                        : ($day['lessons'] >= 6 ? 'bg-emerald-700' : ($day['lessons'] >= 4 ? 'bg-emerald-600' : ($day['lessons'] >= 2 ? 'bg-emerald-500' : 'bg-emerald-300')));
                    $tip = 'pointer-events-none absolute bottom-full left-1/2 z-20 mb-1.5 hidden -translate-x-1/2 whitespace-nowrap rounded-lg bg-ink-900 px-2.5 py-1.5 text-xs font-semibold text-white shadow-lg group-hover:block';
                @endphp
                <div class="mt-4 flex gap-1.5" role="img" aria-label="Days practised in the last 13 weeks">
                    <div class="grid shrink-0 grid-rows-7 gap-1 text-[10px] text-gray-400">
                        @foreach (['Mon', '', 'Wed', '', 'Fri', '', 'Sun'] as $label) <span class="flex items-center">{{ $label }}</span> @endforeach
                    </div>
                    @foreach ($calendar['weeks'] as $week)
                        <div class="grid min-w-0 flex-1 grid-rows-7 gap-1">
                            @foreach ($week as $day)
                                @php $date = \Illuminate\Support\Carbon::parse($day['date']); @endphp
                                <span class="group relative flex h-6 w-full items-center justify-center rounded-[4px] text-[10px] font-bold leading-none sm:text-xs {{ $shade($day) }} {{ $day['lessons'] >= 2 ? 'text-white' : 'text-gray-500' }}">
                                    {{ $day['lessons'] ?: '' }}
                                    <span class="{{ $tip }}">
                                        {{ $date->format('D, M j') }}:
                                        @if ($day['lessons']) {{ $day['lessons'] }} {{ \Illuminate\Support\Str::plural('lesson', $day['lessons']) }}
                                        @elseif ($day['active']) practised
                                        @else no practice @endif
                                    </span>
                                </span>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="mt-2 flex items-center justify-end gap-1.5 text-[11px] text-gray-500">
                    Fewer
                    @foreach (['bg-gray-100', 'bg-emerald-300', 'bg-emerald-500', 'bg-emerald-600', 'bg-emerald-700'] as $color) <span class="h-3 w-3 rounded-[3px] {{ $color }}"></span> @endforeach
                    More lessons
                </div>

                <h3 class="mt-5 text-sm font-bold text-ink-800">Lessons played per day <span class="font-normal text-gray-500">(last 30 days, replays included)</span></h3>
                @php $peak = max(1, collect($dailyPlays)->max('count')); @endphp
                <div class="mt-3 flex h-32 items-end gap-0.5 sm:gap-1">
                    @foreach ($dailyPlays as $day)
                        <div class="group relative flex h-full min-w-0 flex-1 flex-col items-center justify-end gap-0.5">
                            <span class="hidden text-[10px] font-bold text-gray-500 sm:block">{{ $day['count'] ?: '' }}</span>
                            <span class="w-full rounded-t {{ $day['count'] ? 'bg-brand-400 group-hover:bg-brand-500' : 'bg-gray-100' }}" style="height: {{ max(3, round($day['count'] / $peak * 100)) }}px"></span>
                            <span class="{{ $tip }}">{{ $day['date']->format('D, M j') }}: {{ $day['count'] }} {{ \Illuminate\Support\Str::plural('lesson', $day['count']) }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="mt-1 flex gap-0.5 text-[10px] text-gray-400 sm:gap-1">
                    @foreach ($dailyPlays as $i => $day)
                        <span class="min-w-0 flex-1 overflow-visible whitespace-nowrap text-center">{{ $i % 7 === 0 ? $day['date']->format('M j') : '' }}</span>
                    @endforeach
                </div>
            </section>

        </div>

            {{-- 4. Courses and progress --}}
            <section class="{{ $card }}" aria-labelledby="courses-heading">
                <h2 id="courses-heading" class="{{ $heading }}">Courses and progress</h2>
                <div class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                    @forelse ($courses as $course)
                        <div class="rounded-xl p-4 ring-1 {{ $course['current'] ? 'bg-brand-50/50 ring-brand-100' : 'ring-gray-100' }}">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <p class="font-bold text-ink-900">
                                    {{ $course['language']?->flag_emoji }} {{ $course['language']?->name }}
                                    @if ($course['current']) <span class="tag ml-1 bg-brand-100 text-brand-700">Learning now</span> @endif
                                </p>
                                <p class="text-sm font-semibold text-gray-600">{{ $course['done'] }} of {{ number_format($course['total']) }} lessons · {{ $course['percent'] }}%</p>
                            </div>
                            <div class="mt-2 h-2 overflow-hidden rounded-full bg-gray-100">
                                <div class="h-full rounded-full bg-gradient-to-r from-brand-400 to-brand-500" style="width: {{ $course['percent'] }}%"></div>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                @if ($course['last'])
                                    Last finished: <strong class="text-ink-900">{{ $course['last']->lesson?->title }}</strong>
                                    <span class="text-gray-500">in {{ $course['last']->lesson?->unit?->chapter?->title }} / {{ $course['last']->lesson?->unit?->title }}, {{ $pkt($course['last']->completed_at)?->format('M j, Y') }}</span>
                                @else
                                    Not started yet.
                                @endif
                            </p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">Has not picked a course yet.</p>
                    @endforelse
                    @foreach ($user->completedLanguages as $completed)
                        <p class="rounded-xl bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-800 lg:col-span-2">Finished the whole {{ $completed->language?->name }} course with {{ number_format($completed->xp_at_completion) }} XP</p>
                    @endforeach
                </div>
            </section>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            {{-- Profile details --}}
            <section class="{{ $card }}" aria-labelledby="profile-heading">
                <h2 id="profile-heading" class="{{ $heading }}">Profile</h2>
                <dl class="mt-3 divide-y divide-gray-100 text-sm">
                    @foreach ([
                        ['Speaks', $user->nativeLanguage ? $user->nativeLanguage->flag_emoji.' '.$user->nativeLanguage->name : null],
                        ['Learning', $user->learningLanguage ? $user->learningLanguage->flag_emoji.' '.$user->learningLanguage->name : null],
                        ['Level', $user->proficiency_level ? ucfirst(str_replace('_', ' ', $user->proficiency_level)) : null],
                        ['Streak goal', $user->streak_goal_days ? $days((int) $user->streak_goal_days) : null],
                        ['Signed up with', $user->google_id ? 'Google' : ($user->apple_id ? 'Apple' : 'Email and password')],
                        ['Email verified', $user->email_verified_at ? $pkt($user->email_verified_at)->format('M j, Y') : 'Not verified'],
                        ['Joined', $pkt($user->created_at)->format('M j, Y g:i A')],
                    ] as [$label, $value])
                        <div class="flex justify-between gap-4 py-2.5">
                            <dt class="text-gray-500">{{ $label }}</dt>
                            <dd class="text-right font-semibold {{ $value ? 'text-ink-900' : 'text-gray-400' }}">{{ $value ?: 'Not set' }}</dd>
                        </div>
                    @endforeach
                </dl>
                <p class="mt-2 text-xs text-gray-500">Times shown in Pakistan time.</p>
            </section>

            {{-- 10. Admin tools --}}
            <section class="{{ $card }} flex flex-col" aria-labelledby="adjust-heading">
                <h2 id="adjust-heading" class="{{ $heading }}">Give or take rewards</h2>
                <p class="mt-1 text-sm text-gray-500">Use a minus sign to take away, for example -10.</p>
                <form action="{{ route('admin.users.adjust-game-state', $user) }}" method="POST" class="mt-4 flex flex-1 flex-col gap-3">
                    @csrf
                    @foreach ([['gems_delta', 'Gems', $state->gems ?? 0], ['xp_delta', 'XP', $state->total_xp ?? 0], ['hearts_delta', 'Hearts', $state->hearts ?? 0]] as [$name, $label, $current])
                        <div class="flex items-center gap-3">
                            <label for="{{ $name }}" class="w-14 text-sm font-bold text-ink-800">{{ $label }}</label>
                            <input type="number" id="{{ $name }}" name="{{ $name }}" placeholder="0" class="field-input min-w-0 flex-1 !py-2">
                            <span class="w-20 text-right text-xs text-gray-500">now {{ number_format($current) }}</span>
                        </div>
                    @endforeach
                    <p class="text-xs text-gray-500">Hearts stay between 0 and 5. Gem changes show in the gems history as "Admin adjustment".</p>
                    <button type="submit" class="btn mt-auto w-full bg-ink-900 text-white hover:bg-ink-800">Apply changes</button>
                </form>
            </section>
        </div>

        {{-- 5. Money --}}
        <section class="{{ $card }}" aria-labelledby="money-heading">
            <div class="flex flex-wrap items-baseline justify-between gap-2">
                <h2 id="money-heading" class="{{ $heading }}">Money</h2>
                <p class="text-sm text-gray-500">Spent in total: <strong class="text-ink-900">{{ $usd($spentCents) }}</strong></p>
            </div>

            <div class="mt-4 grid grid-cols-1 gap-6 xl:grid-cols-2">
                <div>
                    <h3 class="text-sm font-bold text-ink-800">Subscription payments</h3>
                    <ul class="scroll-list mt-2 divide-y divide-gray-100 text-sm">
                        @forelse ($subscriptions as $sub)
                            @php [$label, $class] = $tag($sub->status); @endphp
                            <li class="flex flex-wrap items-center justify-between gap-2 py-2.5">
                                <span>
                                    <span class="block font-semibold capitalize text-ink-900">{{ $sub->plan_key }} plan <span class="font-normal normal-case text-gray-500">· {{ $sub->provider === 'apple' ? 'Apple' : 'Stripe' }}</span></span>
                                    <span class="block text-xs text-gray-500">
                                        Paid {{ $pkt($sub->created_at)->format('M j, Y') }}
                                        @if ($sub->current_period_end) · {{ $sub->current_period_end->isPast() ? 'ended' : ($sub->cancel_at_period_end ? 'ends' : 'renews') }} {{ $sub->current_period_end->format('M j, Y') }} @endif
                                    </span>
                                </span>
                                <span class="flex items-center gap-2">
                                    <span class="tag {{ $class }}">{{ $label }}</span>
                                    <span class="w-16 text-right font-bold text-ink-900">{{ $sub->amount_cents ? $usd($sub->amount_cents) : '' }}</span>
                                </span>
                            </li>
                        @empty
                            <li class="py-2 text-gray-500">Never subscribed.</li>
                        @endforelse
                    </ul>

                    <h3 class="mt-5 text-sm font-bold text-ink-800">Family plan</h3>
                    <div class="mt-2 text-sm">
                        @if ($ownedGroup)
                            <p class="text-gray-700">Owns a family group with {{ $ownedGroup->members->count() }} {{ \Illuminate\Support\Str::plural('member', $ownedGroup->members->count()) }}:</p>
                            <ul class="mt-1 flex flex-wrap gap-1.5">
                                @foreach ($ownedGroup->members as $member)
                                    @if ($member->user)
                                        <li><a href="{{ route('admin.users.show', $member->user) }}" class="tag bg-violet-50 text-violet-800 hover:bg-violet-100">{{ $member->user->full_name ?: $member->user->email }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        @elseif ($membership)
                            <p class="text-gray-700">
                                Member of
                                @if ($membership->familyGroup?->owner)
                                    <a href="{{ route('admin.users.show', $membership->familyGroup->owner) }}" class="font-bold text-brand-600 hover:underline">{{ $membership->familyGroup->owner->full_name ?: $membership->familyGroup->owner->email }}</a>'s
                                @endif
                                family plan since {{ $membership->joined_at?->format('M j, Y') }}.
                            </p>
                        @else
                            <p class="text-gray-500">Not part of a family plan.</p>
                        @endif
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-bold text-ink-800">Gem purchases</h3>
                    <ul class="scroll-list mt-2 divide-y divide-gray-100 text-sm">
                        @forelse ($gemPurchases as $purchase)
                            @php [$label, $class] = $tag($purchase->status); @endphp
                            <li class="flex flex-wrap items-center justify-between gap-2 py-2.5">
                                <span>
                                    <span class="block font-semibold capitalize text-ink-900">{{ $purchase->pack_key }} pack · {{ number_format($purchase->gems_credited) }} gems</span>
                                    <span class="block text-xs text-gray-500">{{ $pkt($purchase->created_at)->format('M j, Y g:i A') }} · {{ $purchase->provider === 'apple' ? 'Apple' : 'Stripe' }}</span>
                                </span>
                                <span class="flex items-center gap-2">
                                    <span class="tag {{ $class }}">{{ $label }}</span>
                                    <span class="w-16 text-right font-bold text-ink-900">{{ $usd($purchase->amount_cents) }}</span>
                                </span>
                            </li>
                        @empty
                            <li class="py-2 text-gray-500">Never bought gems.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </section>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            {{-- 6. Gems history --}}
            <section class="{{ $card }} flex flex-col lg:h-[30rem]" aria-labelledby="gems-heading">
                <h2 id="gems-heading" class="{{ $heading }}">Gems history</h2>
                <p class="mt-1 text-sm text-gray-500">Every gem that came in or went out, newest first.</p>
                <ul class="scroll-list mt-3 min-h-0 flex-1 divide-y divide-gray-100 text-sm lg:max-h-none">
                    @forelse ($ledger as $entry)
                        <li class="flex items-center justify-between gap-3 py-2">
                            <span>
                                <span class="block font-semibold text-ink-900">{{ $reason($entry->reason) }}</span>
                                <span class="block text-xs text-gray-500">{{ $pkt($entry->created_at)?->format('M j, Y g:i A') }}</span>
                            </span>
                            <span class="text-right">
                                <span class="block font-bold {{ $entry->delta >= 0 ? 'text-emerald-600' : 'text-rose-600' }}">{{ $entry->delta >= 0 ? '+' : '' }}{{ number_format($entry->delta) }}</span>
                                <span class="block text-xs text-gray-500">balance {{ number_format($entry->balance_after) }}</span>
                            </span>
                        </li>
                    @empty
                        <li class="py-2 text-gray-500">No gem changes recorded yet.</li>
                    @endforelse
                </ul>
            </section>

            {{-- 7. Badges --}}
            <section class="{{ $card }} flex flex-col lg:h-[30rem]" aria-labelledby="badges-heading">
                <h2 id="badges-heading" class="{{ $heading }}">Badges earned <span class="text-sm font-semibold text-gray-400">({{ $badges->count() }})</span></h2>
                @if ($badges->isEmpty())
                    <p class="mt-3 text-sm text-gray-500">No badges yet.</p>
                @else
                    <ul class="scroll-list mt-4 grid min-h-0 flex-1 grid-cols-2 content-start gap-3 sm:grid-cols-3 lg:max-h-none">
                        @foreach ($badges as $badge)
                            <li class="flex flex-col items-center rounded-xl bg-amber-50/60 p-3 text-center ring-1 ring-amber-100">
                                @if ($badge['image'])
                                    <img src="{{ $badge['image'] }}" alt="" class="h-16 w-16 object-contain" loading="lazy">
                                @else
                                    <span class="flex h-16 w-16 items-center justify-center rounded-full bg-amber-100 text-2xl font-bold text-amber-700">{{ mb_substr($badge['title'], 0, 1) }}</span>
                                @endif
                                <span class="mt-2 text-sm font-bold leading-tight text-ink-900">{{ $badge['title'] }}</span>
                                @if ($badge['tier']) <span class="mt-0.5 text-[11px] font-bold uppercase tracking-wide text-amber-700">{{ ucfirst(strtolower($badge['tier'])) }}</span> @endif
                                <span class="mt-0.5 text-xs text-gray-500">{{ $badge['description'] }}</span>
                                <span class="mt-1 text-[11px] text-gray-400">Earned {{ $badge['earnedAt']?->format('M j, Y') }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </section>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    (() => {
        const box = document.getElementById('tester-toggle');
        if (!box) return;
        const tag = document.querySelector('[data-tester-tag]');
        const name = @json($user->full_name ?: $user->email);
        box.addEventListener('change', async () => {
            const desired = box.checked;
            // Ask first; the switch only moves once the admin agrees.
            box.checked = !desired;
            const yes = await window.adminConfirm(desired
                ? { title: 'Make this a tester account?', message: name + ' will be able to open any lesson without unlocking it first, for testing the app.', ok: 'Yes, make tester', tone: 'primary' }
                : { title: 'Remove tester access?', message: name + ' will go back to normal step by step progress like every other learner.', ok: 'Yes, remove', tone: 'primary' });
            if (!yes) return;
            box.checked = desired;
            box.disabled = true;
            try {
                const res = await fetch(box.dataset.url, {
                    method: 'PATCH',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': @json(csrf_token()), 'X-Requested-With': 'XMLHttpRequest' },
                    credentials: 'same-origin',
                    body: JSON.stringify({ is_tester: desired }),
                });
                if (!res.ok) throw new Error(res.status === 419 ? 'Your session expired. Reload the page and try again.' : 'Request failed (' + res.status + ').');
                const data = await res.json();
                box.checked = data.isTester;
                tag.classList.toggle('hidden', !data.isTester);
                window.adminToast(data.message, 'success');
            } catch (e) {
                box.checked = !desired;
                window.adminToast('Could not change the tester setting. ' + e.message, 'error');
            } finally {
                box.disabled = false;
            }
        });
    })();
</script>
@endpush
