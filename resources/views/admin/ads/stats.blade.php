@extends('layouts.admin')

@section('title', 'Ad views and clicks')

@php
    $rate = fn (int $views, int $clicks) => $views ? round($clicks / $views * 100, 1) : 0;
@endphp

@section('content')
    <div class="mx-auto max-w-7xl space-y-5">

        <form id="filters" method="GET" action="{{ route('admin.ads.stats') }}" class="card space-y-4 p-5">
            <fieldset>
                <input type="hidden" name="tz" id="tz" value="{{ request('tz') }}">
                <legend class="mb-2 text-xs font-bold text-gray-500">Period</legend>
                <div class="flex flex-wrap gap-2">
                    @foreach ($periods as $value => $label)
                        <label class="cursor-pointer">
                            <input type="radio" name="period" value="{{ $value }}" class="peer sr-only" @checked($period === (string) $value)>
                            <span class="{{ $period === (string) $value ? 'chip-active' : 'chip' }} peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                <div id="month-pickers" class="grid grid-cols-2 gap-3 sm:col-span-2 {{ $period === 'month' ? '' : 'hidden' }}">
                    <div>
                        <label for="month" class="mb-1 block text-xs font-bold text-gray-500">Month</label>
                        <select id="month" name="month" class="field-input">
                            @foreach (range(1, 12) as $m)
                                <option value="{{ $m }}" @selected($month === $m)>{{ \Carbon\Carbon::create(null, $m, 1)->format('F') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="year" class="mb-1 block text-xs font-bold text-gray-500">Year</label>
                        <select id="year" name="year" class="field-input">
                            @foreach ($years as $y)
                                <option value="{{ $y }}" @selected($year === $y)>{{ $y }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label for="placement" class="mb-1 block text-xs font-bold text-gray-500">Placement</label>
                    <select id="placement" name="placement" class="field-input">
                        <option value="">All placements</option>
                        @foreach ($placements as $option)
                            <option value="{{ $option->value }}" @selected($placement === $option)>{{ $option->label() }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="product" class="mb-1 block text-xs font-bold text-gray-500">Product</label>
                    <select id="product" name="product" class="field-input">
                        <option value="">All products</option>
                        @foreach ($products as $name)
                            <option value="{{ $name }}" @selected($product === $name)>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <p class="text-xs text-gray-500">{{ $rangeLabel }} &middot; {{ $hourly ? 'per hour' : 'per day' }} &middot; times in {{ $timezone }}</p>
        </form>

        <dl class="grid grid-cols-3 gap-3">
            @foreach ([
                ['Views', number_format($totals['views']), 'text-sky-600', 'Times an ad was shown'],
                ['Clicks', number_format($totals['clicks']), 'text-brand-600', 'Times an ad was tapped'],
                ['Click rate', $rate($totals['views'], $totals['clicks']).'%', 'text-violet-600', 'Clicks out of every 100 views'],
            ] as [$label, $value, $tone, $hint])
                <div class="card min-w-0 p-3 sm:p-4">
                    <dt class="text-xs font-bold text-gray-500">{{ $label }}</dt>
                    <dd class="mt-1 truncate font-display text-xl font-bold sm:text-2xl {{ $tone }}">{{ $value }}</dd>
                    <dd class="hidden text-xs text-gray-500 sm:block">{{ $hint }}</dd>
                </div>
            @endforeach
        </dl>

        <section class="card p-5" aria-labelledby="chart-heading">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <h2 id="chart-heading" class="font-display text-lg font-bold text-ink-900">{{ $hourly ? 'Views and clicks per hour' : 'Views and clicks per day' }}</h2>
                <button type="button" id="table-toggle" class="text-sm font-bold text-brand-600 hover:underline">Show as table</button>
            </div>
            <div class="relative mt-4 h-72 sm:h-80"><canvas id="chart" aria-label="Views and clicks over time" role="img"></canvas></div>
        </section>

        <div id="stats-table" class="card hidden overflow-hidden">
            <div class="relative overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="th">{{ $hourly ? 'Hour' : 'Day' }}</th>
                            <th class="th text-right">Views</th>
                            <th class="th text-right">Clicks</th>
                            <th class="th text-right">Click rate</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($series as $point)
                            <tr class="hover:bg-gray-50">
                                <td class="td whitespace-nowrap font-semibold text-ink-900">{{ $point['key'] }}</td>
                                <td class="td text-right tabular-nums">{{ number_format($point['views']) }}</td>
                                <td class="td text-right tabular-nums">{{ number_format($point['clicks']) }}</td>
                                <td class="td text-right tabular-nums text-gray-500">{{ $point['views'] ? $rate($point['views'], $point['clicks']).'%' : '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<script>
(() => {
    const form = document.getElementById('filters')
    const tz = Intl.DateTimeFormat().resolvedOptions().timeZone

    // Periods are read in the admin's own timezone, so "Today" matches their clock.
    if (tz && !new URLSearchParams(location.search).get('tz')) {
        document.getElementById('tz').value = tz
        form.submit()
        return
    }

    form.querySelectorAll('select, input[name=period]').forEach((field) => field.addEventListener('change', () => {
        document.getElementById('month-pickers').classList.toggle('hidden', form.period.value !== 'month')
        form.submit()
    }))

    document.getElementById('table-toggle').addEventListener('click', (event) => {
        const table = document.getElementById('stats-table')
        table.classList.toggle('hidden')
        event.target.textContent = table.classList.contains('hidden') ? 'Show as table' : 'Hide table'
    })

    const series = @json($series);
    const hourly = @json($hourly);

    Chart.defaults.font.family = 'Nunito, system-ui, sans-serif'
    Chart.defaults.color = '#6b7280'

    new Chart(document.getElementById('chart'), {
        type: 'line',
        data: {
            labels: series.map((point) => hourly ? point.key.slice(11) : point.key.slice(5)),
            datasets: [
                { label: 'Views', data: series.map((point) => point.views), borderColor: '#0284c7', backgroundColor: '#0284c722', fill: true, tension: 0, borderWidth: 2, pointRadius: 2 },
                { label: 'Clicks', data: series.map((point) => point.clicks), borderColor: '#9e1a69', backgroundColor: '#9e1a69', borderDash: [6, 4], tension: 0, borderWidth: 2, pointRadius: 2 },
            ],
        },
        options: {
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            scales: {
                x: { grid: { display: false }, ticks: { maxTicksLimit: 12 } },
                y: { beginAtZero: true, ticks: { precision: 0 }, grid: { color: '#f3f4f6' } },
            },
            plugins: {
                legend: { position: 'bottom', labels: { boxWidth: 10, usePointStyle: true } },
                tooltip: { callbacks: { title: (items) => series[items[0].dataIndex].key } },
            },
        },
    })
})()
</script>
@endpush
