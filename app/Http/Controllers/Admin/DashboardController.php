<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdEvent;
use App\Models\ContactMessage;
use App\Models\GemPurchase;
use App\Models\LessonPlay;
use App\Models\User;
use App\Models\UserActivityDay;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * The admin home: what happened today and how the app is trending over the
 * chosen range. Everything is read from records the app already keeps.
 *
 * Days are counted in the admin timezone (config app.admin_timezone, Pakistan
 * by default) while the database stays in UTC, so every day boundary is
 * converted to UTC before it reaches a query. Learner activity is the
 * exception: it is stored as the learner's own calendar date.
 */
class DashboardController extends Controller
{
    private const RANGES = [7, 30, 90];

    private string $tz;

    public function index(Request $request): View
    {
        $this->tz = config('app.admin_timezone');
        $range = in_array((int) $request->query('range'), self::RANGES, true) ? (int) $request->query('range') : 30;

        $today = Carbon::today($this->tz);
        $yesterday = $today->copy()->subDay();
        $monthStart = $today->copy()->startOfMonth();
        // Last month up to the same day, so a half-finished month is compared
        // with the same stretch of the one before rather than all of it.
        $lastMonthStart = $monthStart->copy()->subMonthNoOverflow();
        $lastMonthSameDay = $lastMonthStart->copy()->addDays($today->day)->min($monthStart);

        return view('admin.dashboard', [
            'range' => $range,
            'ranges' => self::RANGES,
            'now' => Carbon::now($this->tz),
            'today' => $this->todayCards($today, $yesterday, $monthStart, $lastMonthStart, $lastMonthSameDay),
            'charts' => $this->charts($range, $today),
            'money' => $this->money($monthStart),
            'ads' => $this->ads($today),
            'recentUsers' => User::where('role', '!=', 'admin')->latest()->limit(30)->get(['id', 'full_name', 'email', 'created_at']),
            'recentMessages' => ContactMessage::latest()->limit(30)->get(['id', 'name', 'email', 'message', 'created_at']),
        ]);
    }

    private function todayCards(Carbon $today, Carbon $yesterday, Carbon $monthStart, Carbon $lastMonthStart, Carbon $lastMonthSameDay): array
    {
        $signups = fn (Carbon $from, Carbon $to) => $this->learners()->whereBetween('created_at', $this->utc($from, $to))->count();
        $active = fn (Carbon $day) => UserActivityDay::whereDate('activity_date', $day->toDateString())->distinct()->count('user_id');
        $lessons = fn (Carbon $from, Carbon $to) => LessonPlay::whereBetween('played_at', $this->utc($from, $to))->count();

        $endOfToday = $today->copy()->endOfDay();
        $endOfYesterday = $yesterday->copy()->endOfDay();

        return [
            'signups' => [$signups($today, $endOfToday), $signups($yesterday, $endOfYesterday)],
            'active' => [$active($today), $active($yesterday)],
            'lessons' => [$lessons($today, $endOfToday), $lessons($yesterday, $endOfYesterday)],
            'revenueToday' => [$this->revenueBetween($today, $endOfToday), $this->revenueBetween($yesterday, $endOfYesterday)],
            'revenueMonth' => [$this->revenueBetween($monthStart, $endOfToday), $this->revenueBetween($lastMonthStart, $lastMonthSameDay)],
            'subscribers' => $this->activeSubscriptions()->count(),
            'totalLearners' => $this->learners()->count(),
        ];
    }

    /** One value per day for each chart, zeros filled in, oldest first. */
    private function charts(int $range, Carbon $today): array
    {
        $from = $today->copy()->subDays($range - 1);
        $days = collect(range(0, $range - 1))->map(fn ($i) => $from->copy()->addDays($i)->toDateString());

        $perDay = fn ($query, string $column, string $aggregate = 'count(*)') => $query
            ->where($column, '>=', $from->copy()->utc())
            ->selectRaw($this->localDay($column)." as day, $aggregate as total")
            ->groupBy('day')
            ->pluck('total', 'day');

        $fill = fn (Collection $values) => $days->map(fn ($day) => (float) ($values[$day] ?? 0))->values();

        $gemCents = $perDay(GemPurchase::where('status', 'completed'), 'created_at', 'sum(amount_cents)');
        $subCents = $perDay(UserSubscription::where('status', '!=', 'incomplete'), 'created_at', 'sum(amount_cents)');

        return [
            'labels' => $days->map(fn ($day) => Carbon::parse($day)->format('M j'))->values(),
            'signups' => $fill($perDay($this->learners(), 'created_at')),
            'active' => $fill(
                UserActivityDay::where('activity_date', '>=', $from->toDateString())
                    ->selectRaw('date(activity_date) as day, count(distinct user_id) as total')
                    ->groupBy('day')
                    ->pluck('total', 'day')
            ),
            'lessons' => $fill($perDay(LessonPlay::query(), 'played_at')),
            'gemRevenue' => $fill($gemCents)->map(fn ($cents) => $cents / 100),
            'subRevenue' => $fill($subCents)->map(fn ($cents) => $cents / 100),
        ];
    }

    private function money(Carbon $monthStart): array
    {
        $gemTotal = (int) GemPurchase::where('status', 'completed')->sum('amount_cents');
        $subsByPlan = UserSubscription::where('status', '!=', 'incomplete')
            ->selectRaw('plan_key, sum(amount_cents) as total')
            ->groupBy('plan_key')
            ->pluck('total', 'plan_key');

        $activeByPlan = $this->activeSubscriptions()
            ->selectRaw('plan_key, count(*) as total')
            ->groupBy('plan_key')
            ->pluck('total', 'plan_key');

        // Every paid purchase and renewal of the last 7 days, newest first.
        $weekAgo = now()->subDays(7);
        $purchases = GemPurchase::with('user:id,full_name,email')->where('status', 'completed')->where('created_at', '>=', $weekAgo)->latest()->get()
            ->map(fn ($p) => ['who' => $p->user, 'what' => ucfirst($p->pack_key).' gems', 'cents' => $p->amount_cents, 'at' => $p->created_at])
            ->concat(
                UserSubscription::with('user:id,full_name,email')->where('status', '!=', 'incomplete')->where('created_at', '>=', $weekAgo)->latest()->get()
                    ->map(fn ($s) => ['who' => $s->user, 'what' => ucfirst($s->plan_key).' plan', 'cents' => (int) $s->amount_cents, 'at' => $s->created_at])
            )
            ->sortByDesc('at')
            ->values();

        return [
            'split' => collect(['Gem packs' => $gemTotal])
                ->merge($subsByPlan->mapWithKeys(fn ($cents, $plan) => [ucfirst($plan).' plan' => (int) $cents]))
                ->filter(),
            'activeByPlan' => $activeByPlan,
            'cancellations' => UserSubscription::where('canceled_at', '>=', $monthStart->copy()->utc())->count(),
            'purchases' => $purchases,
        ];
    }

    private function ads(Carbon $today): array
    {
        $from = $today->copy()->subDays(6)->utc();

        $counts = AdEvent::where('created_at', '>=', $from)
            ->selectRaw('type, count(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type');

        // Views and clicks per product, for the pie chart and its legend.
        $byProduct = AdEvent::query()
            ->join('ads', 'ads.id', '=', 'ad_events.ad_id')
            ->join('ad_campaigns', 'ad_campaigns.id', '=', 'ads.ad_campaign_id')
            ->where('ad_events.created_at', '>=', $from)
            ->groupBy('ad_campaigns.product_name')
            ->selectRaw('ad_campaigns.product_name as product, sum(ad_events.type = ?) as views, sum(ad_events.type = ?) as clicks', [AdEvent::VIEW, AdEvent::CLICK])
            ->orderByDesc('views')
            ->get()
            ->map(fn ($row) => ['product' => $row->product, 'views' => (int) $row->views, 'clicks' => (int) $row->clicks]);

        $views = (int) ($counts[AdEvent::VIEW] ?? 0);
        $clicks = (int) ($counts[AdEvent::CLICK] ?? 0);

        return [
            'views' => $views,
            'clicks' => $clicks,
            'rate' => $views > 0 ? round($clicks / $views * 100, 1) : 0,
            'byProduct' => $byProduct,
        ];
    }

    /** Everyone but staff: admins never count as learners. */
    private function learners()
    {
        return User::where('role', '!=', 'admin');
    }

    /** Paying right now, with the manual-renewal expiry gate applied. */
    private function activeSubscriptions()
    {
        return UserSubscription::whereIn('status', ['active', 'trialing'])
            ->where(fn ($q) => $q->whereNull('current_period_end')->orWhere('current_period_end', '>', now()));
    }

    /**
     * Money taken in a window, in cents. Each subscription purchase and each
     * renewal is its own row stamped with the amount charged (see
     * StripeService); 'incomplete' rows never paid.
     */
    private function revenueBetween(Carbon $from, Carbon $to): int
    {
        $window = $this->utc($from, $to);

        return (int) GemPurchase::where('status', 'completed')->whereBetween('created_at', $window)->sum('amount_cents')
            + (int) UserSubscription::where('status', '!=', 'incomplete')->whereBetween('created_at', $window)->sum('amount_cents');
    }

    /** An admin-timezone window as the UTC range the database stores. */
    private function utc(Carbon $from, Carbon $to): array
    {
        return [$from->copy()->utc(), $to->copy()->utc()];
    }

    /** SQL for the admin-timezone calendar date of a UTC timestamp column. */
    private function localDay(string $column): string
    {
        $offset = Carbon::now($this->tz)->getOffset();

        return DB::connection()->getDriverName() === 'sqlite'
            ? "date($column, '".sprintf('%+d', $offset)." seconds')"
            : "date(date_add($column, interval $offset second))";
    }
}
