@extends('layouts.admin')

@section('title', 'Dashboard')

@php
    $usd = fn (int $cents) => '$'.number_format($cents / 100, 2);

    // "+3 vs yesterday" style change line for a card.
    $delta = function (float $now, float $before, string $against, bool $cents = false) use ($usd) {
        $diff = $now - $before;
        if ($diff == 0) {
            return ['text' => 'Same as '.$against, 'tone' => 'text-gray-500'];
        }
        $amount = $cents ? $usd((int) abs($diff)) : number_format(abs($diff));

        return [
            'text' => ($diff > 0 ? '+' : '-').$amount.' vs '.$against,
            'tone' => $diff > 0 ? 'text-emerald-600' : 'text-rose-600',
        ];
    };

    $cards = [
        ['New sign-ups today', number_format($today['signups'][0]), $delta($today['signups'][0], $today['signups'][1], 'yesterday'), 'bg-sky-100 text-sky-700', 'M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z'],
        ['Learners active today', number_format($today['active'][0]), $delta($today['active'][0], $today['active'][1], 'yesterday'), 'bg-orange-100 text-orange-700', 'M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z'],
        ['Lessons played today', number_format($today['lessons'][0]), $delta($today['lessons'][0], $today['lessons'][1], 'yesterday'), 'bg-emerald-100 text-emerald-700', 'M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342'],
        ['Revenue today', $usd($today['revenueToday'][0]), $delta($today['revenueToday'][0], $today['revenueToday'][1], 'yesterday', true), 'bg-brand-100 text-brand-600', 'M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z'],
        ['Revenue this month', $usd($today['revenueMonth'][0]), $delta($today['revenueMonth'][0], $today['revenueMonth'][1], 'last month so far', true), 'bg-violet-100 text-violet-700', 'M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941'],
        ['Active subscribers', number_format($today['subscribers']), ['text' => number_format($today['totalLearners']).' learners in total', 'tone' => 'text-gray-500'], 'bg-amber-100 text-amber-700', 'M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z'],
    ];
@endphp

@section('content')
    <div class="mx-auto max-w-7xl space-y-6">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div>
                <p class="text-sm font-semibold text-gray-500">{{ $now->format('l, F j, Y') }}</p>
                <h2 class="font-display text-2xl font-bold text-ink-900">Welcome back, {{ \Illuminate\Support\Str::of(auth()->user()->full_name ?: 'Admin')->before(' ') }}</h2>
            </div>
            <p class="text-xs text-gray-500">Days and times are Pakistan time.</p>
        </div>

        {{-- 1. Today at a glance --}}
        <section aria-labelledby="today-heading">
            <h2 id="today-heading" class="sr-only">Today at a glance</h2>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
                @foreach ($cards as [$label, $value, $change, $iconTone, $icon])
                    <div class="flex items-start gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-gray-100">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl {{ $iconTone }}">
                            <svg class="h-6 w-6" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}" /></svg>
                        </span>
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-gray-500">{{ $label }}</p>
                            <p class="mt-1 font-display text-2xl font-bold text-ink-900">{{ $value }}</p>
                            <p class="mt-1 text-xs font-semibold {{ $change['tone'] }}">{{ $change['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- 2. Growth --}}
        <section class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-gray-100" aria-labelledby="growth-heading">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <h2 id="growth-heading" class="font-display text-lg font-bold text-ink-900">Growth</h2>
                <div class="inline-flex rounded-full bg-gray-100 p-1 text-sm font-bold" role="group" aria-label="Date range">
                    @foreach ($ranges as $option)
                        <a href="{{ route('admin.dashboard', ['range' => $option]) }}"
                           @if ($option === $range) aria-current="true" @endif
                           class="rounded-full px-4 py-1.5 transition {{ $option === $range ? 'bg-white text-brand-600 shadow' : 'text-gray-500 hover:text-gray-900' }}">{{ $option }} days</a>
                    @endforeach
                </div>
            </div>
            <div class="mt-5 grid grid-cols-1 gap-6 lg:grid-cols-2">
                @foreach ([
                    ['chart-signups', 'Sign-ups per day', array_sum($charts['signups']->all()).' in '.$range.' days'],
                    ['chart-active', 'Active learners per day', 'Learners who played at least one lesson'],
                    ['chart-lessons', 'Lessons played per day', array_sum($charts['lessons']->all()).' in '.$range.' days, replays included'],
                    ['chart-revenue', 'Revenue per day', $usd((int) round((array_sum($charts['gemRevenue']->all()) + array_sum($charts['subRevenue']->all())) * 100)).' in '.$range.' days'],
                ] as [$id, $title, $note])
                    <figure>
                        <figcaption class="flex items-baseline justify-between gap-2">
                            <span class="text-sm font-bold text-ink-800">{{ $title }}</span>
                            <span class="text-xs text-gray-500">{{ $note }}</span>
                        </figcaption>
                        <div class="relative mt-2 h-52"><canvas id="{{ $id }}" aria-label="{{ $title }}" role="img"></canvas></div>
                    </figure>
                @endforeach
            </div>
        </section>

        <div>
            {{-- 3. Money --}}
            <section class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-gray-100" aria-labelledby="money-heading">
                <h2 id="money-heading" class="font-display text-lg font-bold text-ink-900">Money</h2>
                <div class="mt-4 grid gap-5 sm:grid-cols-2">
                    <div>
                        <h3 class="text-sm font-bold text-ink-800">Revenue by source (all time)</h3>
                        @php $splitTotal = max(1, array_sum($money['split']->all())); @endphp
                        @forelse ($money['split'] as $source => $cents)
                            <div class="mt-3">
                                <div class="flex justify-between text-sm">
                                    <span class="font-semibold">{{ $source }}</span>
                                    <span class="text-gray-500">{{ $usd((int) $cents) }}</span>
                                </div>
                                <div class="mt-1 h-2 overflow-hidden rounded-full bg-gray-100">
                                    <div class="h-full rounded-full bg-violet-500" style="width: {{ round($cents / $splitTotal * 100) }}%"></div>
                                </div>
                            </div>
                        @empty
                            <p class="mt-3 text-sm text-gray-500">No revenue yet.</p>
                        @endforelse
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-ink-800">Subscribers by plan (current day)</h3>
                        <ul class="mt-3 space-y-2 text-sm">
                            @forelse ($money['activeByPlan'] as $plan => $count)
                                <li class="flex justify-between rounded-xl bg-gray-50 px-3 py-2">
                                    <span class="font-semibold">{{ ucfirst($plan) }}</span>
                                    <span>{{ number_format($count) }}</span>
                                </li>
                            @empty
                                <li class="text-gray-500">No active subscribers.</li>
                            @endforelse
                            <li class="flex justify-between rounded-xl bg-rose-50 px-3 py-2 text-rose-800">
                                <span class="font-semibold">Cancelled this month</span>
                                <span>{{ number_format($money['cancellations']) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <h3 class="mt-6 text-sm font-bold text-ink-800">Purchases in the last 7 days <span class="font-normal text-gray-500">({{ $money['purchases']->count() }} · {{ $usd((int) $money['purchases']->sum('cents')) }})</span></h3>
                <ul class="scroll-list mt-2 divide-y divide-gray-100 text-sm">
                    @forelse ($money['purchases'] as $purchase)
                        <li class="flex items-center justify-between gap-3 py-2">
                            <span class="min-w-0">
                                <span class="block truncate font-semibold">{{ $purchase['who']?->full_name ?: $purchase['who']?->email ?? 'Deleted user' }}</span>
                                <span class="block text-xs text-gray-500">{{ $purchase['what'] }} · {{ $purchase['at']->diffForHumans() }}</span>
                            </span>
                            <span class="font-bold text-ink-900">{{ $usd($purchase['cents']) }}</span>
                        </li>
                    @empty
                        <li class="py-2 text-gray-500">No purchases in the last 7 days.</li>
                    @endforelse
                </ul>
            </section>
        </div>

        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
            {{-- 4. Ads --}}
            <section class="flex flex-col rounded-2xl bg-white p-5 shadow-sm ring-1 ring-gray-100" aria-labelledby="ads-heading">
                <div class="flex items-center justify-between gap-2">
                    <h2 id="ads-heading" class="font-display text-lg font-bold text-ink-900">Ads, last 7 days</h2>
                    <a href="{{ route('admin.ads.stats') }}" class="text-sm font-bold text-brand-600 hover:underline">Full stats</a>
                </div>
                <dl class="mt-4 grid grid-cols-3 gap-3">
                    @foreach ([['Views', number_format($ads['views'])], ['Clicks', number_format($ads['clicks'])], ['Click rate', $ads['rate'].'%']] as [$label, $value])
                        <div class="rounded-xl bg-gray-50 p-3">
                            <dt class="text-xs font-semibold text-gray-500">{{ $label }}</dt>
                            <dd class="mt-1 font-display text-lg font-bold text-ink-900">{{ $value }}</dd>
                        </div>
                    @endforeach
                </dl>
                @if ($ads['byProduct']->sum('views') > 0)
                    {{-- Each product's share of views; clicks sit beside it in the legend. --}}
                    <div class="mt-4 flex min-h-0 flex-1 flex-col gap-4">
                        {{-- The tooltip is HTML laid over the chart rather than drawn on
                             the canvas, so it is never cut off by the chart's small box. --}}
                        <div class="relative mx-auto h-44 w-44 shrink-0">
                            <canvas id="chart-ads" role="img" aria-label="Share of ad views by product"></canvas>
                            <div id="chart-ads-tip" class="pointer-events-none absolute z-10 hidden w-max max-w-[14rem] -translate-x-1/2 -translate-y-full rounded-xl bg-ink-900 px-3 py-2 text-xs text-white shadow-lg"></div>
                        </div>
                        <ul class="scroll-list min-h-0 flex-1 space-y-2 text-sm xl:max-h-none">
                            @foreach ($ads['byProduct'] as $i => $row)
                                <li class="flex items-start gap-2.5">
                                    <span class="mt-1 h-3 w-3 shrink-0 rounded-full" data-ads-swatch="{{ $i }}"></span>
                                    <span class="min-w-0 flex-1">
                                        <span class="block break-words font-semibold text-ink-900">{{ $row['product'] }}</span>
                                        <span class="block text-xs text-gray-500">{{ number_format($row['views']) }} views · {{ number_format($row['clicks']) }} clicks · {{ $ads['views'] ? round($row['views'] / $ads['views'] * 100) : 0 }}% of views</span>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="mt-4 text-sm text-gray-600">No ad views this week.</p>
                @endif
            </section>

            {{-- 5. Recent activity --}}
            <section class="flex flex-col rounded-2xl bg-white p-5 shadow-sm ring-1 ring-gray-100" aria-labelledby="signups-heading">
                <div class="flex items-center justify-between gap-2">
                    <h2 id="signups-heading" class="font-display text-lg font-bold text-ink-900">Latest sign-ups</h2>
                    <a href="{{ route('admin.users.index') }}" class="text-sm font-bold text-brand-600 hover:underline">All users</a>
                </div>
                <ul class="scroll-list mt-3 divide-y divide-gray-100 text-sm" data-visible-rows="7">
                    @forelse ($recentUsers as $user)
                        <li>
                            <a href="{{ route('admin.users.show', $user) }}" class="flex items-center gap-3 py-2 hover:text-brand-600">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-100 text-xs font-bold uppercase text-brand-600">{{ mb_substr($user->full_name ?: $user->email, 0, 1) }}</span>
                                <span class="min-w-0 flex-1">
                                    <span class="block truncate font-semibold">{{ $user->full_name ?: 'No name yet' }}</span>
                                    <span class="block truncate text-xs text-gray-500">{{ $user->email }}</span>
                                </span>
                                <span class="shrink-0 text-xs text-gray-500">{{ $user->created_at->diffForHumans(null, true) }}</span>
                            </a>
                        </li>
                    @empty
                        <li class="py-2 text-gray-500">No learners yet.</li>
                    @endforelse
                </ul>
            </section>

            <section class="flex flex-col rounded-2xl bg-white p-5 shadow-sm ring-1 ring-gray-100" aria-labelledby="messages-heading">
                <div class="flex items-center justify-between gap-2">
                    <h2 id="messages-heading" class="font-display text-lg font-bold text-ink-900">Latest messages</h2>
                    <a href="{{ route('admin.contact-messages.index') }}" class="text-sm font-bold text-brand-600 hover:underline">All messages</a>
                </div>
                <ul class="scroll-list mt-3 divide-y divide-gray-100 text-sm" data-visible-rows="7">
                    @forelse ($recentMessages as $message)
                        <li class="py-2">
                            <div class="flex items-baseline justify-between gap-3">
                                <span class="truncate font-semibold">{{ $message->name }}</span>
                                <span class="shrink-0 text-xs text-gray-500">{{ $message->created_at->diffForHumans(null, true) }}</span>
                            </div>
                            <p class="truncate text-gray-600">{{ $message->message }}</p>
                        </li>
                    @empty
                        <li class="py-2 text-gray-500">No messages yet.</li>
                    @endforelse
                </ul>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
    <script>
        (() => {
            const labels = @json($charts['labels']);
            Chart.defaults.font.family = 'Nunito, system-ui, sans-serif';
            Chart.defaults.color = '#6b7280';

            const options = (money) => ({
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: { display: money, position: 'bottom', labels: { boxWidth: 10, usePointStyle: true } },
                    tooltip: money ? { callbacks: { label: (c) => `${c.dataset.label}: $${c.parsed.y.toFixed(2)}` } } : {},
                },
                scales: {
                    x: { grid: { display: false }, ticks: { maxTicksLimit: 8 } },
                    y: { beginAtZero: true, ticks: { precision: 0, callback: money ? (v) => '$' + v : undefined }, grid: { color: '#f3f4f6' } },
                },
            });

            const line = (id, label, data, color) => new Chart(document.getElementById(id), {
                type: 'line',
                data: { labels, datasets: [{ label, data, borderColor: color, backgroundColor: color + '22', fill: true, pointRadius: 0, borderWidth: 2 }] },
                options: options(false),
            });

            line('chart-signups', 'Sign-ups', @json($charts['signups']), '#0284c7');
            line('chart-active', 'Active learners', @json($charts['active']), '#ea580c');
            line('chart-lessons', 'Lessons', @json($charts['lessons']), '#059669');

            new Chart(document.getElementById('chart-revenue'), {
                type: 'bar',
                data: {
                    labels,
                    datasets: [
                        { label: 'Gem packs', data: @json($charts['gemRevenue']), backgroundColor: '#9e1a69', stack: 'r', borderRadius: 3 },
                        { label: 'Subscriptions', data: @json($charts['subRevenue']), backgroundColor: '#8b5cf6', stack: 'r', borderRadius: 3 },
                    ],
                },
                options: options(true),
            });

            const adCanvas = document.getElementById('chart-ads');
            if (adCanvas) {
                const products = @json($ads['byProduct']);
                const palette = ['#9e1a69', '#8b5cf6', '#0284c7', '#ea580c', '#059669', '#e878bb', '#f59e0b', '#64748b'];
                const colors = products.map((_, i) => palette[i % palette.length]);
                document.querySelectorAll('[data-ads-swatch]').forEach((el) => { el.style.background = colors[el.dataset.adsSwatch]; });
                new Chart(adCanvas, {
                    type: 'pie',
                    data: {
                        labels: products.map((p) => p.product),
                        datasets: [{ data: products.map((p) => p.views), backgroundColor: colors, borderColor: '#fff', borderWidth: 2 }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                enabled: false,
                                external: ({ chart, tooltip }) => {
                                    const tip = document.getElementById('chart-ads-tip');
                                    if (tooltip.opacity === 0 || !tooltip.dataPoints?.length) { tip.classList.add('hidden'); return; }
                                    const point = tooltip.dataPoints[0];
                                    const product = products[point.dataIndex];
                                    tip.replaceChildren();
                                    const name = document.createElement('strong');
                                    name.className = 'block font-bold';
                                    name.textContent = product.product;
                                    const line = document.createElement('span');
                                    line.textContent = `${product.views} views · ${product.clicks} clicks`;
                                    tip.append(name, line);
                                    tip.style.left = tooltip.caretX + 'px';
                                    tip.style.top = (tooltip.caretY - 8) + 'px';
                                    tip.classList.remove('hidden');
                                },
                            },
                        },
                    },
                });
            }
        })();
    </script>
@endpush
