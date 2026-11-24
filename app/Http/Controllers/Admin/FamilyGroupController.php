<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FamilyGroup;
use App\Models\FamilyInvite;
use App\Models\FamilyMember;
use App\Models\UserSubscription;
use App\Services\FamilyService;
use App\Support\PerPage;
use App\Support\ReportPeriod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Family plan groups. The owner pays; members ride on the owner's plan for
 * free and never get a subscription row of their own (see FamilyService), so
 * a group is only "live" while the owner's own family plan is.
 *
 * The totals and charts at the top cover the month or year picked on the page
 * (see ReportPeriod); the group cards below always show every group as it is now.
 */
class FamilyGroupController extends Controller
{
    public function index(Request $request): View
    {
        $filter = in_array($request->query('status'), ['active', 'inactive'], true) ? $request->query('status') : 'all';
        $search = trim((string) $request->query('search', ''));

        $query = FamilyGroup::with(['owner.activeSubscription', 'members.user', 'pendingInvites'])->latest();

        if ($filter !== 'all') {
            $filter === 'active' ? $query->where($this->live(...)) : $query->whereNot($this->live(...));
        }

        if ($search !== '') {
            $like = "%{$search}%";
            $query->where(fn ($q) => $q
                ->whereHas('owner', fn ($q) => $q->where(fn ($q) => $q->where('email', 'like', $like)->orWhere('full_name', 'like', $like)))
                ->orWhereHas('members.user', fn ($q) => $q->where(fn ($q) => $q->where('email', 'like', $like)->orWhere('full_name', 'like', $like)))
                ->orWhereHas('pendingInvites', fn ($q) => $q->where('email', 'like', $like)));
        }

        $liveCount = FamilyGroup::where($this->live(...))->count();
        $period = ReportPeriod::fromRequest($request);

        return view('admin.family-groups.index', [
            'familyGroups' => $query->paginate(PerPage::resolve($request))->withQueryString(),
            'filter' => $filter,
            'search' => $search,
            'seats' => FamilyService::MAX_MEMBERS + 1,
            'counts' => [
                'all' => FamilyGroup::count(),
                'active' => $liveCount,
                'inactive' => FamilyGroup::count() - $liveCount,
            ],
            'period' => $period,
            'years' => $period->years(collect([UserSubscription::where('plan_key', 'family')->min('created_at'), FamilyGroup::min('created_at')])->filter()->min()),
            'report' => $this->report($period),
            'summary' => [
                'members' => FamilyMember::count(),
                'pending' => FamilyInvite::where('status', 'pending')->where('expires_at', '>', now())->count(),
            ],
        ]);
    }

    /** Totals and chart data for the picked period. */
    private function report(ReportPeriod $period): array
    {
        $window = $period->utc();
        [$prevFrom, $prevTo, $prevLabel] = $period->previous();
        // Paid family plan rows: each purchase and renewal is its own row, 'incomplete' never paid.
        $paid = fn () => UserSubscription::where('plan_key', 'family')->where('status', '!=', 'incomplete');

        return [
            'cents' => (int) $paid()->whereBetween('created_at', $window)->sum('amount_cents'),
            'previousCents' => (int) $paid()->whereBetween('created_at', [$prevFrom, $prevTo])->sum('amount_cents'),
            'previousLabel' => $prevLabel,
            'payments' => $paid()->whereBetween('created_at', $window)->count(),
            'groups' => FamilyGroup::whereBetween('created_at', $window)->count(),
            'joined' => FamilyMember::whereBetween('joined_at', $window)->count(),
            'invitesSent' => FamilyInvite::whereBetween('created_at', $window)->count(),
            'invitesAccepted' => FamilyInvite::whereBetween('accepted_at', $window)->count(),
            'labels' => $period->buckets()->values(),
            'titles' => $period->bucketTitles(),
            'moneyPerBucket' => $period->series($paid(), 'created_at', 'sum(amount_cents)')->map(fn ($cents) => $cents / 100),
            'paymentsPerBucket' => $period->series($paid(), 'created_at'),
            'joinedPerBucket' => $period->series(FamilyMember::query(), 'joined_at'),
        ];
    }

    /** The owner's own plan is a current family plan. */
    private function live(Builder $query): void
    {
        $query->whereHas('owner.activeSubscription', fn ($q) => $q->where('plan_key', 'family'));
    }
}
