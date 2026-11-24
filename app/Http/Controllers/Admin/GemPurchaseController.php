<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GemPack;
use App\Models\GemPurchase;
use App\Support\PerPage;
use App\Support\ReportPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * Every gem pack bought with real money. A Stripe row is written as
 * `pending` the moment checkout opens and turns `completed` once payment is
 * confirmed; an Apple row is only written after Apple confirms, so it is
 * always `completed`. The list, totals and charts all cover the month or year
 * picked on the page (see ReportPeriod); only `completed` rows count as money,
 * the same as the dashboard.
 */
class GemPurchaseController extends Controller
{
    private const STATUSES = ['completed', 'pending'];

    public function index(Request $request): View
    {
        $status = in_array($request->query('status'), self::STATUSES, true) ? $request->query('status') : null;
        $provider = in_array($request->query('provider'), ['stripe', 'apple'], true) ? $request->query('provider') : null;
        $search = trim((string) $request->query('search', ''));
        $packs = GemPack::orderBy('order_number')->pluck('title', 'key');
        // Not limited to current packs: a deleted pack's purchases are still on record.
        $pack = is_string($request->query('pack')) && $request->query('pack') !== '' ? $request->query('pack') : null;
        $period = ReportPeriod::fromRequest($request);
        $window = $period->utc();

        $query = GemPurchase::with('user:id,full_name,email')->whereBetween('created_at', $window)->orderByDesc('created_at')->orderByDesc('id');

        if ($status) {
            $query->where('status', $status);
        }
        if ($provider) {
            $query->where('provider', $provider);
        }
        if ($pack) {
            $query->where('pack_key', $pack);
        }
        if ($search !== '') {
            $query->whereHas('user', fn ($q) => $q->where(fn ($q) => $q->where('email', 'like', "%{$search}%")->orWhere('full_name', 'like', "%{$search}%")));
        }

        $inPeriod = fn () => GemPurchase::whereBetween('created_at', $window);

        return view('admin.gem-purchases.index', [
            'purchases' => $query->paginate(PerPage::resolve($request))->withQueryString(),
            'packs' => $packs,
            'pack' => $pack,
            'status' => $status,
            'provider' => $provider,
            'search' => $search,
            'period' => $period,
            'years' => $period->years(GemPurchase::min('created_at')),
            'counts' => [
                'all' => $inPeriod()->count(),
                'completed' => $inPeriod()->where('status', 'completed')->count(),
                'pending' => $inPeriod()->where('status', 'pending')->count(),
            ],
            'report' => $this->report($period, $packs),
        ]);
    }

    /** Totals and chart data for the picked period. */
    private function report(ReportPeriod $period, Collection $packs): array
    {
        $window = $period->utc();
        [$prevFrom, $prevTo, $prevLabel] = $period->previous();
        $paid = fn () => GemPurchase::where('status', 'completed');

        $byPack = $paid()->whereBetween('created_at', $window)
            ->selectRaw('pack_key, sum(amount_cents) as cents, count(*) as payments')
            ->groupBy('pack_key')->orderByDesc('cents')->get()
            ->map(fn ($row) => [
                'label' => $packs[$row->pack_key] ?? ucfirst($row->pack_key),
                'cents' => (int) $row->cents,
                'payments' => (int) $row->payments,
            ]);

        $byProvider = $paid()->whereBetween('created_at', $window)
            ->selectRaw('provider, sum(amount_cents) as cents, count(*) as payments')
            ->groupBy('provider')->get()->keyBy('provider');

        return [
            'cents' => (int) $paid()->whereBetween('created_at', $window)->sum('amount_cents'),
            'previousCents' => (int) $paid()->whereBetween('created_at', [$prevFrom, $prevTo])->sum('amount_cents'),
            'previousLabel' => $prevLabel,
            'purchases' => $paid()->whereBetween('created_at', $window)->count(),
            'gems' => (int) $paid()->whereBetween('created_at', $window)->sum('gems_credited'),
            'buyers' => $paid()->whereBetween('created_at', $window)->distinct()->count('user_id'),
            'labels' => $period->buckets()->values(),
            'titles' => $period->bucketTitles(),
            'perBucket' => $period->series($paid(), 'created_at', 'sum(amount_cents)')->map(fn ($cents) => $cents / 100),
            'purchasesPerBucket' => $period->series($paid(), 'created_at'),
            'byPack' => $byPack->values(),
            'byProvider' => collect(['stripe' => 'Stripe (web, Android)', 'apple' => 'Apple (iPhone)'])->map(fn ($label, $key) => [
                'label' => $label,
                'cents' => (int) ($byProvider[$key]->cents ?? 0),
                'payments' => (int) ($byProvider[$key]->payments ?? 0),
            ]),
        ];
    }
}
