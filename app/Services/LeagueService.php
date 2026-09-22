<?php

namespace App\Services;

use App\Models\LeagueTier;
use App\Models\User;
use App\Models\UserGameState;
use App\Models\UserLeague;
use App\Notifications\LeagueResultNotification;
use App\Support\GemLedger;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Weekly league cohorts. Unlike every other periodic mechanic in this app
 * (daily XP, streak, daily quests — all lazy, per-user-timezone resets, see
 * LessonProgressService), a league cohort of ~30 different users must reset
 * at the SAME instant for everyone in it, regardless of their individual
 * timezones — so this is driven by a fixed global instant (Monday 00:00 UTC)
 * and a scheduled command (RolloverLeagues), not a lazy per-request check.
 *
 * Membership is EARNED, not automatic: you join the week's league the first
 * time you earn XP (ensureEnrolled, called from the lesson/quest paths) —
 * merely opening the leaderboard never enrols you. And at each rollover any
 * member who earned 0 XP that week is dropped from the league entirely (they
 * rejoin fresh the next time they play), so cohorts stay full of real
 * competitors instead of idle accounts handing out free promotions.
 *
 * Promotion/demotion is a persistent points threshold, not a rank cutoff:
 * every week, every ACTIVE member of a cohort (the inactive ones having just
 * been dropped) gets a points delta based on their rank that week (best rank
 * earns the most, worst rank loses the most, scaled linearly by distance from
 * the cohort's middle rank). Hitting 100 points promotes a tier; going
 * negative demotes a tier. The balance resets to 0 on any tier change, and
 * clamps (rather than resetting) at the very top/bottom tier, since there's
 * nowhere further to move.
 */
class LeagueService
{
    public const COHORT_SIZE = 30;

    public const POINTS_PER_RANK_STEP = 2;

    public const PROMOTION_THRESHOLD = 100;

    /**
     * Paid to anyone who finishes a week having GAINED league points,
     * which is the top half of the cohort.
     *
     * Deliberately flat rather than scaled by rank: the point is to pay
     * for turning up and competing, and a sliding scale would hand the
     * same learner a different answer each week for the same effort.
     * Losing points pays nothing -- not a penalty, just no reward.
     *
     * Separate from, and on top of, the per-tier promotion reward.
     */
    public const WEEKLY_REWARD_GEMS = 10;

    public function currentWeekStart(): Carbon
    {
        return Carbon::now('UTC')->startOfWeek(Carbon::MONDAY);
    }

    /**
     * The points delta a member at $rank (1 = best) earns/loses this week,
     * out of a cohort of $cohortSize. Linear, symmetric around the cohort's
     * middle rank — rank 1 always earns the most, the last rank always
     * loses the most, scaling with cohort size. Shared by the live preview
     * in LeagueController::show() and the actual rollover, so what a user
     * sees mid-week always matches what they'll actually get.
     */
    public function pointsDeltaForRank(int $rank, int $cohortSize): int
    {
        if ($cohortSize <= 0) {
            return 0;
        }

        $midpoint = ($cohortSize + 1) / 2;

        return (int) round(($midpoint - $rank) * self::POINTS_PER_RANK_STEP);
    }

    /**
     * Read-only lookup of a user's current league membership — never creates
     * one. Used by the leaderboard screen: viewing the board must NOT enrol
     * you (that's what earning XP does, see ensureEnrolled). Returns null for
     * anyone who hasn't earned XP yet this week / isn't a member.
     */
    public function currentLeagueFor(User $user): ?UserLeague
    {
        return UserLeague::where('user_id', $user->id)->first();
    }

    /**
     * Enrols a user into the current week's league the first time they earn
     * XP — the ONLY way in. Called from the XP-earning paths (finishing a
     * lesson, claiming a quest), never from merely viewing the leaderboard,
     * so a user who never does a lesson never joins. No-op (returns the
     * existing row) once they're already a member.
     *
     * A brand-new joiner is appended to their tier's current highest-numbered
     * cohort for the week rather than starting a new one — this self-heals at
     * the next Monday rollover's re-bucket step, so it's fine even if it
     * temporarily pushes a cohort past 30.
     */
    public function ensureEnrolled(User $user): UserLeague
    {
        // cohortMembers()/rolloverWeek() both join user_game_states to read
        // weekly_league_xp/total_xp — without this, a user with a
        // user_leagues row but no user_game_states row would be silently
        // invisible to every cohort query (INNER JOIN excludes them).
        UserGameState::firstOrCreate(['user_id' => $user->id]);

        $league = UserLeague::where('user_id', $user->id)->first();

        if ($league) {
            return $league;
        }

        $lowestTierId = LeagueTier::orderBy('order_number')->value('id');
        $weekStart = $this->currentWeekStart();
        $totalXp = (int) (UserGameState::where('user_id', $user->id)->value('total_xp') ?? 0);

        return UserLeague::create([
            'user_id' => $user->id,
            'league_tier_id' => $lowestTierId,
            'league_points' => 0,
            'cohort_group_number' => $this->cohortForJoiner($lowestTierId, $weekStart, $totalXp),
            'week_start_date' => $weekStart,
        ]);
    }

    /**
     * Which cohort a mid-week joiner belongs in.
     *
     * Two rules, in order. Cohorts already holding COHORT_SIZE people are
     * skipped, so a board never shows more than 30 names — previously every
     * joiner was appended to the highest-numbered cohort regardless of how
     * full it was, so a launch week could put hundreds of people on one
     * board. Among the cohorts with room, the one whose members sit closest
     * in total XP wins, which is the same similar-against-similar grouping
     * rebucketTier() applies to everybody every Monday.
     *
     * Two people enrolling in the same instant can both pick the same
     * near-full cohort and take it one over; that is harmless and the
     * Monday re-bucket squares it up.
     */
    private function cohortForJoiner(int $tierId, Carbon $weekStart, int $totalXp): int
    {
        $cohorts = UserLeague::where('league_tier_id', $tierId)
            ->where('week_start_date', $weekStart)
            ->join('user_game_states', 'user_game_states.user_id', '=', 'user_leagues.user_id')
            ->groupBy('user_leagues.cohort_group_number')
            ->selectRaw('user_leagues.cohort_group_number as number')
            ->selectRaw('count(*) as members')
            ->selectRaw('avg(user_game_states.total_xp) as avg_xp')
            ->get();

        $withRoom = $cohorts->filter(fn ($c) => (int) $c->members < self::COHORT_SIZE);

        // Everything is full (or this is the first member of the tier): open
        // the next board rather than overfilling one that is already at 30.
        if ($withRoom->isEmpty()) {
            return ((int) $cohorts->max('number')) + 1;
        }

        return (int) $withRoom
            ->sortBy(fn ($c) => abs((float) $c->avg_xp - $totalXp))
            ->first()
            ->number;
    }

    /**
     * Cohort members ranked by weekly XP, read live from
     * UserGameState.weekly_league_xp (the sole source of truth) rather than
     * a cached copy — so a member's displayed XP/rank is always accurate to
     * everyone viewing the cohort, regardless of whether that member has
     * personally opened the leaderboard recently. LEFT JOINs user_avatars
     * since a member may not have saved an avatar yet — the frontend's
     * buildAvatarUrl() already merges in sensible defaults for null fields.
     *
     * @return Collection<int, object{
     *     user_id: int, full_name: ?string, weekly_league_xp: int,
     *     skin_color: ?string, hair: ?string, hair_color: ?string, eyes: ?string,
     *     eyebrows: ?string, mouth: ?string, glasses: ?string, earrings: ?string,
     *     background_color: ?string,
     * }>
     */
    public function cohortMembers(UserLeague $league): Collection
    {
        return UserLeague::where('league_tier_id', $league->league_tier_id)
            ->where('week_start_date', $league->week_start_date)
            ->where('cohort_group_number', $league->cohort_group_number)
            ->join('user_game_states', 'user_game_states.user_id', '=', 'user_leagues.user_id')
            ->join('users', 'users.id', '=', 'user_leagues.user_id')
            ->leftJoin('user_avatars', 'user_avatars.user_id', '=', 'user_leagues.user_id')
            ->orderByDesc('user_game_states.weekly_league_xp')
            ->orderBy('user_leagues.user_id')
            ->get([
                'user_leagues.user_id',
                'users.full_name',
                'user_game_states.weekly_league_xp',
                'user_avatars.skin_color',
                'user_avatars.hair',
                'user_avatars.hair_color',
                'user_avatars.eyes',
                'user_avatars.eyebrows',
                'user_avatars.mouth',
                'user_avatars.glasses',
                'user_avatars.earrings',
                'user_avatars.background_color',
            ]);
    }

    /**
     * Runs the weekly rollover: awards every cohort member a points delta
     * based on their rank that week (pointsDeltaForRank()), promotes anyone
     * whose balance hits 100 (resetting to 0, or clamping at 99 if already
     * the highest tier), demotes anyone whose balance would go negative
     * (resetting to 0, or clamping at 0 if already the lowest tier), resets
     * everyone's weekly XP, and re-buckets each tier into fresh ~30-person
     * cohorts for the new week. Guarded by league_rollover_runs so the
     * Monday cron only actually applies once per week; $force bypasses the
     * guard for on-demand testing (see RolloverLeagues).
     *
     * @return array<string, array{promoted: int, demoted: int, stayed: int}>|array{skipped: true}
     */
    public function rolloverWeek(bool $force = false): array
    {
        $newWeekStart = $this->currentWeekStart();
        $weekKey = $newWeekStart->toDateString();

        $alreadyRan = DB::table('league_rollover_runs')->where('week_start_date', $weekKey)->exists();

        if ($alreadyRan && ! $force) {
            return ['skipped' => true];
        }

        if ($alreadyRan) {
            DB::table('league_rollover_runs')->where('week_start_date', $weekKey)->delete();
        }

        DB::table('league_rollover_runs')->insert(['week_start_date' => $weekKey, 'ran_at' => now()]);

        $tiers = LeagueTier::orderBy('order_number')->get();
        $tierMoves = [];
        $pointsUpdates = [];
        $tierChangeNotices = [];
        // Per-member record of how the week actually went, handed to the
        // client once so it can show a result popup. Keyed by user id.
        $weeklyResults = [];
        $removeUserIds = [];   // members who earned 0 XP this week -> dropped
        $summary = [];

        // Phase A: compute points deltas + resulting tier moves (read-only).
        foreach ($tiers as $tier) {
            $cohortNumbers = UserLeague::where('league_tier_id', $tier->id)->distinct()->pluck('cohort_group_number');

            $promoted = 0;
            $demoted = 0;
            $stayed = 0;
            $removed = 0;

            $nextTier = $tiers->firstWhere('order_number', $tier->order_number + 1);
            $prevTier = $tiers->firstWhere('order_number', $tier->order_number - 1);

            foreach ($cohortNumbers as $cohortNumber) {
                $members = UserLeague::where('league_tier_id', $tier->id)
                    ->where('cohort_group_number', $cohortNumber)
                    ->join('user_game_states', 'user_game_states.user_id', '=', 'user_leagues.user_id')
                    ->orderByDesc('user_game_states.weekly_league_xp')
                    ->orderBy('user_leagues.user_id')
                    ->get(['user_leagues.user_id', 'user_leagues.league_points', 'user_game_states.weekly_league_xp']);

                // Members who earned nothing this week are dropped from the
                // league entirely (they rejoin fresh the next time they earn
                // XP), rather than sitting idle and handing free promotions to
                // whoever's above them. Only ACTIVE members are ranked, so an
                // inactive member never pads the cohort or skews anyone's delta.
                $active = $members->filter(fn ($m) => (int) $m->weekly_league_xp > 0)->values();
                foreach ($members as $m) {
                    if ((int) $m->weekly_league_xp <= 0) {
                        $removeUserIds[] = $m->user_id;
                        $removed++;
                    }
                }

                $size = $active->count();

                foreach ($active as $index => $member) {
                    $rank = $index + 1;
                    $delta = $this->pointsDeltaForRank($rank, $size);
                    $newBalance = $member->league_points + $delta;

                    // A week is worth paying for when it gained points, i.e.
                    // the learner finished in the top half. A negative or flat
                    // week earns nothing rather than costing anything.
                    $weeklyResults[$member->user_id] = [
                        'rank' => $rank,
                        // Recorded now, because Phase C re-buckets every tier
                        // into fresh cohorts and the live size then belongs to
                        // a different week and different people.
                        'size' => $size,
                        'points' => $delta,
                        'xp' => (int) $member->weekly_league_xp,
                        'gems' => $delta > 0 ? self::WEEKLY_REWARD_GEMS : 0,
                    ];

                    if ($newBalance >= self::PROMOTION_THRESHOLD) {
                        $tierMoves[$member->user_id] = $nextTier?->id ?? $tier->id;
                        $pointsUpdates[$member->user_id] = $nextTier ? 0 : min($newBalance, self::PROMOTION_THRESHOLD - 1);
                        // Only a real tier move (not a clamp at the already-highest
                        // tier) gets a notice — clamping isn't a change to announce.
                        if ($nextTier) {
                            $tierChangeNotices[$member->user_id] = 'promoted';
                        }
                        $promoted++;
                    } elseif ($newBalance < 0) {
                        $tierMoves[$member->user_id] = $prevTier?->id ?? $tier->id;
                        $pointsUpdates[$member->user_id] = 0;
                        if ($prevTier) {
                            $tierChangeNotices[$member->user_id] = 'demoted';
                        }
                        $demoted++;
                    } else {
                        $tierMoves[$member->user_id] = $tier->id;
                        $pointsUpdates[$member->user_id] = $newBalance;
                        $stayed++;
                    }
                }
            }

            $summary[$tier->name] = compact('promoted', 'demoted', 'stayed', 'removed');
        }

        // Drop inactive members before anything else touches the rows, so the
        // reset/re-bucket phases below only ever see real competitors.
        if ($removeUserIds) {
            UserLeague::whereIn('user_id', $removeUserIds)->delete();
        }

        // Promotion reward per destination tier (gems/xp), granted in Phase B.
        $tierRewards = $tiers->keyBy('id')->map(fn ($t) => ['gems' => (int) $t->promotion_gems, 'xp' => (int) $t->promotion_xp]);

        // Phase B: apply moves + points + reset weekly XP, one locked row at a time.
        UserLeague::query()->orderBy('id')->chunkById(200, function ($chunk) use ($tierMoves, $pointsUpdates, $tierChangeNotices, $newWeekStart, $tierRewards, $weeklyResults) {
            foreach ($chunk as $row) {
                DB::transaction(function () use ($row, $tierMoves, $pointsUpdates, $tierChangeNotices, $newWeekStart, $tierRewards, $weeklyResults) {
                    $league = UserLeague::whereKey($row->id)->lockForUpdate()->first();
                    $league->league_tier_id = $tierMoves[$league->user_id] ?? $league->league_tier_id;
                    $league->league_points = $pointsUpdates[$league->user_id] ?? $league->league_points;
                    // Overwrites any not-yet-seen prior notice — acceptable: if a
                    // user skips checking the leaderboard across two consecutive
                    // rollovers, they see only the latest change, not a queue.
                    $league->pending_tier_change = $tierChangeNotices[$league->user_id] ?? null;

                    // Same one-shot contract as the tier notice above: written
                    // here, read and cleared by the leaderboard screen.
                    $result = $weeklyResults[$league->user_id] ?? null;
                    $league->pending_result_rank = $result['rank'] ?? null;
                    $league->pending_result_size = $result['size'] ?? null;
                    $league->pending_result_points = $result['points'] ?? null;
                    $league->pending_result_xp = $result['xp'] ?? null;
                    $league->pending_result_gems = $result['gems'] ?? null;

                    $league->week_start_date = $newWeekStart;
                    $league->save();

                    $state = UserGameState::where('user_id', $league->user_id)->lockForUpdate()->first();
                    if ($state) {
                        $state->weekly_league_xp = 0;

                        // Reward for being promoted INTO the new tier this rollover.
                        if (($tierChangeNotices[$league->user_id] ?? null) === 'promoted') {
                            $reward = $tierRewards[$league->league_tier_id] ?? null;
                            if ($reward) {
                                GemLedger::apply($state, $reward['gems'], 'league.promotion');
                                $state->total_xp += $reward['xp'];
                            }
                        }

                        // Paid for a positive week, on top of any promotion
                        // reward above. Credited from the same figure the popup
                        // reports, so what the learner is told and what lands in
                        // their balance cannot drift apart.
                        GemLedger::apply($state, (int) ($weeklyResults[$league->user_id]['gems'] ?? 0), 'league.weekly');

                        $state->save();
                    }
                });
            }
        });

        // Phase C: re-bucket each tier into fresh cohorts for the new week.
        foreach ($tiers as $tier) {
            $this->rebucketTier($tier->id);
        }

        // Phase D: notify anyone whose tier actually changed. Deliberately
        // after everything above has fully committed — a slow/failed mail
        // send must never hold up or fail the rollover itself.
        if ($tierChangeNotices) {
            $tiersById = $tiers->keyBy('id');

            foreach ($tierChangeNotices as $userId => $direction) {
                $newTierId = $tierMoves[$userId] ?? null;
                $tierName = $newTierId ? $tiersById->get($newTierId)?->name : null;
                $user = $tierName ? User::find($userId) : null;

                if ($user && $tierName) {
                    try {
                        $user->notify(new LeagueResultNotification($direction, $tierName));
                    } catch (\Throwable) {
                        // Best-effort — a single mail failure shouldn't affect
                        // the rest of the rollover's already-committed results.
                    }
                }
            }
        }

        return $summary;
    }

    /**
     * Buckets every user currently in a tier into sequential ~30-person
     * cohorts, ordered by total_xp (the "similar XP" proxy — weekly XP
     * doesn't exist yet the instant this runs, everyone was just reset).
     */
    private function rebucketTier(int $tierId): void
    {
        $userIds = UserLeague::where('league_tier_id', $tierId)
            ->join('user_game_states', 'user_game_states.user_id', '=', 'user_leagues.user_id')
            ->orderByDesc('user_game_states.total_xp')
            ->orderBy('user_leagues.user_id')
            ->pluck('user_leagues.user_id');

        foreach ($userIds->chunk(self::COHORT_SIZE) as $index => $chunk) {
            UserLeague::where('league_tier_id', $tierId)
                ->whereIn('user_id', $chunk->values())
                ->update(['cohort_group_number' => $index + 1]);
        }
    }
}
