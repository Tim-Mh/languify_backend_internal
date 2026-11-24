<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\BadgeTier;
use App\Models\GemLedgerEntry;
use App\Models\GemPurchase;
use App\Models\Lesson;
use App\Models\LessonPlay;
use App\Models\User;
use App\Models\UserActivityDay;
use App\Models\UserGameState;
use App\Models\UserSubscription;
use App\Support\GemLedger;
use App\Support\PerPage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    private const MAX_HEARTS = 5;

    /** List filters: key => label. */
    private const STATUSES = [
        'all' => 'All learners',
        'subscribers' => 'Subscribers',
        'testers' => 'Testers',
        'new' => 'New this week',
    ];

    public function index(Request $request): View
    {
        // Learners only. Admin accounts are staff rather than customers, and
        // counting them here makes "how many users do we have" wrong by the
        // size of the team. role is a non-nullable enum, so this is exact.
        $learners = fn () => User::where('role', '!=', 'admin');

        $search = trim((string) $request->query('search', ''));
        $status = array_key_exists($request->query('status'), self::STATUSES) ? $request->query('status') : 'all';

        $query = $learners()->with(['gameState', 'activeSubscription', 'familyMembership']);

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $this->applyStatus($query, $status);

        $users = $query->orderByDesc('created_at')->orderByDesc('id')->paginate(PerPage::resolve($request))->withQueryString();

        // One count per filter chip, so each chip says how many it will show.
        $counts = collect(array_keys(self::STATUSES))->mapWithKeys(function ($key) use ($learners) {
            $q = $learners();
            $this->applyStatus($q, $key);

            return [$key => $q->count()];
        });

        return view('admin.users.index', [
            'users' => $users,
            'search' => $search,
            'status' => $status,
            'statuses' => self::STATUSES,
            'counts' => $counts,
        ]);
    }

    private function applyStatus($query, string $status): void
    {
        match ($status) {
            'subscribers' => $query->whereHas('activeSubscription'),
            'testers' => $query->where('is_tester', true),
            'new' => $query->where('created_at', '>=', now()->subDays(7)),
            default => null,
        };
    }

    /**
     * Everything about one learner on one page: who they are, how they learn,
     * what they have paid, where their gems went, rewards, league, devices.
     * Read-only apart from the reward adjustment form.
     */
    public function show(User $user): View
    {
        $user->load([
            'nativeLanguage', 'learningLanguage', 'gameState', 'activeSubscription',
            'familyMembership.familyGroup.owner', 'familyGroupOwned.members.user',
            'courses.language', 'completedLanguages.language',
        ]);

        $subscriptions = UserSubscription::where('user_id', $user->id)->orderByDesc('created_at')->get();
        $gemPurchases = GemPurchase::where('user_id', $user->id)->orderByDesc('created_at')->get();
        $paidSubscriptions = $subscriptions->where('status', '!=', 'incomplete');
        $paidGems = $gemPurchases->where('status', 'completed');

        return view('admin.users.show', [
            'user' => $user,
            'lastActive' => UserActivityDay::where('user_id', $user->id)->max('activity_date'),
            'spentCents' => (int) $paidSubscriptions->sum('amount_cents') + (int) $paidGems->sum('amount_cents'),
            'calendar' => $this->activityCalendar($user),
            'dailyPlays' => $this->dailyPlays($user),
            'courses' => $this->courseProgress($user),
            'subscriptions' => $subscriptions,
            'gemPurchases' => $gemPurchases,
            'ledger' => GemLedgerEntry::where('user_id', $user->id)->orderByDesc('created_at')->orderByDesc('id')->limit(200)->get(),
            'badges' => $this->earnedBadges($user),
        ]);
    }

    /**
     * The last 13 weeks, Monday first: whether the learner practised each day
     * and how many lessons they played (replays included). Days are the
     * learner's own, the same days the streak counts.
     */
    private function activityCalendar(User $user): array
    {
        $end = Carbon::today($this->learnerTimezone($user));
        $start = $end->copy()->subWeeks(12)->startOfWeek();

        $active = UserActivityDay::where('user_id', $user->id)
            ->where('activity_date', '>=', $start->toDateString())
            ->pluck('activity_date')
            ->map(fn ($date) => Carbon::parse($date)->toDateString())
            ->flip();
        $plays = $this->playsPerDay($user, $start);

        $weeks = [];
        for ($day = $start->copy(); $day->lte($end); $day->addDay()) {
            $date = $day->toDateString();
            $weeks[$day->copy()->startOfWeek()->toDateString()][] = [
                'date' => $date,
                'active' => $active->has($date) || ($plays[$date] ?? 0) > 0,
                'lessons' => $plays[$date] ?? 0,
            ];
        }

        return [
            'weeks' => array_values($weeks),
            'activeDays' => collect($weeks)->flatten(1)->where('active', true)->count(),
            'busiest' => max(1, (int) collect($plays)->max()),
        ];
    }

    /** Lessons played on each of the last 30 days, oldest first. */
    private function dailyPlays(User $user): array
    {
        $end = Carbon::today($this->learnerTimezone($user));
        $start = $end->copy()->subDays(29);
        $plays = $this->playsPerDay($user, $start);

        $days = [];
        for ($day = $start->copy(); $day->lte($end); $day->addDay()) {
            $days[] = ['date' => $day->copy(), 'count' => $plays[$day->toDateString()] ?? 0];
        }

        return $days;
    }

    /** Lesson plays counted per learner-local date from $start on. */
    private function playsPerDay(User $user, Carbon $start): array
    {
        $tz = $this->learnerTimezone($user);

        return LessonPlay::where('user_id', $user->id)
            ->where('played_at', '>=', $start->copy()->utc())
            ->pluck('played_at')
            ->countBy(fn ($at) => $at->copy()->timezone($tz)->toDateString())
            ->all();
    }

    private function learnerTimezone(User $user): string
    {
        return in_array($user->timezone, timezone_identifiers_list(), true) ? $user->timezone : config('app.admin_timezone');
    }

    /** Each enrolled course: how far through it the learner is and where they are. */
    private function courseProgress(User $user)
    {
        return $user->courses->sortByDesc('is_active')->map(function ($course) use ($user) {
            $lessons = Lesson::query()
                ->join('units', 'units.id', '=', 'lessons.unit_id')
                ->join('chapters', 'chapters.id', '=', 'units.chapter_id')
                ->where('chapters.language_id', $course->language_id)
                ->pluck('lessons.id');

            $last = $user->lessonCompletions()->whereIn('lesson_id', $lessons)
                ->with('lesson.unit.chapter')->orderByDesc('completed_at')->first();
            $done = $user->lessonCompletions()->whereIn('lesson_id', $lessons)->distinct()->count('lesson_id');

            return [
                'language' => $course->language,
                'current' => $course->is_active,
                'done' => $done,
                'total' => $lessons->count(),
                'percent' => $lessons->count() ? (int) round($done / $lessons->count() * 100) : 0,
                'last' => $last,
            ];
        })->values();
    }

    private function earnedBadges(User $user)
    {
        $earned = $user->badges()->orderByDesc('earned_at')->get();
        $catalog = Badge::whereIn('key', $earned->pluck('badge_key'))->get()->keyBy('key');
        $tierOrder = BadgeTier::pluck('order_number', 'name')->mapWithKeys(fn ($order, $name) => [strtoupper($name) => (int) $order]);

        // Highest tier first (by the tier's position on the Badges page), newest first within a tier.
        return $earned->map(function ($badge) use ($catalog, $tierOrder) {
            $meta = $catalog[$badge->badge_key] ?? null;

            return [
                'title' => $meta->title ?? $badge->badge_key,
                'description' => $meta?->description,
                'tier' => $meta?->tier,
                'rank' => $meta ? ($tierOrder[strtoupper((string) $meta->tier)] ?? 0) : -1,
                'image' => $meta?->imageUrl(),
                'earnedAt' => $badge->earned_at,
            ];
        })->sortBy([['rank', 'desc'], [fn ($a, $b) => $b['earnedAt'] <=> $a['earnedAt']]])->values();
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'role' => ['required', Rule::in(['user', 'admin'])],
            'email_verified' => ['sometimes', 'boolean'],
            'is_tester' => ['sometimes', 'boolean'],
        ]);

        // Demoting an admin to 'user' — block it if it would remove the last
        // admin, otherwise everyone is permanently locked out of /admin (there
        // is no create-admin route to recover). Self-demotion is the most
        // common way to trip this.
        if ($user->role === 'admin' && $data['role'] !== 'admin' && $this->isLastAdmin($user)) {
            return redirect()->route('admin.users.edit', $user)
                ->with('error', "Can't remove admin from the last remaining admin account.");
        }

        $user->forceFill([
            'full_name' => $data['full_name'] ?? null,
            'email' => $data['email'],
            'role' => $data['role'],
            'email_verified_at' => $request->boolean('email_verified') ? ($user->email_verified_at ?? now()) : null,
            'is_tester' => $request->boolean('is_tester'),
        ])->save();

        return redirect()->route('admin.users.show', $user)->with('status', 'User updated.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($request->user()->id === $user->id) {
            return redirect()->route('admin.users.show', $user)
                ->with('error', "You can't delete your own account.");
        }

        if ($user->role === 'admin' && $this->isLastAdmin($user)) {
            return redirect()->route('admin.users.show', $user)
                ->with('error', "Can't delete the last remaining admin account.");
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('status', 'User deleted.');
    }

    private function isLastAdmin(User $user): bool
    {
        return $user->role === 'admin'
            && User::where('role', 'admin')->where('id', '!=', $user->id)->doesntExist();
    }

    /** Turns the tester flag on or off from the learner page, saved at once. */
    public function updateTester(Request $request, User $user): JsonResponse
    {
        $data = $request->validate(['is_tester' => ['required', 'boolean']]);

        $user->forceFill(['is_tester' => $data['is_tester']])->save();
        $name = $user->full_name ?: $user->email;

        return response()->json([
            'isTester' => $user->isTester(),
            'message' => $user->isTester() ? "{$name} is now a tester." : "{$name} is no longer a tester.",
        ]);
    }

    public function adjustGameState(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'gems_delta' => ['nullable', 'integer'],
            'hearts_delta' => ['nullable', 'integer'],
            'xp_delta' => ['nullable', 'integer'],
        ]);

        DB::transaction(function () use ($user, $data) {
            UserGameState::firstOrCreate(['user_id' => $user->id]);
            $state = UserGameState::where('user_id', $user->id)->lockForUpdate()->firstOrFail();

            GemLedger::apply($state, (int) ($data['gems_delta'] ?? 0), 'admin.adjustment');
            $state->hearts = max(0, min(self::MAX_HEARTS, $state->hearts + (int) ($data['hearts_delta'] ?? 0)));
            $state->total_xp = max(0, $state->total_xp + (int) ($data['xp_delta'] ?? 0));
            $state->save();
        });

        return redirect()->route('admin.users.show', $user)->with('status', 'Game state adjusted.');
    }
}
