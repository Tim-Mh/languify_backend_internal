@extends('layouts.admin')

@section('title', 'Family Plans')

@php
    $chips = ['all' => 'All groups', 'active' => 'Plan active', 'inactive' => 'Plan ended'];
    $person = fn ($user) => $user?->full_name ?: $user?->email ?? 'Deleted user';
    $usd = fn (int $cents) => '$'.number_format($cents / 100, 2);
    // The picked month or year rides along on the filter links and the search form.
    $periodParams = $period->params();

    // Money card: change against the period before, as a percent.
    $before = $report['previousCents'];
    if ($before === 0) {
        $change = $report['cents'] === 0
            ? ['Also $0.00 in '.$report['previousLabel'], 'text-gray-500']
            : ['Up from $0.00 in '.$report['previousLabel'], 'text-emerald-600'];
    } else {
        $pct = (int) round(($report['cents'] - $before) / $before * 100);
        $change = $pct === 0
            ? ['Same as '.$usd($before).' in '.$report['previousLabel'], 'text-gray-500']
            : [($pct > 0 ? '+' : '').$pct.'% vs '.$usd($before).' in '.$report['previousLabel'], $pct > 0 ? 'text-emerald-600' : 'text-rose-600'];
    }
    $unit = $period->isYear() ? 'month' : 'day';
@endphp

@section('content')
    <div class="mx-auto max-w-7xl space-y-5">
        @include('admin.partials.period-picker', ['route' => 'admin.family-groups.index', 'carry' => ['status' => $filter === 'all' ? null : $filter, 'search' => $search ?: null, 'per_page' => request('per_page')]])

        {{-- The picked period --}}
        <section aria-labelledby="period-totals-heading" class="space-y-4">
            <h2 id="period-totals-heading" class="sr-only">Family plan totals for {{ $period->label() }}</h2>
            <dl class="grid grid-cols-2 gap-3 lg:grid-cols-4">
                <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
                    <dt class="text-xs font-bold text-gray-500">Family plan money earned</dt>
                    <dd class="mt-1 font-display text-2xl font-bold text-brand-600">{{ $usd($report['cents']) }}</dd>
                    <dd class="text-xs font-semibold {{ $change[1] }}">{{ $change[0] }}</dd>
                    <dd class="text-xs text-gray-500">{{ number_format($report['payments']) }} {{ $report['payments'] === 1 ? 'payment' : 'payments' }}</dd>
                </div>
                @foreach ([
                    ['New family groups', number_format($report['groups']), 'text-violet-600', 'Groups created'],
                    ['Members joined', number_format($report['joined']), 'text-emerald-600', 'Still in a group today'],
                    ['Invites', number_format($report['invitesSent']).' sent', 'text-amber-600', number_format($report['invitesAccepted']).' accepted'],
                ] as [$label, $value, $tone, $hint])
                    <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
                        <dt class="text-xs font-bold text-gray-500">{{ $label }}</dt>
                        <dd class="mt-1 font-display text-2xl font-bold {{ $tone }}">{{ $value }}</dd>
                        <dd class="text-xs text-gray-500">{{ $hint }}</dd>
                    </div>
                @endforeach
            </dl>

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                <figure class="card min-w-0 p-5">
                    <figcaption class="flex flex-wrap items-baseline justify-between gap-2">
                        <span class="font-display text-lg font-bold text-ink-900">Family plan money per {{ $unit }}</span>
                        <span class="text-xs text-gray-500">{{ $usd($report['cents']) }} in {{ $period->label() }}</span>
                    </figcaption>
                    @if ($report['payments'] > 0)
                        <div class="relative mt-3 h-60"><canvas id="chart-family-money" role="img" aria-label="Family plan money per {{ $unit }} in {{ $period->label() }}"></canvas></div>
                    @else
                        <div class="mt-3 flex h-60 flex-col items-center justify-center rounded-xl bg-gray-50 px-4 text-center">
                            <p class="font-bold text-ink-900">No payments in this period</p>
                            <p class="mt-1 text-sm text-gray-500">Try another month or year above.</p>
                        </div>
                    @endif
                </figure>
                <figure class="card min-w-0 p-5">
                    <figcaption class="flex flex-wrap items-baseline justify-between gap-2">
                        <span class="font-display text-lg font-bold text-ink-900">Members joined per {{ $unit }}</span>
                        <span class="text-xs text-gray-500">{{ number_format($report['joined']) }} in {{ $period->label() }}</span>
                    </figcaption>
                    @if ($report['joined'] > 0)
                        <div class="relative mt-3 h-60"><canvas id="chart-family-joined" role="img" aria-label="Members joined per {{ $unit }} in {{ $period->label() }}"></canvas></div>
                    @else
                        <div class="mt-3 flex h-60 flex-col items-center justify-center rounded-xl bg-gray-50 px-4 text-center">
                            <p class="font-bold text-ink-900">No one joined a family group in this period</p>
                            <p class="mt-1 text-sm text-gray-500">Try another month or year above.</p>
                        </div>
                    @endif
                </figure>
            </div>
        </section>

        <h2 class="pt-2 text-sm font-bold text-gray-500">Right now <span class="font-normal">(today, whatever dates are picked above)</span></h2>
        <dl class="grid grid-cols-2 gap-3 lg:grid-cols-4">
            @foreach ([
                ['Groups with an active plan', number_format($counts['active']), 'text-emerald-600'],
                ['Groups whose plan ended', number_format($counts['inactive']), 'text-gray-500'],
                ['Members', number_format($summary['members']), 'text-violet-600'],
                ['Invites waiting', number_format($summary['pending']), 'text-amber-600'],
            ] as [$label, $value, $tone])
                <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
                    <dt class="text-xs font-bold text-gray-500">{{ $label }}</dt>
                    <dd class="mt-1 font-display text-2xl font-bold {{ $tone }}">{{ $value }}</dd>
                </div>
            @endforeach
        </dl>

        <div class="flex flex-wrap items-center justify-between gap-3">
            <nav class="flex flex-wrap gap-2" aria-label="Filter groups">
                @foreach ($chips as $key => $label)
                    <a href="{{ route('admin.family-groups.index', array_filter(['status' => $key === 'all' ? null : $key, 'search' => $search ?: null]) + $periodParams) }}"
                       @if ($filter === $key) aria-current="true" @endif
                       class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-bold transition {{ $filter === $key ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'bg-white text-gray-600 ring-1 ring-gray-200 hover:text-gray-900' }}">
                        {{ $label }}
                        <span class="rounded-full px-2 py-0.5 text-xs {{ $filter === $key ? 'bg-white/20' : 'bg-gray-100 text-gray-500' }}">{{ number_format($counts[$key]) }}</span>
                    </a>
                @endforeach
            </nav>
            <form method="GET" class="flex min-w-0 flex-1 basis-72 justify-end gap-2">
                @if ($filter !== 'all') <input type="hidden" name="status" value="{{ $filter }}"> @endif
                @foreach ($periodParams as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <label for="search" class="sr-only">Search by name or email</label>
                <input type="search" id="search" name="search" value="{{ $search }}" placeholder="Owner, member or invite email"
                       class="w-full max-w-sm rounded-xl border border-gray-200 bg-white px-3 py-2 outline-none focus:border-brand-400 focus:ring-2 focus:ring-brand-500/30">
                <button type="submit" class="rounded-xl bg-brand-600 px-4 py-2 font-bold text-white hover:bg-brand-700">Search</button>
            </form>
        </div>

        <x-per-page :paginator="$familyGroups" noun="groups" />

        <div class="flex justify-end gap-2 text-sm font-bold">
            <button type="button" data-family-all="open" class="text-brand-600 hover:underline">Open all</button>
            <span class="text-gray-300" aria-hidden="true">|</span>
            <button type="button" data-family-all="close" class="text-brand-600 hover:underline">Close all</button>
        </div>

        {{-- Each group shows just its owner and plan; click to see seats and members. --}}
        <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-2">
            @forelse ($familyGroups as $group)
                @php
                    $ownerPlan = $group->owner?->activeSubscription;
                    $live = $ownerPlan && $ownerPlan->plan_key === 'family';
                    $used = 1 + $group->members->count() + $group->pendingInvites->count();
                @endphp
                <details class="group/family rounded-2xl bg-white shadow-sm ring-1 ring-gray-100 open:ring-violet-200" data-family-card>
                    <summary class="flex cursor-pointer list-none items-start justify-between gap-3 rounded-2xl p-5 hover:bg-gray-50/70 group-open/family:rounded-b-none group-open/family:border-b group-open/family:border-gray-100 [&::-webkit-details-marker]:hidden">
                        <div class="flex min-w-0 items-center gap-3">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-violet-100 font-bold uppercase text-violet-700">{{ mb_substr($person($group->owner), 0, 1) }}</span>
                            <div class="min-w-0">
                                <p class="text-[11px] font-bold uppercase tracking-wide text-gray-400">Owner, pays</p>
                                @if ($group->owner)
                                    <p class="truncate font-bold text-ink-900">{{ $person($group->owner) }}</p>
                                    <p class="truncate text-sm text-gray-500">{{ $group->owner->email }}</p>
                                @else
                                    <p class="font-bold text-gray-400">Deleted user</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex shrink-0 items-start gap-3">
                        <div class="text-right">
                            @if ($live)
                                <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-bold text-emerald-800">Plan active</span>
                                @if ($ownerPlan->current_period_end)
                                    <p class="mt-1.5 text-xs text-gray-500">{{ $ownerPlan->cancel_at_period_end ? 'Ends' : 'Renews' }} {{ $ownerPlan->current_period_end->format('M j, Y') }}</p>
                                @endif
                            @else
                                <span class="rounded-full bg-gray-100 px-2.5 py-1 text-xs font-bold text-gray-600">Plan ended</span>
                                <p class="mt-1.5 text-xs text-gray-500">Members have no access</p>
                            @endif
                        </div>
                        <svg class="mt-1 h-5 w-5 text-gray-400 transition group-open/family:rotate-180" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                        </div>
                    </summary>

                    <div class="p-5">
                        @if ($group->owner)
                            <a href="{{ route('admin.users.show', $group->owner) }}" class="mb-4 inline-flex items-center gap-1 text-sm font-bold text-brand-600 hover:underline">Open the owner's learner page
                                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                            </a>
                        @endif
                        <div class="flex items-center justify-between text-xs font-bold text-gray-500">
                            <span>Seats</span>
                            <span>{{ $used }} of {{ $seats }} used</span>
                        </div>
                        <div class="mt-1.5 flex gap-1" aria-hidden="true">
                            @for ($i = 0; $i < $seats; $i++)
                                <span class="h-2 flex-1 rounded-full {{ $i === 0 ? 'bg-violet-600' : ($i <= $group->members->count() ? 'bg-violet-400' : ($i < $used ? 'bg-amber-300' : 'bg-gray-100')) }}"></span>
                            @endfor
                        </div>

                        <ul class="scroll-list mt-4 space-y-2 text-sm">
                            @foreach ($group->members as $member)
                                <li class="flex items-center justify-between gap-3 rounded-xl bg-gray-50 px-3 py-2">
                                    <span class="min-w-0">
                                        @if ($member->user)
                                            <a href="{{ route('admin.users.show', $member->user) }}" class="block truncate font-semibold text-ink-900 hover:text-brand-600">{{ $person($member->user) }}</a>
                                            <span class="block truncate text-xs text-gray-500">{{ $member->user->email }}</span>
                                        @else
                                            <span class="text-gray-400">Deleted user</span>
                                        @endif
                                    </span>
                                    <span class="shrink-0 text-xs text-gray-500">Joined {{ $member->joined_at->format('M j, Y') }}</span>
                                </li>
                            @endforeach
                            @foreach ($group->pendingInvites as $invite)
                                <li class="flex items-center justify-between gap-3 rounded-xl border border-dashed border-amber-300 px-3 py-2">
                                    <span class="min-w-0">
                                        <span class="block truncate font-semibold text-gray-700">{{ $invite->email }}</span>
                                        <span class="block text-xs font-bold text-amber-700">{{ $invite->isExpired() ? 'Invite expired' : 'Invite sent, waiting' }}</span>
                                    </span>
                                    <span class="shrink-0 text-xs text-gray-500">{{ $invite->isExpired() ? 'Expired' : 'Expires' }} {{ $invite->expires_at->format('M j, Y') }}</span>
                                </li>
                            @endforeach
                            @if ($group->members->isEmpty() && $group->pendingInvites->isEmpty())
                                <li class="rounded-xl bg-gray-50 px-3 py-3 text-center text-gray-500">No one invited yet.</li>
                            @endif
                        </ul>
                    </div>
                    <footer class="border-t border-gray-100 px-5 py-3 text-xs text-gray-500">Group created {{ $group->created_at->format('M j, Y') }}</footer>
                </details>
            @empty
                <div class="rounded-2xl bg-white p-10 text-center shadow-sm ring-1 ring-gray-100 lg:col-span-2">
                    <p class="font-bold text-ink-900">{{ $search || $filter !== 'all' ? 'No groups match these filters.' : 'No family groups yet.' }}</p>
                    <p class="mt-1 text-sm text-gray-500">A group appears here when someone buys the Family plan.</p>
                </div>
            @endforelse
        </div>

        <div>{{ $familyGroups->links() }}</div>
    </div>
@endsection

@include('admin.partials.report-charts')

@push('scripts')
<script>
    (() => {
        const report = @json($report);
        const money = document.getElementById('chart-family-money');
        if (money) {
            reportCharts.bars(money, {
                labels: report.labels,
                titles: report.titles,
                values: report.moneyPerBucket,
                label: 'Earned',
                money: true,
                axisTitle: 'Money earned',
                extra: (i) => reportCharts.plural(report.paymentsPerBucket[i], 'payment'),
            });
        }
        const joined = document.getElementById('chart-family-joined');
        if (joined) {
            reportCharts.bars(joined, {
                labels: report.labels,
                titles: report.titles,
                values: report.joinedPerBucket,
                label: 'Members joined',
                color: '#8b5cf6',
                axisTitle: 'Members',
            });
        }
    })();

    document.querySelectorAll('[data-family-all]').forEach((button) => button.addEventListener('click', () => {
        document.querySelectorAll('[data-family-card]').forEach((card) => { card.open = button.dataset.familyAll === 'open'; });
    }));
</script>
@endpush
