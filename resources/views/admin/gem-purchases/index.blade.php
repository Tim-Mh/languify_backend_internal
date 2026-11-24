@extends('layouts.admin')

@section('title', 'Gem purchases')

@php
    $usd = fn (int $cents) => '$'.number_format($cents / 100, 2);
    $filtered = $status || $provider || $pack || $search !== '';
    // The picked month or year rides along on every filter link and form.
    $periodParams = $period->params();
    $listFilters = ['status' => $status, 'provider' => $provider, 'pack' => $pack, 'search' => $search ?: null];
    $chipLink = fn (?string $key) => route('admin.gem-purchases.index', array_filter([
        'status' => $key, 'provider' => $provider, 'pack' => $pack, 'search' => $search ?: null, 'per_page' => request('per_page'),
    ]) + $periodParams);
    $clearLink = route('admin.gem-purchases.index', $periodParams);

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
    $packColors = ['#9e1a69', '#8b5cf6', '#0284c7', '#ea580c', '#059669', '#e878bb', '#f59e0b', '#64748b'];
    $providerTotal = max(1, $report['byProvider']->sum('cents'));
@endphp

@section('content')
    <div class="mx-auto max-w-7xl space-y-5">
        @include('admin.partials.period-picker', ['route' => 'admin.gem-purchases.index', 'carry' => $listFilters + ['per_page' => request('per_page')]])

        {{-- The picked period --}}
        <section aria-labelledby="period-totals-heading" class="space-y-4">
            <h2 id="period-totals-heading" class="sr-only">Totals for {{ $period->label() }}</h2>
            <dl class="grid grid-cols-2 gap-3 lg:grid-cols-4">
                <div class="card p-4">
                    <dt class="text-xs font-bold text-gray-500">Money earned</dt>
                    <dd class="mt-1 font-display text-2xl font-bold text-brand-600">{{ $usd($report['cents']) }}</dd>
                    <dd class="text-xs font-semibold {{ $change[1] }}">{{ $change[0] }}</dd>
                </div>
                @foreach ([
                    ['Purchases', number_format($report['purchases']), 'text-ink-900', 'Paid gem packs'],
                    ['Gems sold', number_format($report['gems']), 'text-sky-600', 'Given to learners'],
                    ['Buyers', number_format($report['buyers']), 'text-emerald-600', 'Different learners who paid'],
                ] as [$label, $value, $tone, $hint])
                    <div class="card p-4">
                        <dt class="text-xs font-bold text-gray-500">{{ $label }}</dt>
                        <dd class="mt-1 font-display text-2xl font-bold {{ $tone }}">{{ $value }}</dd>
                        <dd class="text-xs text-gray-500">{{ $hint }}</dd>
                    </div>
                @endforeach
            </dl>

            @if ($report['purchases'] > 0)
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                    <figure class="card flex min-w-0 flex-col p-5 lg:col-span-2">
                        <figcaption class="flex flex-wrap items-baseline justify-between gap-2">
                            <span class="font-display text-lg font-bold text-ink-900">Money earned per {{ $period->isYear() ? 'month' : 'day' }}</span>
                            <span class="text-xs text-gray-500">{{ $usd($report['cents']) }} in {{ $period->label() }}</span>
                        </figcaption>
                        <div class="relative mt-3 h-64 lg:h-auto lg:min-h-64 lg:flex-1"><canvas id="chart-gems-money" role="img" aria-label="Money earned from gems per {{ $period->isYear() ? 'month' : 'day' }} in {{ $period->label() }}"></canvas></div>
                    </figure>

                    <div class="card min-w-0 p-5">
                        <h3 class="font-display text-lg font-bold text-ink-900">Money by gem pack</h3>
                        <div class="relative mx-auto mt-3 h-44 w-44"><canvas id="chart-gems-packs" role="img" aria-label="Share of money by gem pack"></canvas></div>
                        <ul class="mt-4 space-y-2 text-sm">
                            @foreach ($report['byPack'] as $i => $row)
                                <li class="flex items-center gap-2.5">
                                    <span class="h-3 w-3 shrink-0 rounded-full" style="background: {{ $packColors[$i % count($packColors)] }}"></span>
                                    <span class="min-w-0 flex-1 truncate font-semibold text-ink-900">{{ $row['label'] }}</span>
                                    <span class="shrink-0 text-gray-500">{{ $usd($row['cents']) }} · {{ round($row['cents'] / max(1, $report['cents']) * 100) }}%</span>
                                </li>
                            @endforeach
                        </ul>

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
                                <p class="mt-0.5 text-xs text-gray-500">{{ number_format($row['payments']) }} {{ $row['payments'] === 1 ? 'purchase' : 'purchases' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="card flex flex-col items-center justify-center px-4 py-12 text-center">
                    <p class="text-3xl" aria-hidden="true">💎</p>
                    <p class="mt-2 font-bold text-ink-900">No gem purchases in this period</p>
                    <p class="mt-1 text-sm text-gray-500">Try another month or year above.</p>
                </div>
            @endif
        </section>

        <h2 class="pt-2 font-display text-lg font-bold text-ink-900">Purchases in {{ $period->label() }}</h2>

        <nav class="flex flex-wrap gap-2" aria-label="Filter by status">
            @foreach ([[null, 'All', $counts['all']], ['completed', 'Paid', $counts['completed']], ['pending', 'Not paid', $counts['pending']]] as [$key, $label, $count])
                <a href="{{ $chipLink($key) }}" @if ($status === $key) aria-current="true" @endif class="{{ $status === $key ? 'chip-active' : 'chip' }}">
                    {{ $label }}
                    <span class="rounded-full px-2 py-0.5 text-xs {{ $status === $key ? 'bg-white/20' : 'bg-gray-100 text-gray-500' }}">{{ number_format($count) }}</span>
                </a>
            @endforeach
        </nav>

        <p class="text-xs text-gray-500">
            <strong>Not paid</strong> means the learner opened Stripe checkout but the payment never went through (closed the page, card declined, or still paying). No gems were given.
        </p>

        <form method="GET" class="card flex flex-wrap items-end gap-3 p-4">
            @foreach ($periodParams as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            @if ($status) <input type="hidden" name="status" value="{{ $status }}"> @endif
            @if (request('per_page')) <input type="hidden" name="per_page" value="{{ request('per_page') }}"> @endif
            <div class="min-w-0 flex-1 basis-56">
                <label for="search" class="mb-1 block text-xs font-bold text-gray-500">Learner</label>
                <input type="search" id="search" name="search" value="{{ $search }}" placeholder="Name or email" class="field-input">
            </div>
            <div class="min-w-0 flex-1 basis-40 sm:flex-none">
                <label for="pack" class="mb-1 block text-xs font-bold text-gray-500">Pack</label>
                <select id="pack" name="pack" class="field-input pr-8">
                    <option value="">All packs</option>
                    @foreach ($packs as $key => $title)
                        <option value="{{ $key }}" @selected($pack === $key)>{{ $title }}</option>
                    @endforeach
                    @if ($pack && ! $packs->has($pack))
                        <option value="{{ $pack }}" selected>{{ $pack }} (deleted pack)</option>
                    @endif
                </select>
            </div>
            <div class="min-w-0 flex-1 basis-40 sm:flex-none">
                <label for="provider" class="mb-1 block text-xs font-bold text-gray-500">Paid through</label>
                <select id="provider" name="provider" class="field-input pr-8">
                    <option value="">Any</option>
                    <option value="stripe" @selected($provider === 'stripe')>Stripe (web, Android)</option>
                    <option value="apple" @selected($provider === 'apple')>Apple (iPhone)</option>
                </select>
            </div>
            <button type="submit" class="btn-primary">Apply</button>
            @if ($filtered)
                <a href="{{ $clearLink }}" class="py-2.5 text-sm font-bold text-gray-500 hover:text-gray-900">Clear all</a>
            @endif
        </form>

        <x-per-page :paginator="$purchases" noun="purchases" />

        <div class="card overflow-hidden">
            <div class="relative overflow-x-auto">
                <table class="w-full min-w-[820px] text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/80">
                        <tr>
                            <th class="th">Learner</th>
                            <th class="th">Pack</th>
                            <th class="th">Paid</th>
                            <th class="th">Status</th>
                            <th class="th">Date</th>
                            <th class="th">Store reference</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($purchases as $purchase)
                            @php
                                $isApple = $purchase->provider === 'apple';
                                $reference = $isApple ? $purchase->apple_transaction_id : $purchase->stripe_checkout_session_id;
                            @endphp
                            <tr class="hover:bg-brand-50/40">
                                <td class="td">
                                    @if ($purchase->user)
                                        <a href="{{ route('admin.users.show', $purchase->user) }}" class="group flex items-center gap-3">
                                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-brand-100 text-sm font-bold uppercase text-brand-600">{{ mb_substr($purchase->user->full_name ?: $purchase->user->email, 0, 1) }}</span>
                                            <span class="min-w-0">
                                                <span class="block truncate font-bold text-ink-900 group-hover:text-brand-600">{{ $purchase->user->full_name ?: 'No name yet' }}</span>
                                                <span class="block truncate text-gray-500">{{ $purchase->user->email }}</span>
                                            </span>
                                        </a>
                                    @else
                                        <span class="text-gray-400">Deleted user</span>
                                    @endif
                                </td>
                                <td class="td">
                                    <span class="font-bold text-ink-900">{{ $packs[$purchase->pack_key] ?? ucfirst($purchase->pack_key) }}</span>
                                    <span class="block text-xs text-gray-500">💎 {{ number_format($purchase->gems_credited) }} gems</span>
                                </td>
                                <td class="td whitespace-nowrap">
                                    <span class="font-bold text-ink-900">{{ $usd((int) $purchase->amount_cents) }}</span>
                                    @if (strtolower((string) $purchase->currency) !== 'usd')
                                        <span class="text-xs text-gray-500">{{ strtoupper($purchase->currency) }}</span>
                                    @endif
                                    <span class="block text-xs text-gray-500">{{ $isApple ? 'Apple (iPhone)' : 'Stripe' }}</span>
                                </td>
                                <td class="td">
                                    @if ($purchase->status === 'completed')
                                        <span class="tag bg-emerald-100 text-emerald-800">Paid</span>
                                    @elseif ($purchase->status === 'pending')
                                        <span class="tag bg-amber-100 text-amber-800">Not paid</span>
                                    @else
                                        <span class="tag bg-gray-100 text-gray-600">{{ ucfirst((string) $purchase->status) }}</span>
                                    @endif
                                </td>
                                <td class="td whitespace-nowrap text-gray-600">
                                    {{ $purchase->created_at?->format('M j, Y') }}
                                    <span class="block text-xs text-gray-500">{{ $purchase->created_at?->format('g:i a') }}</span>
                                </td>
                                <td class="td">
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
                                <td colspan="6" class="px-5 py-12 text-center">
                                    @if ($filtered)
                                        <p class="font-bold text-ink-900">No purchases match these filters in {{ $period->label() }}.</p>
                                        <a href="{{ $clearLink }}" class="mt-1 inline-block text-sm font-bold text-brand-600 hover:underline">Clear all filters</a>
                                    @else
                                        <p class="font-bold text-ink-900">No gem purchases in this period.</p>
                                        <p class="mt-1 text-sm text-gray-500">Try another month or year above. When a learner buys a gem pack in the Store it shows up here.</p>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>{{ $purchases->links() }}</div>
    </div>
@endsection

@include('admin.partials.report-charts')

@push('scripts')
    <script>
        (() => {
            const report = @json($report);
            const money = document.getElementById('chart-gems-money');
            if (money) {
                reportCharts.bars(money, {
                    labels: report.labels,
                    titles: report.titles,
                    values: report.perBucket,
                    label: 'Earned',
                    money: true,
                    axisTitle: 'Money earned',
                    extra: (i) => reportCharts.plural(report.purchasesPerBucket[i], 'purchase'),
                });
            }
            const packs = document.getElementById('chart-gems-packs');
            if (packs) reportCharts.doughnut(packs, report.byPack, @json($packColors), 'purchase');
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
