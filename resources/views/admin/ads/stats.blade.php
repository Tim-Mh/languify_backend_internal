@extends('layouts.admin')

@section('title', 'Ad Stats')

@section('content')
    <a href="{{ route('admin.ads.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Back to ads</a>

    <form id="filters" method="GET" action="{{ route('admin.ads.stats') }}" class="bg-white rounded-lg shadow p-4 mt-4 flex flex-wrap items-end gap-4">
        <input type="hidden" name="tz" id="tz" value="{{ request('tz') }}">

        <div>
            <label for="period" class="block text-xs text-gray-500 mb-1">Period</label>
            <select id="period" name="period" class="border rounded px-3 py-2">
                @foreach ($periods as $value => $label)
                    <option value="{{ $value }}" @selected($period === (string) $value)>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <div id="month-pickers" class="flex gap-2 {{ $period === 'month' ? '' : 'hidden' }}">
            <div>
                <label for="month" class="block text-xs text-gray-500 mb-1">Month</label>
                <select id="month" name="month" class="border rounded px-3 py-2">
                    @foreach (range(1, 12) as $m)
                        <option value="{{ $m }}" @selected($month === $m)>{{ \Carbon\Carbon::create(null, $m, 1)->format('F') }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="year" class="block text-xs text-gray-500 mb-1">Year</label>
                <select id="year" name="year" class="border rounded px-3 py-2">
                    @foreach ($years as $y)
                        <option value="{{ $y }}" @selected($year === $y)>{{ $y }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label for="placement" class="block text-xs text-gray-500 mb-1">Placement</label>
            <select id="placement" name="placement" class="border rounded px-3 py-2">
                <option value="">All placements</option>
                @foreach ($placements as $option)
                    <option value="{{ $option->value }}" @selected($placement === $option)>{{ $option->label() }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="product" class="block text-xs text-gray-500 mb-1">Ad</label>
            <select id="product" name="product" class="border rounded px-3 py-2">
                <option value="">All ads</option>
                @foreach ($products as $name)
                    <option value="{{ $name }}" @selected($product === $name)>{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <p class="text-sm text-gray-500 mt-4">{{ $rangeLabel }} &middot; {{ $hourly ? 'per hour' : 'per day' }} &middot; times in {{ $timezone }}</p>

    <div class="grid grid-cols-2 gap-4 mt-3 max-w-md">
        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-sm text-gray-500">Views</p>
            <p class="text-2xl font-semibold" style="color:#3987e5">{{ number_format($totals['views']) }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-sm text-gray-500">Clicks</p>
            <p class="text-2xl font-semibold" style="color:#d95926">{{ number_format($totals['clicks']) }}</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-4 mt-4">
        <div class="h-80"><canvas id="chart" aria-label="Views and clicks over time" role="img"></canvas></div>
        <button type="button" id="table-toggle" class="mt-3 text-sm text-blue-600 hover:underline">Show as table</button>
        <table id="stats-table" class="hidden w-full text-left text-sm mt-3">
            <thead class="bg-gray-50 text-gray-500">
                <tr><th class="px-3 py-2">{{ $hourly ? 'Hour' : 'Day' }}</th><th class="px-3 py-2">Views</th><th class="px-3 py-2">Clicks</th></tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($series as $point)
                    <tr><td class="px-3 py-1.5">{{ $point['key'] }}</td><td class="px-3 py-1.5">{{ $point['views'] }}</td><td class="px-3 py-1.5">{{ $point['clicks'] }}</td></tr>
                @endforeach
            </tbody>
        </table>
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

    form.querySelectorAll('select').forEach((select) => select.addEventListener('change', () => {
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

    new Chart(document.getElementById('chart'), {
        type: 'line',
        data: {
            labels: series.map((point) => hourly ? point.key.slice(11) : point.key.slice(5)),
            datasets: [
                { label: 'Views', data: series.map((point) => point.views), borderColor: '#3987e5', backgroundColor: '#3987e5', pointRadius: 2 },
                { label: 'Clicks', data: series.map((point) => point.clicks), borderColor: '#d95926', backgroundColor: '#d95926', borderDash: [6, 4], pointRadius: 2 },
            ],
        },
        options: {
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } },
            plugins: { tooltip: { callbacks: { title: (items) => series[items[0].dataIndex].key } } },
        },
    })
})()
</script>
@endpush
