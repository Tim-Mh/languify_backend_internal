@extends('layouts.admin')

@section('title', 'Subscriptions')

@php
    $usd = fn (?int $cents) => $cents === null ? null : '$'.number_format($cents / 100, 2);
    $statusStyles = [
        'active' => ['Active', 'bg-emerald-100 text-emerald-800'],
        'trialing' => ['Trial', 'bg-sky-100 text-sky-800'],
        'past_due' => ['Payment failed', 'bg-rose-100 text-rose-800'],
        'unpaid' => ['Unpaid', 'bg-rose-100 text-rose-800'],
        'canceled' => ['Cancelled', 'bg-gray-200 text-gray-700'],
        'expired' => ['Expired', 'bg-gray-100 text-gray-600'],
        'incomplete' => ['Not paid', 'bg-amber-100 text-amber-800'],
    ];
    // The picked month or year rides along on every filter link and form.
    $periodParams = $period->params();
    $listFilters = ['status' => $filter === 'all' ? null : $filter, 'plan' => $plan, 'provider' => $provider, 'search' => $search ?: null];
    $chipLink = fn (string $key) => route('admin.subscriptions.index', array_filter([
        'status' => $key === 'all' ? null : $key, 'plan' => $plan, 'provider' => $provider, 'search' => $search ?: null,
    ]) + $periodParams);

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
    $planColors = ['#9e1a69', '#8b5cf6', '#0284c7', '#ea580c', '#059669', '#64748b'];
    $providerTotal = max(1, $report['byProvider']->sum('cents'));
@endphp

@section('content')
    <div class="mx-auto max-w-7xl space-y-5">
        @include('admin.partials.period-picker', ['route' => 'admin.subscriptions.index', 'carry' => $listFilters + ['per_page' => request('per_page')]])

        {{-- The picked period --}}
        <section aria-labelledby="period-totals-heading" class="space-y-4">
            <h2 id="period-totals-heading" class="sr-only">Totals for {{ $period->label() }}</h2>
            <dl class="grid grid-cols-2 gap-3 lg:grid-cols-4">
                <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
                    <dt class="text-xs font-bold text-gray-500">Money earned</dt>
                    <dd class="mt-1 font-display text-2xl font-bold text-brand-600">{{ $usd($report['cents']) }}</dd>
                    <dd class="text-xs font-semibold {{ $change[1] }}">{{ $change[0] }}</dd>
                </div>
                @foreach ([
                    ['Payments', number_format($report['payments']), 'text-ink-900', 'New plans and renewals'],
                    ['New subscribers', number_format($report['newSubscribers']), 'text-emerald-600', 'Paid for the first time'],
                    ['Cancellations', number_format($report['cancellations']), $report['cancellations'] ? 'text-rose-600' : 'text-gray-400', 'Plans cancelled'],
                ] as [$label, $value, $tone, $hint])
                    <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
                        <dt class="text-xs font-bold text-gray-500">{{ $label }}</dt>
                        <dd class="mt-1 font-display text-2xl font-bold {{ $tone }}">{{ $value }}</dd>
                        <dd class="text-xs text-gray-500">{{ $hint }}</dd>
                    </div>
                @endforeach
            </dl>

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                <figure class="card flex min-w-0 flex-col p-5 lg:col-span-2">
                    <figcaption class="flex flex-wrap items-baseline justify-between gap-2">
                        <span class="font-display text-lg font-bold text-ink-900">Money earned per {{ $period->isYear() ? 'month' : 'day' }}</span>
                        <span class="text-xs text-gray-500">{{ $usd($report['cents']) }} in {{ $period->label() }}</span>
                    </figcaption>
                    @if ($report['payments'] > 0)
                        <div class="relative mt-3 h-64 lg:h-auto lg:min-h-64 lg:flex-1"><canvas id="chart-subs-money" role="img" aria-label="Money earned per {{ $period->isYear() ? 'month' : 'day' }} in {{ $period->label() }}"></canvas></div>
                    @else
                        <div class="mt-3 flex h-64 flex-col items-center lg:h-auto lg:min-h-64 lg:flex-1 justify-center rounded-xl bg-gray-50 px-4 text-center">
                            <p class="font-bold text-ink-900">No payments in this period</p>
                            <p class="mt-1 text-sm text-gray-500">Try another month or year above.</p>
                        </div>
                    @endif
                </figure>

                <div class="card min-w-0 p-5">
                    <h3 class="font-display text-lg font-bold text-ink-900">Money by plan</h3>
                    @if ($report['byPlan']->sum('cents') > 0)
                        <div class="relative mx-auto mt-3 h-44 w-44"><canvas id="chart-subs-plans" role="img" aria-label="Share of money by plan"></canvas></div>
                        <ul class="mt-4 space-y-2 text-sm">
                            @foreach ($report['byPlan'] as $i => $row)
                                <li class="flex items-center gap-2.5">
                                    <span class="h-3 w-3 shrink-0 rounded-full" style="background: {{ $planColors[$i % count($planColors)] }}"></span>
                                    <span class="min-w-0 flex-1 truncate font-semibold text-ink-900">{{ $row['label'] }}</span>
                                    <span class="shrink-0 text-gray-500">{{ $usd($row['cents']) }} · {{ round($row['cents'] / max(1, $report['cents']) * 100) }}%</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-3 rounded-xl bg-gray-50 px-3 py-8 text-center text-sm text-gray-500">No payments in this period</p>
                    @endif

                    <h3 class="mt-6 text-sm font-bold text-ink-800">Paid through</h3>
                    @foreach ($report['byProvider'] as $row)
                        <div class="mt-3">
                            <div class="flex justify-between gap-2 text-sm">
                                <span class="font-semibold">{{ $row['label'] }}</span>
                                <span class="shrink-0 text-gray-500">{{ $usd($row['cents']) }}</span>
                            </div>
                            <div class="mt-1 h-2 overflow-hidden rounded-full bg-gray-100">
                                <div class="h-full rounded-full {{ $loop->first ? 'bg-violet-500' : 'bg-ink-900' }}" style="width: {{ round($row['cents'] / $providerTotal * 100) }}%"></div>
                            </div>
                            <p class="mt-0.5 text-xs text-gray-500">{{ number_format($row['payments']) }} {{ $row['payments'] === 1 ? 'payment' : 'payments' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Right now, whatever period is picked --}}
        <section aria-labelledby="now-heading">
            <h2 id="now-heading" class="mb-2 text-sm font-bold text-gray-500">Right now <span class="font-normal">(today, whatever dates are picked above)</span></h2>
            <dl class="grid grid-cols-2 gap-3 lg:grid-cols-4">
                @foreach ([
                    ['Active subscribers', number_format($summary['active']), 'text-emerald-600', 'Paying or on trial'],
                    ['Renewing in 7 days', number_format($summary['renewingSoon']), 'text-sky-600', 'Auto-renew is on'],
                    ['Cancelling', number_format($summary['cancelling']), 'text-amber-600', 'Ends at period end'],
                    ['Payment failed', number_format($summary['failed']), $summary['failed'] ? 'text-rose-600' : 'text-gray-400', 'Card was declined'],
                ] as [$label, $value, $tone, $hint])
                    <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
                        <dt class="text-xs font-bold text-gray-500">{{ $label }}</dt>
                        <dd class="mt-1 font-display text-2xl font-bold {{ $tone }}">{{ $value }}</dd>
                        <dd class="text-xs text-gray-500">{{ $hint }}</dd>
                    </div>
                @endforeach
            </dl>
        </section>

        <h2 class="pt-2 font-display text-lg font-bold text-ink-900">Payments in {{ $period->label() }}</h2>

        <nav class="flex flex-wrap gap-2" aria-label="Filter by status">
            @foreach ($filters as $key => $chip)
                <a href="{{ $chipLink($key) }}" @if ($filter === $key) aria-current="true" @endif
                   class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-bold transition {{ $filter === $key ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'bg-white text-gray-600 ring-1 ring-gray-200 hover:text-gray-900' }}">
                    {{ $chip['label'] }}
                    <span class="rounded-full px-2 py-0.5 text-xs {{ $filter === $key ? 'bg-white/20' : 'bg-gray-100 text-gray-500' }}">{{ number_format($chip['count']) }}</span>
                </a>
            @endforeach
        </nav>

        <form method="GET" class="flex flex-wrap items-end gap-3 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100">
            @foreach ($periodParams as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            @if ($filter !== 'all') <input type="hidden" name="status" value="{{ $filter }}"> @endif
            <div class="min-w-0 flex-1 basis-64">
                <label for="search" class="mb-1 block text-xs font-bold text-gray-500">Learner</label>
                <input type="search" id="search" name="search" value="{{ $search }}" placeholder="Name or email"
                       class="w-full rounded-xl border border-gray-200 px-3 py-2.5 outline-none focus:border-brand-400 focus:ring-2 focus:ring-brand-500/30">
            </div>
            <div>
                <label for="plan" class="mb-1 block text-xs font-bold text-gray-500">Plan</label>
                <select id="plan" name="plan" class="rounded-xl border border-gray-200 bg-white py-2.5 pl-3 pr-8 outline-none focus:border-brand-400">
                    <option value="">All plans</option>
                    @foreach ($plans as $key => $p)
                        <option value="{{ $key }}" @selected($plan === $key)>{{ $p->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="provider" class="mb-1 block text-xs font-bold text-gray-500">Paid through</label>
                <select id="provider" name="provider" class="rounded-xl border border-gray-200 bg-white py-2.5 pl-3 pr-8 outline-none focus:border-brand-400">
                    <option value="">Any</option>
                    <option value="stripe" @selected($provider === 'stripe')>Stripe (web, Android)</option>
                    <option value="apple" @selected($provider === 'apple')>Apple (iPhone)</option>
                </select>
            </div>
            <button type="submit" class="rounded-xl bg-brand-600 px-5 py-2.5 font-bold text-white hover:bg-brand-700">Apply</button>
            @if ($search || $plan || $provider || $filter !== 'all')
                <a href="{{ route('admin.subscriptions.index', $periodParams) }}" class="py-2.5 text-sm font-bold text-gray-500 hover:text-gray-900">Clear all</a>
            @endif
        </form>

        <x-per-page :paginator="$subscriptions" noun="payments" />

        <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-100">
            <div class="relative overflow-x-auto">
                <table class="w-full min-w-[900px] text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/80 text-xs font-bold uppercase tracking-wide text-gray-500">
                        <tr>
                            <th class="px-5 py-3">Learner</th>
                            <th class="px-4 py-3">Plan</th>
                            <th class="px-4 py-3">Paid</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Started</th>
                            <th class="px-4 py-3">Renews / ends</th>
                            <th class="px-4 py-3">Store reference</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($subscriptions as $sub)
                            @php
                                [$statusLabel, $statusClass] = $statusStyles[$sub->status] ?? [ucfirst(str_replace('_', ' ', $sub->status)), 'bg-gray-100 text-gray-600'];
                                $catalog = $plans->get($sub->plan_key);
                                $reference = $sub->provider === 'apple' ? $sub->apple_original_transaction_id : $sub->stripe_subscription_id;
                            @endphp
                            <tr class="hover:bg-brand-50/40">
                                <td class="px-5 py-3">
                                    @if ($sub->user)
                                        <a href="{{ route('admin.users.show', $sub->user) }}" class="group flex items-center gap-3">
                                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-brand-100 text-sm font-bold uppercase text-brand-600">{{ mb_substr($sub->user->full_name ?: $sub->user->email, 0, 1) }}</span>
                                            <span class="min-w-0">
                                                <span class="block truncate font-bold text-ink-900 group-hover:text-brand-600">{{ $sub->user->full_name ?: 'No name yet' }}</span>
                                                <span class="block truncate text-gray-500">{{ $sub->user->email }}</span>
                                            </span>
                                        </a>
                                    @else
                                        <span class="text-gray-400">Deleted user</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <span class="font-bold text-ink-900">{{ $catalog?->title ?? ucfirst($sub->plan_key) }}</span>
                                    <span class="block text-xs text-gray-500">{{ $sub->provider === 'apple' ? 'Apple' : 'Stripe' }}{{ $catalog ? ' · per '.$catalog->interval : '' }}</span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 font-bold text-ink-900">{{ $usd($sub->amount_cents) ?? 'Not recorded' }}</td>
                                <td class="px-4 py-3">
                                    <span class="whitespace-nowrap rounded-full px-2.5 py-1 text-xs font-bold {{ $statusClass }}">{{ $statusLabel }}</span>
                                    @if ($sub->cancel_at_period_end && in_array($sub->status, ['active', 'trialing']))
                                        <span class="mt-1 block text-xs font-semibold text-amber-700">Auto-renew off</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $sub->created_at->format('M j, Y') }}</td>
                                <td class="whitespace-nowrap px-4 py-3 text-gray-600">
                                    @if ($sub->current_period_end)
                                        {{ $sub->current_period_end->format('M j, Y') }}
                                        <span class="block text-xs {{ $sub->current_period_end->isPast() ? 'text-gray-400' : 'text-gray-500' }}">{{ $sub->current_period_end->diffForHumans() }}</span>
                                    @else
                                        <span class="text-gray-400">Not set</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if ($reference)
                                        <button type="button" data-copy="{{ $reference }}" title="Copy {{ $reference }}"
                                                class="max-w-[11rem] truncate rounded-lg bg-gray-50 px-2 py-1 font-mono text-xs text-gray-500 ring-1 ring-gray-200 hover:text-ink-900">{{ $reference }}</button>
                                    @else
                                        <span class="text-gray-400">None</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-5 py-12 text-center">
                                    <p class="font-bold text-ink-900">{{ $search || $plan || $provider || $filter !== 'all' ? 'No payments match these filters in '.$period->label().'.' : 'No payments in this period.' }}</p>
                                    @if ($search || $plan || $provider || $filter !== 'all')
                                        <a href="{{ route('admin.subscriptions.index', $periodParams) }}" class="mt-1 inline-block text-sm font-bold text-brand-600 hover:underline">Clear all filters</a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>{{ $subscriptions->links() }}</div>
    </div>
@endsection

@include('admin.partials.report-charts')

@push('scripts')
    <script>
        (() => {
            const report = @json($report);
            const money = document.getElementById('chart-subs-money');
            if (money) {
                reportCharts.bars(money, {
                    labels: report.labels,
                    titles: report.titles,
                    values: report.perBucket,
                    label: 'Earned',
                    money: true,
                    axisTitle: 'Money earned',
                    extra: (i) => reportCharts.plural(report.paymentsPerBucket[i], 'payment'),
                });
            }
            const plans = document.getElementById('chart-subs-plans');
            if (plans) reportCharts.doughnut(plans, report.byPlan, @json($planColors));
        })();

        // Store references are long; one click copies the whole thing.
        document.addEventListener('click', (event) => {
            const button = event.target.closest('[data-copy]')
            if (!button) return
            navigator.clipboard?.writeText(button.dataset.copy).then(() => {
                const text = button.textContent
                button.textContent = 'Copied'
                setTimeout(() => { button.textContent = text }, 1200)
            })
        })
    </script>
@endpush
