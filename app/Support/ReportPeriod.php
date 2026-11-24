<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * The month or year an admin report page is looking at, picked with
 * ?period=month&month=2026-10 or ?period=year&year=2026 (default: this month).
 *
 * Months and days are counted in the admin timezone (config
 * app.admin_timezone) while the database stays in UTC, so every boundary is
 * converted to UTC before it reaches a query, the same way the dashboard does.
 */
class ReportPeriod
{
    public readonly string $tz;

    public readonly string $mode;

    /** First and last moment of the period, in the admin timezone. */
    public readonly Carbon $start;

    public readonly Carbon $end;

    private function __construct(string $mode, Carbon $start)
    {
        $this->tz = $start->getTimezone()->getName();
        $this->mode = $mode;
        $this->start = $start->copy();
        $this->end = $mode === 'year' ? $start->copy()->endOfYear() : $start->copy()->endOfMonth();
    }

    public static function fromRequest(Request $request): self
    {
        $tz = config('app.admin_timezone');
        $now = Carbon::now($tz);

        if ($request->query('period') === 'year') {
            $year = (int) $request->query('year', $now->year);
            $year = $year >= 2000 && $year <= $now->year ? $year : $now->year;

            return new self('year', Carbon::create($year, 1, 1, 0, 0, 0, $tz));
        }

        $month = (string) $request->query('month', '');
        $start = preg_match('/^(\d{4})-(0[1-9]|1[0-2])$/', $month, $m)
            ? Carbon::create((int) $m[1], (int) $m[2], 1, 0, 0, 0, $tz)
            : $now->copy()->startOfMonth();

        // Nothing has happened in a future month yet, and years before 2000 are typos.
        if ($start->greaterThan($now) || $start->year < 2000) {
            $start = $now->copy()->startOfMonth();
        }

        return new self('month', $start);
    }

    public function isYear(): bool
    {
        return $this->mode === 'year';
    }

    /** "November 2026" or "2026". */
    public function label(): string
    {
        return $this->isYear() ? (string) $this->start->year : $this->start->format('F Y');
    }

    /** The query-string parameters that select this period. */
    public function params(): array
    {
        return $this->isYear()
            ? ['period' => 'year', 'year' => $this->start->year]
            : ['period' => 'month', 'month' => $this->start->format('Y-m')];
    }

    /** Does the period include today? Then it is not finished yet. */
    public function isCurrent(): bool
    {
        return Carbon::now($this->tz)->between($this->start, $this->end);
    }

    /** The period as the UTC range the database stores. */
    public function utc(): array
    {
        return [$this->start->copy()->utc(), $this->end->copy()->utc()];
    }

    /**
     * The window to compare against, as [from, to, label], already in UTC.
     * A period still in progress is compared with the same stretch of the one
     * before, so half a month is never measured against a whole one.
     */
    public function previous(): array
    {
        $from = $this->isYear() ? $this->start->copy()->subYear() : $this->start->copy()->subMonthNoOverflow();
        $to = $this->isYear() ? $from->copy()->endOfYear() : $from->copy()->endOfMonth();
        $label = $this->isYear() ? (string) $from->year : $from->format('F Y');

        if ($this->isCurrent()) {
            $elapsed = $this->start->diffInSeconds(Carbon::now($this->tz));
            $to = $from->copy()->addSeconds((int) $elapsed)->min($to);
            $label = $this->isYear()
                ? $from->format('M j').' to '.$to->format('M j, Y')
                : $from->format('M j').' to '.$to->format('j');
        }

        return [$from->copy()->utc(), $to->copy()->utc(), $label];
    }

    /** Quick choices: label => query parameters. */
    public function shortcuts(): array
    {
        $now = Carbon::now($this->tz);

        return [
            'This month' => ['period' => 'month', 'month' => $now->format('Y-m')],
            'Last month' => ['period' => 'month', 'month' => $now->copy()->startOfMonth()->subMonth()->format('Y-m')],
            'This year' => ['period' => 'year', 'year' => $now->year],
            'Last year' => ['period' => 'year', 'year' => $now->year - 1],
        ];
    }

    /** Chart slots: bucket key => axis label (every day of a month, or every month of a year). */
    public function buckets(): Collection
    {
        if ($this->isYear()) {
            return collect(range(1, 12))->mapWithKeys(function ($m) {
                $month = $this->start->copy()->month($m);

                return [$month->format('Y-m') => $month->format('M')];
            });
        }

        return collect(range(1, $this->start->daysInMonth))->mapWithKeys(function ($d) {
            $day = $this->start->copy()->day($d);

            return [$day->format('Y-m-d') => $day->format('M j')];
        });
    }

    /** Longer names for the same slots, for chart tooltips: "Mon, Nov 2, 2026" or "November 2026". */
    public function bucketTitles(): Collection
    {
        return $this->buckets()->keys()->map(fn ($key) => $this->isYear()
            ? Carbon::createFromFormat('Y-m-d', $key.'-01', $this->tz)->format('F Y')
            : Carbon::createFromFormat('Y-m-d', $key, $this->tz)->format('D, M j, Y'))->values();
    }

    /**
     * One total per bucket for a query, zeros filled in, oldest first.
     * $aggregate is trusted SQL such as 'count(*)' or 'sum(amount_cents)'.
     */
    public function series(Builder $query, string $column, string $aggregate = 'count(*)'): Collection
    {
        $totals = $query
            ->whereBetween($column, $this->utc())
            ->selectRaw($this->bucketSql($column)." as bucket, $aggregate as total")
            ->groupBy('bucket')
            ->pluck('total', 'bucket');

        return $this->buckets()->keys()->map(fn ($key) => (float) ($totals[$key] ?? 0))->values();
    }

    /** SQL for the admin-timezone day (Y-m-d) or month (Y-m) of a UTC timestamp column. */
    private function bucketSql(string $column): string
    {
        $offset = Carbon::now($this->tz)->getOffset();
        $format = $this->isYear() ? '%Y-%m' : '%Y-%m-%d';

        if (DB::connection()->getDriverName() === 'sqlite') {
            return "strftime('$format', $column, '".sprintf('%+d', $offset)." seconds')";
        }

        return "date_format(date_add($column, interval $offset second), '$format')";
    }

    /** Years to offer in the picker: the first year on record up to now. */
    public function years(?string $firstUtc): array
    {
        $now = Carbon::now($this->tz)->year;
        $first = $firstUtc ? Carbon::parse($firstUtc, 'UTC')->tz($this->tz)->year : $now;

        return range($now, min($first, $this->start->year, $now));
    }
}
