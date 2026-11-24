{{-- Month or year picker for report pages. Expects $period (App\Support\ReportPeriod),
     $years (newest first), $route (the page's route name) and $carry (the page's other
     filters, kept when the period changes). --}}
@php
    $carry = array_filter($carry ?? [], fn ($v) => $v !== null && $v !== '');
    $periodLink = fn (array $params) => route($route, array_merge($carry, $params));
    $current = $period->params();
    $today = now($period->tz);
    // Switching a year to months lands on that year's latest month.
    $monthForMode = $period->start->year === $today->year ? $today->format('Y-m') : $period->start->format('Y').'-12';
    $monthForMode = $period->isYear() ? $monthForMode : $period->start->format('Y-m');
@endphp

<section class="card p-4 sm:p-5" aria-labelledby="period-heading">
    <div class="flex flex-wrap items-center justify-between gap-3">
        <div class="min-w-0">
            <p class="text-xs font-bold uppercase tracking-wide text-gray-500">Showing</p>
            <h2 id="period-heading" class="font-display text-xl font-bold text-ink-900">{{ $period->label() }}</h2>
        </div>
        <nav class="flex flex-wrap gap-2" aria-label="Quick dates">
            @foreach ($period->shortcuts() as $label => $params)
                @php $on = $params == $current; @endphp
                <a href="{{ $periodLink($params) }}" @if ($on) aria-current="true" @endif class="{{ $on ? 'chip-active' : 'chip' }} !px-3 !py-1.5">{{ $label }}</a>
            @endforeach
        </nav>
    </div>

    <form method="GET" action="{{ route($route) }}" class="mt-4 flex flex-wrap items-center gap-3" data-period-form>
        @foreach ($carry as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <div class="inline-flex rounded-full bg-gray-100 p-1 text-sm font-bold" role="group" aria-label="Look at one month or a whole year">
            <a href="{{ $periodLink(['period' => 'month', 'month' => $monthForMode]) }}"
               @if (! $period->isYear()) aria-current="true" @endif
               class="rounded-full px-4 py-1.5 transition {{ $period->isYear() ? 'text-gray-500 hover:text-gray-900' : 'bg-white text-brand-600 shadow' }}">Month</a>
            <a href="{{ $periodLink(['period' => 'year', 'year' => $period->start->year]) }}"
               @if ($period->isYear()) aria-current="true" @endif
               class="rounded-full px-4 py-1.5 transition {{ $period->isYear() ? 'bg-white text-brand-600 shadow' : 'text-gray-500 hover:text-gray-900' }}">Year</a>
        </div>

        <input type="hidden" name="period" value="{{ $period->mode }}">
        @if ($period->isYear())
            <div>
                <label for="period-year" class="sr-only">Year</label>
                <select id="period-year" name="year" class="field-input !w-auto !py-2 pr-8" data-period-input>
                    @foreach ($years as $year)
                        <option value="{{ $year }}" @selected($year === $period->start->year)>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
        @else
            <div>
                <label for="period-month" class="sr-only">Month</label>
                <input type="month" id="period-month" name="month" value="{{ $period->start->format('Y-m') }}" max="{{ $today->format('Y-m') }}" placeholder="{{ $today->format('Y-m') }}"
                       class="field-input !w-auto !py-2" data-period-input>
            </div>
        @endif
        <button type="submit" class="btn-secondary !py-2">Show</button>
        <p class="basis-full text-xs text-gray-500 sm:basis-auto">Days and months are Pakistan time.</p>
    </form>
</section>

@once
    @push('scripts')
        <script>
            // Picking a month or year with the mouse shows it straight away. Someone typing
            // a month uses the Show button, so a half-typed date never reloads the page.
            document.querySelectorAll('[data-period-form] [data-period-input]').forEach((input) => {
                let typing = false
                input.addEventListener('keydown', () => { typing = true })
                input.addEventListener('blur', () => { typing = false })
                input.addEventListener('change', () => { if (input.value && !typing) input.form.submit() })
            })
        </script>
    @endpush
@endonce
