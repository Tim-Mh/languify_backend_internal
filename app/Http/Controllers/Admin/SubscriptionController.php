<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use App\Models\UserSubscription;
use App\Support\PerPage;
use App\Support\ReportPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Every subscription row. A purchase and each renewal are separate rows, each
 * stamped with the amount charged (see StripeService), so this doubles as the
 * subscription payment history. The list, totals and charts all cover the
 * month or year picked on the page (see ReportPeriod); 'incomplete' rows never
 * paid, so they never count as money.
 */
class SubscriptionController extends Controller
{
    /** Filter chips: key => [label, statuses]. Empty statuses means all. */
    private const FILTERS = [
        'all' => ['All', []],
        'active' => ['Active', ['active', 'trialing']],
        'past_due' => ['Payment failed', ['past_due', 'unpaid']],
        'canceled' => ['Cancelled', ['canceled']],
        'expired' => ['Expired', ['expired']],
        'incomplete' => ['Not paid', ['incomplete']],
    ];

    public function index(Request $request): View
    {
        $filter = array_key_exists($request->query('status'), self::FILTERS) ? $request->query('status') : 'all';
        $plans = SubscriptionPlan::orderBy('order_number')->get()->keyBy('key');
        $plan = $plans->has($request->query('plan')) ? $request->query('plan') : null;
        $provider = in_array($request->query('provider'), ['stripe', 'apple'], true) ? $request->query('provider') : null;
        $search = trim((string) $request->query('search', ''));
        $period = ReportPeriod::fromRequest($request);
        $window = $period->utc();

        $query = UserSubscription::with('user:id,full_name,email')->whereBetween('created_at', $window)->orderByDesc('created_at')->orderByDesc('id');

        if ($statuses = self::FILTERS[$filter][1]) {
            $query->whereIn('status', $statuses);
        }
        if ($plan) {
            $query->where('plan_key', $plan);
        }
        if ($provider) {
            $query->where('provider', $provider);
        }
        if ($search !== '') {
            $query->whereHas('user', fn ($q) => $q->where(fn ($q) => $q->where('email', 'like', "%{$search}%")->orWhere('full_name', 'like', "%{$search}%")));
        }

        $live = UserSubscription::whereIn('status', ['active', 'trialing'])
            ->where(fn ($q) => $q->whereNull('current_period_end')->orWhere('current_period_end', '>', now()));

        return view('admin.subscriptions.index', [
            'subscriptions' => $query->paginate(PerPage::resolve($request))->withQueryString(),
            'filters' => collect(self::FILTERS)->map(fn ($f, $key) => [
                'label' => $f[0],
                'count' => UserSubscription::whereBetween('created_at', $window)->when($f[1], fn ($q) => $q->whereIn('status', $f[1]))->count(),
            ]),
            'filter' => $filter,
            'plans' => $plans,
            'plan' => $plan,
            'provider' => $provider,
            'search' => $search,
            'period' => $period,
            'years' => $period->years(UserSubscription::min('created_at')),
            'report' => $this->report($period, $plans),
            'summary' => [
                'active' => (clone $live)->count(),
                'cancelling' => (clone $live)->where('cancel_at_period_end', true)->count(),
                'renewingSoon' => (clone $live)->where('cancel_at_period_end', false)->whereBetween('current_period_end', [now(), now()->addDays(7)])->count(),
                'failed' => UserSubscription::whereIn('status', ['past_due', 'unpaid'])->count(),
            ],
        ]);
    }

    /** Totals and chart data for the picked period. */
    private function report(ReportPeriod $period, $plans): array
    {
        $window = $period->utc();
        [$prevFrom, $prevTo, $prevLabel] = $period->previous();
        $paid = fn () => UserSubscription::where('status', '!=', 'incomplete');

        $byPlan = $paid()->whereBetween('created_at', $window)
            ->selectRaw('plan_key, sum(amount_cents) as cents, count(*) as payments')
            ->groupBy('plan_key')->orderByDesc('cents')->get()
            ->map(fn ($row) => [
                'label' => $plans->get($row->plan_key)?->title ?? ucfirst($row->plan_key),
                'cents' => (int) $row->cents,
                'payments' => (int) $row->payments,
            ]);

        $byProvider = $paid()->whereBetween('created_at', $window)
            ->selectRaw('provider, sum(amount_cents) as cents, count(*) as payments')
            ->groupBy('provider')->get()->keyBy('provider');

        // A learner's first ever paid row: anyone whose first one falls in the period is new.
        $newSubscribers = $paid()->selectRaw('user_id, min(created_at) as first_paid')->groupBy('user_id');

        return [
            'cents' => (int) $paid()->whereBetween('created_at', $window)->sum('amount_cents'),
            'previousCents' => (int) $paid()->whereBetween('created_at', [$prevFrom, $prevTo])->sum('amount_cents'),
            'previousLabel' => $prevLabel,
            'payments' => $paid()->whereBetween('created_at', $window)->count(),
            'newSubscribers' => DB::query()->fromSub($newSubscribers, 'firsts')->whereBetween('first_paid', $window)->count(),
            'cancellations' => UserSubscription::whereBetween('canceled_at', $window)->count(),
            'labels' => $period->buckets()->values(),
            'titles' => $period->bucketTitles(),
            'perBucket' => $period->series($paid(), 'created_at', 'sum(amount_cents)')->map(fn ($cents) => $cents / 100),
            'paymentsPerBucket' => $period->series($paid(), 'created_at'),
            'byPlan' => $byPlan->values(),
            'byProvider' => collect(['stripe' => 'Stripe (web, Android)', 'apple' => 'Apple (iPhone)'])->map(fn ($label, $key) => [
                'label' => $label,
                'cents' => (int) ($byProvider[$key]->cents ?? 0),
                'payments' => (int) ($byProvider[$key]->payments ?? 0),
            ]),
        ];
    }
}
