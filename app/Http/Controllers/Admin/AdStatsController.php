<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdPlacement;
use App\Http\Controllers\Controller;
use App\Models\AdCampaign;
use App\Models\AdEvent;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Views and clicks over time, for one chart and two totals.
 *
 * Periods are read in the admin's own timezone (sent by the browser), so
 * "Today" matches their clock. Events are counted per hour in SQL, in the
 * app's timezone, then each hour is moved into the admin's timezone and
 * re-bucketed into local hours (one-day periods) or local days.
 */
class AdStatsController extends Controller
{
    private const PERIODS = [
        'today' => 'Today',
        'yesterday' => 'Yesterday',
        '7' => 'Last 7 days',
        '15' => 'Last 15 days',
        '30' => 'Last 30 days',
        'month' => 'Month',
    ];

    public function __invoke(Request $request): View
    {
        $timezone = $this->timezone((string) $request->query('tz'));
        $now = CarbonImmutable::now($timezone);

        $period = array_key_exists((string) $request->query('period'), self::PERIODS) ? (string) $request->query('period') : '7';
        $month = (int) $request->query('month', $now->month);
        $year = (int) $request->query('year', $now->year);
        $month = $month >= 1 && $month <= 12 ? $month : $now->month;
        $year = $year >= 2020 && $year <= $now->year + 1 ? $year : $now->year;

        [$from, $to] = match ($period) {
            'today' => [$now->startOfDay(), $now->startOfDay()],
            'yesterday' => [$now->subDay()->startOfDay(), $now->subDay()->startOfDay()],
            'month' => [
                CarbonImmutable::create($year, $month, 1, 0, 0, 0, $timezone),
                CarbonImmutable::create($year, $month, 1, 0, 0, 0, $timezone)->endOfMonth()->startOfDay(),
            ],
            default => [$now->subDays((int) $period - 1)->startOfDay(), $now->startOfDay()],
        };

        $hourly = $from->equalTo($to);

        $placement = AdPlacement::tryFrom((string) $request->query('placement'));
        $product = $this->normalize((string) $request->query('product'));

        // One entry per product name, however many placements or images it has.
        $products = AdCampaign::orderBy('product_name')->pluck('product_name')
            ->unique(fn (string $name) => $this->normalize($name))
            ->values();

        $query = AdEvent::query()
            ->where('ad_events.created_at', '>=', $from->setTimezone(config('app.timezone')))
            ->where('ad_events.created_at', '<', $to->addDay()->setTimezone(config('app.timezone')));

        if ($placement) {
            $query->where('ad_events.placement', $placement->value);
        }

        if ($product !== '') {
            // Case- and space-insensitive, across every placement.
            $campaignIds = AdCampaign::all(['id', 'product_name'])
                ->filter(fn (AdCampaign $campaign) => $this->normalize($campaign->product_name) === $product)
                ->pluck('id');

            $query->join('ads', 'ads.id', '=', 'ad_events.ad_id')->whereIn('ads.ad_campaign_id', $campaignIds);
        }

        $hourExpression = DB::connection()->getDriverName() === 'sqlite'
            ? "strftime('%Y-%m-%d %H:00:00', ad_events.created_at)"
            : "DATE_FORMAT(ad_events.created_at, '%Y-%m-%d %H:00:00')";

        $rows = $query
            ->selectRaw("{$hourExpression} as hour, ad_events.type, COUNT(*) as total")
            ->groupBy('hour', 'ad_events.type')
            ->get();

        // Every hour or day present, zeros included, so the chart has no gaps.
        $series = [];
        $cursor = $from;
        $end = $to->addDay();

        while ($cursor->lessThan($end)) {
            $key = $hourly ? $cursor->format('Y-m-d H:00') : $cursor->format('Y-m-d');
            $series[$key] = ['key' => $key, 'views' => 0, 'clicks' => 0];
            $cursor = $hourly ? $cursor->addHour() : $cursor->addDay();
        }

        foreach ($rows as $row) {
            $local = CarbonImmutable::parse($row->hour, config('app.timezone'))->setTimezone($timezone);
            $key = $hourly ? $local->format('Y-m-d H:00') : $local->format('Y-m-d');

            if (isset($series[$key])) {
                $series[$key][$row->type === AdEvent::CLICK ? 'clicks' : 'views'] += (int) $row->total;
            }
        }

        $series = array_values($series);

        return view('admin.ads.stats', [
            'periods' => self::PERIODS,
            'period' => $period,
            'month' => $month,
            'year' => $year,
            'years' => range($now->year, 2026),
            'placements' => AdPlacement::cases(),
            'placement' => $placement,
            'products' => $products,
            'product' => (string) $request->query('product'),
            'timezone' => $timezone,
            'hourly' => $hourly,
            'series' => $series,
            'totals' => [
                'views' => array_sum(array_column($series, 'views')),
                'clicks' => array_sum(array_column($series, 'clicks')),
            ],
            'rangeLabel' => $hourly
                ? $from->format('l j F Y')
                : $from->format('j M Y').' to '.$to->format('j M Y'),
        ]);
    }

    private function timezone(string $requested): string
    {
        return in_array($requested, timezone_identifiers_list(), true) ? $requested : config('app.timezone');
    }

    private function normalize(string $name): string
    {
        return mb_strtolower(preg_replace('/\s+/u', '', $name) ?? '');
    }
}
