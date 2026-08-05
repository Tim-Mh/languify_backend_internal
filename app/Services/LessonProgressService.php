<?php

namespace App\Services;

use App\Enums\ChestType;
use App\Enums\PlanKey;
use App\Models\Badge;
use App\Models\Chapter;
use App\Models\ChestClaim;
use App\Models\ChestRewardConfig;
use App\Models\Lesson;
use App\Models\StreakFreezeUse;
use App\Models\User;
use App\Models\UserBadge;
use App\Models\UserCompletedLanguage;
use App\Models\UserGameState;
use App\Models\UserLessonCompletion;
use App\Models\UserUnitCompletion;
use App\Notifications\StreakBrokenNotification;
use App\Notifications\StreakMilestoneNotification;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Server-side port of the frontend's src/lib/gameState.js engine.
 *
 * Day-boundary decisions (streak, daily counters, activity calendar) use the
 * user's own reported timezone via userToday()/asUserDate() — not the
 * server's — so a user's "today" resets at their own local midnight.
 * Duration-based logic (heart regen, chest cooldowns) stays on the server
 * clock since elapsed real time doesn't depend on timezone.
 */
class LessonProgressService
{
    private const LESSON_XP = 20;

    private const PERFECT_BONUS_XP = 10;

    private const UNIT_XP = 20;

    // Gems handed out on top of the XP when a whole unit is finished.
    private const UNIT_BONUS_GEMS = 25;

    // A big one-time reward for finishing an entire language (all chapters).
    private const LANGUAGE_BONUS_XP = 300;

    private const LANGUAGE_BONUS_GEMS = 300;

    /**
     * How many times a lesson must be completed to be "mastered" (fills its
     * progress ring and unlocks the next lesson). Duolingo-style repetition —
     * each play is one session.
     */
    public const LESSON_TARGET_COMPLETIONS = 5;

    public const MAX_HEARTS = 5;

    /** Monthly/Yearly subscribers' visible heart cap — see effectiveMaxHearts(). */
    public const SUBSCRIBER_MAX_HEARTS = 100;

    private const HEART_REGEN_MINUTES = 15;

    /**
     * Gems bonus is the same across all three paid tiers. Hearts and streak
     * freezes are NOT — see effectiveMaxHearts()/maxStreakFreezesPerMonth().
     * Ad visibility varies by plan_key too, but that's handled client-side.
     */
    private const GEMS_BONUS_MULTIPLIER = 1.5;

    /**
     * Fetch (creating if needed) the user's game state, applying any pending
     * daily-counter reset and passive heart regen. Persists the result.
     */
    public function hydrate(User $user): UserGameState
    {
        $state = UserGameState::firstOrCreate(['user_id' => $user->id]);
        $this->resetDailyCountersIfNeeded($state, $user);
        $this->breakStreakIfMissed($state, $user);
        $this->applyHeartRegen($state, $user);
        $state->save();

        return $state;
    }

    /**
     * "Today" as a calendar date in the user's own timezone (falls back to
     * the app's configured timezone if the user hasn't reported one yet).
     * Every day-boundary decision — streak, daily counters, activity
     * calendar — goes through this so a user's day always resets at their
     * own local midnight, not the server's.
     */
    private function userToday(User $user): Carbon
    {
        return Carbon::now($user->timezone ?: config('app.timezone'))->startOfDay();
    }

    /**
     * DATE columns carry no timezone of their own — Eloquent's `date` cast
     * re-hydrates them at midnight in the *app's* timezone regardless of
     * which timezone they were originally written in. Re-anchoring to the
     * user's timezone via the raw Y-m-d string (not the cast instant) keeps
     * diffInDays() a pure calendar-day count with no cross-timezone skew.
     */
    private function asUserDate(Carbon $date, User $user): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', $date->format('Y-m-d'), $user->timezone ?: config('app.timezone'))->startOfDay();
    }

    /**
     * Reflects a missed day immediately when the state is read, rather than
     * waiting for the user's next lesson completion to silently discover
     * (and reset) a stale streak value.
     */
    private function breakStreakIfMissed(UserGameState $state, User $user): void
    {
        if (! $state->last_lesson_date || $state->streak === 0) {
            return;
        }

        $today = $this->userToday($user);
        $diff = (int) $this->asUserDate($state->last_lesson_date, $user)->diffInDays($today);

        if ($diff <= 1) {
            return;
        }

        // A subscriber's monthly streak freeze only covers exactly one
        // missed day (diff === 2) — a 2+ day gap still breaks the streak.
        $frozenDate = $today->copy()->subDay();

        if ($diff === 2 && $this->tryConsumeStreakFreeze($user, $state, $frozenDate)) {
            // Treat the frozen day as if a lesson had happened, so the streak
            // continues naturally and this check won't re-trigger tomorrow.
            $state->last_lesson_date = $frozenDate;

            // Recorded so the Activity Calendar can mark this date distinctly
            // from an actually-completed lesson — see frozenDaysForMonth().
            // Not firstOrCreate(): the `date` cast round-trips through a
            // full datetime string, so a raw 'Y-m-d' search never matches it
            // and would just keep re-attempting (and failing) the insert.
            $alreadyRecorded = StreakFreezeUse::where('user_id', $user->id)
                ->whereDate('freeze_date', $frozenDate->format('Y-m-d'))
                ->exists();

            if (! $alreadyRecorded) {
                StreakFreezeUse::create([
                    'user_id' => $user->id,
                    'freeze_date' => $frozenDate->format('Y-m-d'),
                ]);
            }

            return;
        }

        // Notify once per break — this runs from BOTH a real request's
        // hydrate() call and the scheduled notification sweep's hydrate()
        // call (see SendDailyNotifications), so without this guard a user
        // who opens the app the same day the sweep already caught the break
        // would get emailed twice.
        $notifiedToday = $state->streak_broken_notified_date?->format('Y-m-d') === $today->format('Y-m-d');
        if (! $notifiedToday) {
            $user->notify(new StreakBrokenNotification($state->streak));
            $state->streak_broken_notified_date = $today;
        }

        $state->streak = 0;
    }

    /**
     * Consumes one of a subscriber's monthly streak freezes (count and reset
     * both tracked per calendar month). Returns false (and consumes nothing)
     * if the user has no active subscription or has already used up this
     * month's allowance. $frozenDate is the actually-missed day being
     * covered — NOT the day the user returned on — so a miss on the last day
     * of a month is charged to that month, not to whichever month the user
     * happens to come back in.
     */
    private function tryConsumeStreakFreeze(User $user, UserGameState $state, Carbon $frozenDate): bool
    {
        $maxFreezes = $this->maxStreakFreezesPerMonth($user);

        if ($maxFreezes === 0) {
            return false;
        }

        $thisMonth = $frozenDate->format('Y-m');

        if ($state->last_streak_freeze_month !== $thisMonth) {
            $state->last_streak_freeze_month = $thisMonth;
            $state->streak_freeze_count = 0;
        }

        if ($state->streak_freeze_count >= $maxFreezes) {
            return false;
        }

        $state->streak_freeze_count += 1;

        return true;
    }

    public function hasSubscriptionPerks(User $user): bool
    {
        return $user->hasActiveAppAccess();
    }

    private function planKey(User $user): ?string
    {
        return $user->effectivePlanKey();
    }

    /**
     * null = truly unlimited (Family). Monthly/Yearly get a much larger
     * visible cap (100) than the base 5 — regen and shop refill purchases
     * apply against whichever cap is in effect.
     */
    public function effectiveMaxHearts(User $user): ?int
    {
        return match (PlanKey::tryFrom((string) $this->planKey($user))) {
            PlanKey::Family => null,
            PlanKey::Monthly, PlanKey::Yearly => self::SUBSCRIBER_MAX_HEARTS,
            default => self::MAX_HEARTS,
        };
    }

    public function isPermanentlyUnlimitedHearts(User $user): bool
    {
        return $this->effectiveMaxHearts($user) === null;
    }

    public function maxStreakFreezesPerMonth(User $user): int
    {
        return match (PlanKey::tryFrom((string) $this->planKey($user))) {
            PlanKey::Family => 3,
            PlanKey::Monthly, PlanKey::Yearly => 1,
            default => 0,
        };
    }

    /**
     * How many of this month's streak freeze allowance are still unused.
     * Read-only for the frontend (Your Streak page) — freezes are always
     * applied automatically by breakStreakIfMissed(), never spent directly.
     */
    public function streakFreezesRemaining(User $user, UserGameState $state): int
    {
        $max = $this->maxStreakFreezesPerMonth($user);

        if ($max === 0) {
            return 0;
        }

        $thisMonth = $this->userToday($user)->format('Y-m');

        if ($state->last_streak_freeze_month !== $thisMonth) {
            return $max;
        }

        return max(0, $max - $state->streak_freeze_count);
    }

    /**
     * Applies the subscriber-only +50% bonus to an earned (not purchased)
     * gems amount. Callers pass the raw reward amount in; the returned value
     * is what actually gets credited and shown to the user.
     */
    public function applyGemsBonus(User $user, int $baseGems): int
    {
        if ($baseGems <= 0 || ! $this->hasSubscriptionPerks($user)) {
            return $baseGems;
        }

        return (int) round($baseGems * self::GEMS_BONUS_MULTIPLIER);
    }

    /**
     * Loses exactly one heart immediately (called per-mistake during an
     * exercise, not batched at lesson completion), floored at 0. Passive
     * regen is applied first so the loss is computed against a fresh value.
     * Skipped entirely while the user's temporary "infinite hearts" buff is
     * active (see grantInfiniteHearts()) or while permanently unlimited
     * (Family plan).
     *
     * @return array{hearts: int, heartsRegenSecondsRemaining: int, infiniteHeartsActive: bool, infiniteHeartsPermanent: bool, infiniteHeartsSecondsRemaining: int}
     */
    public function loseHeart(User $user): array
    {
        return DB::transaction(function () use ($user) {
            UserGameState::firstOrCreate(['user_id' => $user->id]);
            $state = UserGameState::where('user_id', $user->id)->lockForUpdate()->firstOrFail();

            $this->applyHeartRegen($state, $user);

            $isPermanentlyUnlimited = $this->isPermanentlyUnlimitedHearts($user);

            if (! $this->isInfiniteHeartsActive($state) && ! $isPermanentlyUnlimited) {
                // Don't touch hearts_updated_at here — applyHeartRegen() just
                // above already left it at the correct value (either "now"
                // if hearts were capped, or the remainder-preserving instant
                // from the last regen tick). Resetting it to now() again would
                // discard however much progress toward the next heart had
                // already accrued, purely because of *when* the mistake
                // happened to occur.
                $state->hearts = max(0, $state->hearts - 1);
            }

            $state->save();

            return [
                'hearts' => $state->hearts,
                'heartsRegenSecondsRemaining' => $this->heartsRegenSecondsRemaining($state, $user),
                'infiniteHeartsActive' => $this->isInfiniteHeartsActive($state) || $isPermanentlyUnlimited,
                'infiniteHeartsPermanent' => $isPermanentlyUnlimited,
                'infiniteHeartsSecondsRemaining' => $this->infiniteHeartsSecondsRemaining($state),
            ];
        });
    }

    /**
     * Grants (or extends) a temporary "no heart loss" buff, earned by a
     * perfect trivia score. Extends rather than resets when already active,
     * so replaying while the buff is running only ever pushes it ~$minutes
     * ahead of the last perfect run, rather than restarting the clock.
     */
    public function grantInfiniteHearts(UserGameState $state, int $minutes): void
    {
        $base = $state->infinite_hearts_until && $state->infinite_hearts_until->isFuture()
            ? $state->infinite_hearts_until
            : Carbon::now();

        $state->infinite_hearts_until = $base->copy()->addMinutes($minutes);
    }

    public function isInfiniteHeartsActive(UserGameState $state): bool
    {
        return $state->infinite_hearts_until !== null && $state->infinite_hearts_until->isFuture();
    }

    public function infiniteHeartsSecondsRemaining(UserGameState $state): int
    {
        if (! $this->isInfiniteHeartsActive($state)) {
            return 0;
        }

        return max(0, (int) Carbon::now()->diffInSeconds($state->infinite_hearts_until));
    }

    /**
     * Days within the given month (in the user's own timezone) that have at
     * least one lesson completion, for the Activity Calendar.
     *
     * @return array<int, int> day-of-month numbers, e.g. [1, 4, 5, 6]
     */
    public function activityDaysForMonth(User $user, int $year, int $month): array
    {
        $timezone = $user->timezone ?: config('app.timezone');
        $monthStart = Carbon::create($year, $month, 1, 0, 0, 0, $timezone)->startOfMonth();
        $monthEnd = $monthStart->copy()->endOfMonth();

        $completedAtTimestamps = UserLessonCompletion::where('user_id', $user->id)
            ->whereBetween('completed_at', [
                $monthStart->copy()->setTimezone('UTC'),
                $monthEnd->copy()->setTimezone('UTC'),
            ])
            ->pluck('completed_at');

        $days = [];

        foreach ($completedAtTimestamps as $timestamp) {
            $localDate = $timestamp->copy()->setTimezone($timezone);

            if ($localDate->year === $year && $localDate->month === $month) {
                $days[$localDate->day] = true;
            }
        }

        $result = array_keys($days);
        sort($result);

        return $result;
    }

    /**
     * Days within the given month (in the user's own timezone) that were
     * covered by a streak freeze rather than an actual lesson completion —
     * the Activity Calendar marks these distinctly (see StreakFreezeUse).
     *
     * @return array<int, int> day-of-month numbers, e.g. [1, 4, 5, 6]
     */
    public function frozenDaysForMonth(User $user, int $year, int $month): array
    {
        return StreakFreezeUse::where('user_id', $user->id)
            ->whereYear('freeze_date', $year)
            ->whereMonth('freeze_date', $month)
            ->pluck('freeze_date')
            ->map(fn ($date) => (int) $date->format('j'))
            ->sort()
            ->values()
            ->all();
    }

    /**
     * Seconds remaining until the next passive heart regenerates. 0 if hearts
     * are already full (or unlimited). Call after hydrate() so
     * hearts_updated_at is current.
     */
    public function heartsRegenSecondsRemaining(UserGameState $state, User $user): int
    {
        $maxHearts = $this->effectiveMaxHearts($user);

        if ($maxHearts === null || $state->hearts >= $maxHearts || ! $state->hearts_updated_at) {
            return 0;
        }

        $regenSeconds = self::HEART_REGEN_MINUTES * 60;
        $elapsedSeconds = (int) $state->hearts_updated_at->diffInSeconds(Carbon::now());

        return max(0, $regenSeconds - $elapsedSeconds);
    }

    /**
     * @return array{
     *     xpAwarded: int, unitXpAwarded: int, newBadges: array<int, array<string, mixed>>,
     *     streakMilestoneHit: ?array<string, mixed>, streak: int, totalXp: int,
     *     gems: int, hearts: int, alreadyCompletedBefore: bool,
     * }
     */
    public function completeLesson(User $user, Lesson $lesson, int $mistakes): array
    {
        $mistakes = max(0, $mistakes);

        return DB::transaction(function () use ($user, $lesson, $mistakes) {
            $state = UserGameState::firstOrCreate(['user_id' => $user->id]);
            $state = UserGameState::whereKey($state->id)->lockForUpdate()->first();

            $this->resetDailyCountersIfNeeded($state, $user);
            // Must run before applyStreak() below can see a bridged/broken
            // last_lesson_date — without this, any caller that reaches
            // completeLesson() without a preceding hydrate() (a future
            // client, a retried request) would silently skip streak-freeze
            // consumption and reset the streak to 1 instead of bridging it.
            $this->breakStreakIfMissed($state, $user);
            $this->applyHeartRegen($state, $user);

            // Hearts are lost in real time per mistake during the exercise
            // (see loseHeart()), not batched here — $mistakes only affects
            // XP/perfect-lesson scoring below.
            $isPerfect = $mistakes === 0;

            // Increment (or create) this lesson's session count. Each play is a
            // "session"; the lesson is mastered once it reaches the target,
            // which fills its progress ring and unlocks the next lesson.
            // Per-course: completions are tagged with the active course's native
            // (hint) language, so two courses in the same learning language keep
            // separate path progress.
            $completion = UserLessonCompletion::firstOrNew([
                'user_id' => $user->id,
                'lesson_id' => $lesson->id,
                'native_language_id' => $user->native_language_id,
            ]);
            $wasFirstCompletion = ! $completion->exists;

            // XP accrues on EVERY session (replaying earns XP, Duolingo-style),
            // which is what motivates completing a lesson the required 5 times.
            $xpAwarded = self::LESSON_XP + ($isPerfect ? self::PERFECT_BONUS_XP : 0);

            $completion->completions_count = ($completion->completions_count ?? 0) + 1;
            $completion->mistakes = $mistakes;
            $completion->is_perfect = $isPerfect;
            $completion->xp_awarded = $xpAwarded;
            $completion->completed_at = Carbon::now();
            $completion->save();

            $completionsCount = $completion->completions_count;
            $mastered = $completionsCount >= self::LESSON_TARGET_COMPLETIONS;

            $state->total_xp += $xpAwarded;
            $state->today_xp += $xpAwarded;
            $state->weekly_league_xp += $xpAwarded;
            // The lesson badge (total_lessons_completed) and the "complete N
            // lessons today" quest (lessons_mastered_today) measure fully
            // MASTERED lessons — all required sessions done — NOT individual
            // sessions. So they advance only on the one session that completes
            // the lesson (completions_count reaching the target exactly once;
            // later replays push it past the target and don't re-count).
            if ($completionsCount === self::LESSON_TARGET_COMPLETIONS) {
                $state->total_lessons_completed += 1;
                $state->lessons_mastered_today += 1;
            }
            // Perfect-lesson tracking stays per-lesson: the first flawless run.
            if ($wasFirstCompletion && $isPerfect) {
                $state->perfect_lessons += 1;
            }

            $streakIncreased = $this->applyStreak($state, $user);

            // Daily counters advance every session so replays still count
            // toward the daily goal / "complete N lessons today" quests.
            $state->lessons_today += 1;
            $state->max_lessons_in_a_day = max($state->max_lessons_in_a_day, $state->lessons_today);

            $lesson->loadMissing('unit.chapter');
            $unitBonus = $this->maybeCompleteUnit($user, $state, $lesson->unit);
            $chapterComplete = $this->isChapterComplete($user, $lesson->unit->chapter_id);

            $newBadges = $this->checkNewBadges($user, $state, $chapterComplete);

            $languageBonus = null;
            if ($chapterComplete) {
                $languageBonus = $this->maybeCompleteLanguage($user, $state, $lesson->unit->chapter->language_id);
            }

            $streakMilestoneHit = $this->unclaimedStreakMilestone($user, $state);

            if ($streakIncreased && $streakMilestoneHit && (int) $streakMilestoneHit['days'] === $state->streak) {
                $user->notify(new StreakMilestoneNotification($state->streak));
            }

            $state->save();

            return [
                'xpAwarded' => $xpAwarded,
                'unitXpAwarded' => $unitBonus['xp'],
                'unitBonusGems' => $unitBonus['gems'],
                'languageBonus' => $languageBonus, // {xp, gems} or null

                'newBadges' => (function () use ($newBadges) {
                    $badgesByKey = Badge::whereIn('key', $newBadges)->get()->keyBy('key');

                    return array_values(array_filter(array_map(
                        fn (string $key) => $badgesByKey->has($key) ? [
                            'id' => $badgesByKey[$key]->key,
                            'title' => $badgesByKey[$key]->title,
                            'description' => $badgesByKey[$key]->description,
                            'tier' => $badgesByKey[$key]->tier,
                        ] : null,
                        $newBadges,
                    )));
                })(),
                'streakMilestoneHit' => $streakMilestoneHit,
                'streak' => $state->streak,
                'totalXp' => $state->total_xp,
                'gems' => $state->gems,
                'hearts' => $state->hearts,
                'alreadyCompletedBefore' => ! $wasFirstCompletion,
                'completionsCount' => $completionsCount,
                'targetCompletions' => self::LESSON_TARGET_COMPLETIONS,
                'mastered' => $mastered,
            ];
        });
    }

    /**
     * @return bool whether this call actually moved the streak counter
     *              (false on a same-day repeat, e.g. a 2nd lesson today) —
     *              used to gate the streak-milestone email so it only fires
     *              on the exact lesson that crosses a threshold, not on
     *              every subsequent lesson before the milestone chest gets
     *              claimed (unclaimedStreakMilestone() stays "hit" until then).
     */
    private function applyStreak(UserGameState $state, User $user): bool
    {
        $today = $this->userToday($user);
        $increased = false;

        if (! $state->last_lesson_date) {
            $state->streak = 1;
            $increased = true;
        } else {
            // diffInDays() returns a float, not an int — cast before the
            // strict comparisons below (both sides are day-precision, so this
            // is always an exact whole number).
            $diff = (int) $this->asUserDate($state->last_lesson_date, $user)->diffInDays($today);

            if ($diff === 0) {
                // already counted today
            } elseif ($diff === 1) {
                $state->streak += 1;
                $increased = true;
            } else {
                $state->streak = 1;
                $increased = true;
            }
        }

        $state->last_lesson_date = $today;
        $state->longest_streak = max($state->longest_streak, $state->streak);

        // Renewed activity clears the re-engagement stage tracker — without
        // this, SendDailyNotifications' "$stage !== $last_notified" guard
        // would never fire again once a user had ever reached a given stage
        // (e.g. 30), since coming back and going quiet again computes the
        // exact same stage number as before.
        $state->last_inactivity_stage_notified = null;

        return $increased;
    }

    /**
     * @return array{xp: int, gems: int} the unit-completion bonus (all zero if
     *                                    the unit wasn't just finished).
     */
    private function maybeCompleteUnit(User $user, UserGameState $state, $unit): array
    {
        $none = ['xp' => 0, 'gems' => 0];

        $wasAlreadyComplete = UserUnitCompletion::where('user_id', $user->id)
            ->where('unit_id', $unit->id)
            ->where('native_language_id', $user->native_language_id)
            ->exists();

        if ($wasAlreadyComplete) {
            return $none;
        }

        $totalLessons = $unit->lessons()->count();
        $completedLessons = UserLessonCompletion::where('user_id', $user->id)
            ->where('native_language_id', $user->native_language_id)
            ->whereIn('lesson_id', $unit->lessons()->pluck('id'))
            ->count();

        if ($totalLessons === 0 || $completedLessons < $totalLessons) {
            return $none;
        }

        $gems = $this->applyGemsBonus($user, self::UNIT_BONUS_GEMS);

        UserUnitCompletion::create([
            'user_id' => $user->id,
            'unit_id' => $unit->id,
            'native_language_id' => $user->native_language_id,
            'xp_awarded' => self::UNIT_XP,
            'completed_at' => Carbon::now(),
        ]);

        $state->total_xp += self::UNIT_XP;
        $state->today_xp += self::UNIT_XP;
        $state->weekly_league_xp += self::UNIT_XP;
        $state->gems += $gems;
        $state->units_completed_count += 1;

        return ['xp' => self::UNIT_XP, 'gems' => $gems];
    }

    /**
     * Records a one-time "completed language" entry (used on the Profile page)
     * once every chapter of the given language is finished, and hands out a big
     * one-time completion bonus (XP + gems).
     *
     * @return array{xp: int, gems: int}|null the bonus, or null if not just completed.
     */
    private function maybeCompleteLanguage(User $user, UserGameState $state, int $languageId): ?array
    {
        $alreadyRecorded = UserCompletedLanguage::where('user_id', $user->id)
            ->where('language_id', $languageId)
            ->exists();

        if ($alreadyRecorded) {
            return null;
        }

        $chapterIds = Chapter::where('language_id', $languageId)->pluck('id');

        if ($chapterIds->isEmpty() || ! $chapterIds->every(fn ($chapterId) => $this->isChapterComplete($user, $chapterId))) {
            return null;
        }

        $gems = $this->applyGemsBonus($user, self::LANGUAGE_BONUS_GEMS);

        $state->total_xp += self::LANGUAGE_BONUS_XP;
        $state->today_xp += self::LANGUAGE_BONUS_XP;
        $state->weekly_league_xp += self::LANGUAGE_BONUS_XP;
        $state->gems += $gems;

        UserCompletedLanguage::create([
            'user_id' => $user->id,
            'language_id' => $languageId,
            'xp_at_completion' => $state->total_xp,
            'completed_at' => Carbon::now(),
        ]);

        return ['xp' => self::LANGUAGE_BONUS_XP, 'gems' => $gems];
    }

    public function isChapterComplete(User $user, int $chapterId): bool
    {
        $lessonIds = Lesson::whereIn('unit_id', function ($query) use ($chapterId) {
            $query->select('id')->from('units')->where('chapter_id', $chapterId);
        })->pluck('id');

        if ($lessonIds->isEmpty()) {
            return false;
        }

        $completedCount = UserLessonCompletion::where('user_id', $user->id)
            ->where('native_language_id', $user->native_language_id)
            ->whereIn('lesson_id', $lessonIds)
            ->count();

        return $completedCount >= $lessonIds->count();
    }

    public function isUnitComplete(User $user, int $unitId): bool
    {
        $lessonIds = Lesson::where('unit_id', $unitId)->pluck('id');

        if ($lessonIds->isEmpty()) {
            return false;
        }

        $completedCount = UserLessonCompletion::where('user_id', $user->id)
            ->where('native_language_id', $user->native_language_id)
            ->whereIn('lesson_id', $lessonIds)
            ->count();

        return $completedCount >= $lessonIds->count();
    }

    /**
     * Batched equivalent of calling isChapterComplete() for every chapter of a
     * language — two queries total instead of two per chapter (avoids the N+1
     * on the main learn screen). Returns a set (keyed by chapter id, use
     * has()) of the chapters where every lesson is completed.
     */
    public function completeChapterIdsForLanguage(User $user, int $languageId): Collection
    {
        $lessons = Lesson::query()
            ->join('units', 'lessons.unit_id', '=', 'units.id')
            ->join('chapters', 'units.chapter_id', '=', 'chapters.id')
            ->where('chapters.language_id', $languageId)
            ->get(['lessons.id as lesson_id', 'chapters.id as chapter_id']);

        return $this->completeParentIds($user, $lessons, 'chapter_id');
    }

    /**
     * Batched equivalent of calling isUnitComplete() for every unit of a
     * chapter — two queries total instead of two per unit. Returns a set
     * (keyed by unit id, use has()) of the fully-completed units.
     */
    public function completeUnitIdsForChapter(User $user, int $chapterId): Collection
    {
        $lessons = Lesson::query()
            ->join('units', 'lessons.unit_id', '=', 'units.id')
            ->where('units.chapter_id', $chapterId)
            ->get(['lessons.id as lesson_id', 'units.id as unit_id']);

        return $this->completeParentIds($user, $lessons, 'unit_id');
    }

    /**
     * Per-chapter lesson-completion fraction (0-100) for a whole language, in
     * two queries — powers the real progress bar for the in-progress chapter
     * on the dashboard. Returns chapter_id => int percent.
     */
    public function chapterProgressPercentForLanguage(User $user, int $languageId): Collection
    {
        $lessons = Lesson::query()
            ->join('units', 'lessons.unit_id', '=', 'units.id')
            ->join('chapters', 'units.chapter_id', '=', 'chapters.id')
            ->where('chapters.language_id', $languageId)
            ->get(['lessons.id as lesson_id', 'chapters.id as chapter_id']);

        if ($lessons->isEmpty()) {
            return collect();
        }

        $totalByChapter = $lessons->groupBy('chapter_id')->map->count();

        $completedLessonIds = UserLessonCompletion::where('user_id', $user->id)
            ->where('native_language_id', $user->native_language_id)
            ->whereIn('lesson_id', $lessons->pluck('lesson_id'))
            ->pluck('lesson_id')
            ->flip();

        $completedByChapter = $lessons
            ->filter(fn ($row) => $completedLessonIds->has($row->lesson_id))
            ->groupBy('chapter_id')
            ->map->count();

        return $totalByChapter->map(fn ($total, $chapterId) => $total > 0
            ? (int) round((($completedByChapter[$chapterId] ?? 0) / $total) * 100)
            : 0);
    }

    /**
     * Given (lesson_id, parent_id) rows, returns the set of parent ids whose
     * every lesson the user has completed. Shared by the two batched helpers
     * above.
     */
    private function completeParentIds(User $user, Collection $lessons, string $parentKey): Collection
    {
        if ($lessons->isEmpty()) {
            return collect();
        }

        $totalByParent = $lessons->groupBy($parentKey)->map->count();

        $completedLessonIds = UserLessonCompletion::where('user_id', $user->id)
            ->where('native_language_id', $user->native_language_id)
            ->whereIn('lesson_id', $lessons->pluck('lesson_id'))
            ->pluck('lesson_id')
            ->flip();

        $completedByParent = $lessons
            ->filter(fn ($row) => $completedLessonIds->has($row->lesson_id))
            ->groupBy($parentKey)
            ->map->count();

        return $totalByParent
            ->filter(fn ($total, $parentId) => $total > 0 && ($completedByParent[$parentId] ?? 0) >= $total)
            ->keys()
            ->flip();
    }

    /**
     * Badges are now CLAIMED manually from the profile (see claimBadge), not
     * auto-granted on lesson completion — so nothing is awarded here. Kept as a
     * no-op so the lesson-complete flow (which expects a list back) is unchanged.
     *
     * @return array<int, string>
     */
    private function checkNewBadges(User $user, UserGameState $state, bool $chapterComplete): array
    {
        return [];
    }

    /** Does the user's current game state meet a badge's requirement? */
    public function meetsBadgeRequirement(UserGameState $state, Badge $badge, bool $chapterComplete = false): bool
    {
        return match ($badge->requirement_type) {
            'streak' => $state->streak >= $badge->requirement_value,
            'total_xp' => $state->total_xp >= $badge->requirement_value,
            'total_lessons_completed' => $state->total_lessons_completed >= $badge->requirement_value,
            'perfect_lessons' => $state->perfect_lessons >= $badge->requirement_value,
            'units_completed_count' => $state->units_completed_count >= $badge->requirement_value,
            'max_lessons_in_a_day' => $state->max_lessons_in_a_day >= $badge->requirement_value,
            'chapter_complete' => $chapterComplete,
            default => false,
        };
    }

    /**
     * Claim an earned-but-unclaimed badge: records it and pays out the tier
     * reward (gems + XP + hearts). Race-safe via a game-state row lock.
     *
     * @return array{gems: int, xp: int, hearts: int}
     */
    public function claimBadge(User $user, Badge $badge): array
    {
        return DB::transaction(function () use ($user, $badge) {
            UserGameState::firstOrCreate(['user_id' => $user->id]);
            $state = UserGameState::where('user_id', $user->id)->lockForUpdate()->firstOrFail();

            abort_if(
                UserBadge::where('user_id', $user->id)->where('badge_key', $badge->key)->exists(),
                422,
                'You have already claimed this badge.',
            );
            abort_if(
                ! $this->meetsBadgeRequirement($state, $badge),
                422,
                'You have not earned this badge yet.',
            );

            UserBadge::create(['user_id' => $user->id, 'badge_key' => $badge->key, 'earned_at' => Carbon::now()]);

            $reward = Badge::tierReward($badge->tier);
            $gems = $this->applyGemsBonus($user, $reward['gems']);
            $maxHearts = $this->effectiveMaxHearts($user);

            $state->gems += $gems;
            $state->hearts = $maxHearts === null ? $state->hearts + $reward['hearts'] : min($maxHearts, $state->hearts + $reward['hearts']);
            $state->total_xp += $reward['xp'];
            $state->today_xp += $reward['xp'];
            $state->weekly_league_xp += $reward['xp'];
            $state->save();

            return ['gems' => $gems, 'xp' => $reward['xp'], 'hearts' => $reward['hearts']];
        });
    }

    /**
     * @return array<int, string> (unused; auto-award disabled — see above)
     */
    private function legacyCheckNewBadges(User $user, UserGameState $state, bool $chapterComplete): array
    {
        $earned = UserBadge::where('user_id', $user->id)->pluck('badge_key')->flip();
        $newly = [];

        foreach (Badge::where('is_active', true)->get() as $badge) {
            if ($earned->has($badge->key)) {
                continue;
            }

            $condition = match ($badge->requirement_type) {
                'streak' => $state->streak >= $badge->requirement_value,
                'total_xp' => $state->total_xp >= $badge->requirement_value,
                'total_lessons_completed' => $state->total_lessons_completed >= $badge->requirement_value,
                'perfect_lessons' => $state->perfect_lessons >= $badge->requirement_value,
                'units_completed_count' => $state->units_completed_count >= $badge->requirement_value,
                'max_lessons_in_a_day' => $state->max_lessons_in_a_day >= $badge->requirement_value,
                'chapter_complete' => $chapterComplete,
                default => false,
            };

            if (! $condition) {
                continue;
            }

            $earned[$badge->key] = true;
            $newly[] = $badge->key;

            UserBadge::create(['user_id' => $user->id, 'badge_key' => $badge->key, 'earned_at' => Carbon::now()]);

            $reward = Badge::tierReward($badge->tier);
            $state->gems += $this->applyGemsBonus($user, $reward['gems']);
            $maxHearts = $this->effectiveMaxHearts($user);
            $state->hearts = $maxHearts === null ? $state->hearts + $reward['hearts'] : min($maxHearts, $state->hearts + $reward['hearts']);
            $state->total_xp += $reward['xp'];
            $state->today_xp += $reward['xp'];
            $state->weekly_league_xp += $reward['xp'];
        }

        return $newly;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function unclaimedStreakMilestone(User $user, UserGameState $state): ?array
    {
        $claimedDays = ChestClaim::where('user_id', $user->id)
            ->where('chest_type', ChestType::Streak)
            ->pluck('reference')
            ->map(fn ($r) => (int) $r)
            ->all();

        $milestones = ChestRewardConfig::where('chest_type', ChestType::Streak)
            ->where('is_active', true)
            ->orderBy('order_number')
            ->get();

        foreach ($milestones as $milestone) {
            $days = (int) $milestone->reference;

            if ($state->streak >= $days && ! in_array($days, $claimedDays, true)) {
                return [
                    'days' => $days,
                    'badgeId' => $milestone->badge_key,
                    'gems' => $this->applyGemsBonus($user, $milestone->min_gems),
                    'reward' => $milestone->reward_description,
                ];
            }
        }

        return null;
    }

    private function resetDailyCountersIfNeeded(UserGameState $state, User $user): void
    {
        $today = $this->userToday($user);

        if (! $state->today_date || $state->today_date->format('Y-m-d') !== $today->format('Y-m-d')) {
            $state->today_xp = 0;
            $state->lessons_today = 0;
            $state->lessons_mastered_today = 0;
            $state->today_date = $today;
        }
    }

    private function applyHeartRegen(UserGameState $state, User $user): void
    {
        $maxHearts = $this->effectiveMaxHearts($user);

        if ($maxHearts === null) {
            return; // Family: truly unlimited, nothing to regen toward.
        }

        if ($state->hearts >= $maxHearts) {
            // Trim anything ABOVE the cap. Subscribing raises the cap to 100 and
            // tops the wallet up to match; when the plan ends the cap drops back
            // to 5, and without this the learner would keep sitting on 100
            // hearts indefinitely, since nothing else ever lowers the count.
            //
            // Done here, rather than at each of the several places a plan can
            // end (cancelling, the nightly expiry sweep, a Stripe webhook, a
            // family owner's plan lapsing), so it self-corrects on the very next
            // request however the plan actually ended.
            $state->hearts = min($state->hearts, $maxHearts);
            $state->hearts_updated_at = Carbon::now();

            return;
        }

        $last = $state->hearts_updated_at ?? $state->created_at ?? Carbon::now();
        $elapsedMinutes = (int) $last->diffInMinutes(Carbon::now());
        $regenCount = intdiv($elapsedMinutes, self::HEART_REGEN_MINUTES);

        if ($regenCount > 0) {
            $state->hearts = min($maxHearts, $state->hearts + $regenCount);
            $state->hearts_updated_at = $last->copy()->addMinutes($regenCount * self::HEART_REGEN_MINUTES);
        }
    }
}
