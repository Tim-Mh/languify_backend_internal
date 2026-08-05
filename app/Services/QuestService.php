<?php

namespace App\Services;

use App\Models\Quest;
use App\Models\User;
use App\Models\UserDailyQuest;
use App\Models\UserGameState;
use App\Models\UserLessonCompletion;
use App\Models\UserUnitCompletion;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Assigns 3 daily quests per user per day (lazily, on first read — no
 * scheduler needed) and computes each quest's progress live from existing
 * records (UserGameState's today counters, UserLessonCompletion,
 * UserUnitCompletion), rather than tracking a separate incremental counter
 * that could drift out of sync.
 *
 * Quests are a small set of growing TEMPLATES (one per goal type), not a big
 * hand-written catalog. Each template's target GROWS with the learner's total
 * lessons completed — rising by target_increment every LESSONS_PER_STEP lessons,
 * capped at max_target — so a handful of templates covers an endless run of
 * gradually harder days, and rewards scale in proportion. Because it's tied to
 * lessons DONE (which only grows), it never eases back down after a break.
 *
 * When the day's quests are assigned, the concrete target + rewards each was
 * scaled to are SNAPSHOTTED onto the UserDailyQuest, so doing a lesson mid-day
 * never shifts that day's goalposts. Progress is measured from that day's
 * activity, so an unfinished quest simply resets to 0 the next day.
 */
class QuestService
{
    // Total lessons ever completed per growth step: every this-many lessons, a
    // template's target rises by its target_increment (up to its max_target).
    private const LESSONS_PER_STEP = 10;

    // How many quests a learner gets each day.
    private const QUESTS_PER_DAY = 3;

    public function __construct(private LessonProgressService $progress) {}

    public function todayForUser(User $user, UserGameState $state): Collection
    {
        $today = Carbon::now($user->timezone ?: config('app.timezone'))->startOfDay();

        $assignments = UserDailyQuest::where('user_id', $user->id)
            ->whereDate('quest_date', $today)
            ->with('quest')
            ->get();

        if ($assignments->isEmpty()) {
            $assignments = DB::transaction(function () use ($user, $state, $today) {
                // Lock the game-state row so two near-simultaneous
                // first-of-day reads (two tabs, a retried request) serialize
                // instead of both passing the empty check above and both
                // inserting a full set of 3 quests — there's no simple DB
                // uniqueness constraint that could catch this, since 3
                // distinct quest rows legitimately share the same
                // (user_id, quest_date) pair.
                UserGameState::whereKey($state->id)->lockForUpdate()->first();

                $existing = UserDailyQuest::where('user_id', $user->id)
                    ->whereDate('quest_date', $today)
                    ->with('quest')
                    ->get();

                if ($existing->isNotEmpty()) {
                    return $existing;
                }

                // Pick today's quests from the active TEMPLATES, and snapshot
                // the concrete target + rewards each is scaled to for this user
                // (based on their total lessons completed) so mid-day progress
                // never shifts the goalposts.
                $templates = Quest::where('is_active', true)
                    ->inRandomOrder()
                    ->take(self::QUESTS_PER_DAY)
                    ->get();

                foreach ($templates as $quest) {
                    $scaled = $this->scaleForUser($quest, $state);
                    UserDailyQuest::create([
                        'user_id' => $user->id,
                        'quest_id' => $quest->id,
                        'quest_date' => $today,
                        'target_count' => $scaled['target'],
                        'gems_reward' => $scaled['gems'],
                        'xp_reward' => $scaled['xp'],
                        'progress' => 0,
                    ]);
                }

                return UserDailyQuest::where('user_id', $user->id)
                    ->whereDate('quest_date', $today)
                    ->with('quest')
                    ->get();
            });
        }

        // Easiest-to-hardest — makes the within-day escalation visible in
        // the UI regardless of which order the rows happen to be in.
        $assignments = $assignments->sortBy(fn (UserDailyQuest $a) => $a->quest->difficulty)->values();

        $perfectLessonsToday = UserLessonCompletion::where('user_id', $user->id)
            ->where('completed_at', '>=', $today->copy()->setTimezone('UTC'))
            ->where('is_perfect', true)
            ->count();

        $unitsCompletedToday = UserUnitCompletion::where('user_id', $user->id)
            ->where('completed_at', '>=', $today->copy()->setTimezone('UTC'))
            ->count();

        return $assignments->map(function (UserDailyQuest $assignment) use ($state, $perfectLessonsToday, $unitsCompletedToday) {
            $quest = $assignment->quest;

            $progress = match ($quest->requirement_type) {
                'lessons_completed' => $state->lessons_mastered_today,
                'xp_earned' => $state->today_xp,
                'perfect_lesson' => $perfectLessonsToday,
                'units_completed' => $unitsCompletedToday,
                default => 0,
            };
            // Target/rewards come from the per-day SNAPSHOT on the assignment
            // (what this quest was scaled to when issued), not the template.
            $target = (int) ($assignment->target_count ?? $quest->target_count);
            $progress = min($progress, $target);

            if (! $assignment->completed_at && $progress >= $target) {
                $assignment->completed_at = Carbon::now();
                $assignment->save();
            }

            return [
                'id' => $assignment->id,
                'key' => $quest->key,
                'title' => $quest->title,
                'description' => $quest->description,
                // Drives client-side localization of the description (built
                // from requirementType + targetCount) so quests render in the
                // learner's native language, not the admin's English copy.
                'requirementType' => $quest->requirement_type,
                'difficulty' => $quest->difficulty,
                'targetCount' => $target,
                'progress' => $progress,
                'gemsReward' => (int) ($assignment->gems_reward ?? $quest->gems_reward),
                'xpReward' => (int) ($assignment->xp_reward ?? $quest->xp_reward),
                'completed' => (bool) $assignment->completed_at,
                'claimed' => (bool) $assignment->claimed_at,
            ];
        });
    }

    /**
     * The concrete target + rewards a template scales to for a learner, based
     * on how many lessons they've completed in total. The target grows by the
     * template's increment every LESSONS_PER_STEP lessons, capped at max_target;
     * rewards scale in proportion to how much the target grew. This is what lets
     * a handful of templates cover an endless run of gradually harder days.
     *
     * @return array{target: int, gems: int, xp: int}
     */
    private function scaleForUser(Quest $quest, UserGameState $state): array
    {
        $base = max(1, (int) $quest->target_count);
        $increment = (int) $quest->target_increment;
        $cap = $quest->max_target !== null ? (int) $quest->max_target : $base;

        $step = intdiv(max(0, (int) $state->total_lessons_completed), self::LESSONS_PER_STEP);
        $target = max(1, min($cap, $base + $step * $increment));
        $factor = $target / $base;

        return [
            'target' => $target,
            'gems' => (int) round($quest->gems_reward * $factor),
            'xp' => (int) round($quest->xp_reward * $factor),
        ];
    }


    /**
     * @return array{gems: int, xp: int}
     */
    public function claim(User $user, int $userDailyQuestId): array
    {
        return DB::transaction(function () use ($user, $userDailyQuestId) {
            $assignment = UserDailyQuest::where('id', $userDailyQuestId)
                ->where('user_id', $user->id)
                ->lockForUpdate()
                ->firstOrFail();

            if (! $assignment->completed_at) {
                abort(422, 'This quest is not completed yet.');
            }

            if ($assignment->claimed_at) {
                abort(422, 'This quest reward was already claimed.');
            }

            $quest = Quest::findOrFail($assignment->quest_id);

            // Reward is the per-day snapshot (falls back to the template for
            // pre-hybrid rows that predate the snapshot columns).
            $gemsReward = (int) ($assignment->gems_reward ?? $quest->gems_reward);
            $xpReward = (int) ($assignment->xp_reward ?? $quest->xp_reward);

            UserGameState::firstOrCreate(['user_id' => $user->id]);
            $state = UserGameState::where('user_id', $user->id)->lockForUpdate()->firstOrFail();

            $gemsAwarded = $this->progress->applyGemsBonus($user, $gemsReward);

            $state->gems += $gemsAwarded;
            $state->total_xp += $xpReward;
            $state->today_xp += $xpReward;
            // Quest XP counts toward the weekly league standings, like every
            // other XP the learner earns.
            $state->weekly_league_xp += $xpReward;
            $state->save();

            $assignment->claimed_at = Carbon::now();
            $assignment->save();

            return ['gems' => $gemsAwarded, 'xp' => $xpReward];
        });
    }
}
