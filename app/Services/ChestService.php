<?php

namespace App\Services;

use App\Enums\ChestType;
use App\Models\ChestClaim;
use App\Models\ChestRewardConfig;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserGameState;
use App\Models\UserLessonCompletion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChestService
{
    private const DAILY_CHEST_COOLDOWN_HOURS = 24;

    public function __construct(private LessonProgressService $progress) {}

    /**
     * Guarantees a game-state row exists for the user, then returns it
     * locked for update within the current transaction.
     */
    private function lockedState(int $userId): UserGameState
    {
        UserGameState::firstOrCreate(['user_id' => $userId]);

        return UserGameState::where('user_id', $userId)->lockForUpdate()->firstOrFail();
    }

    private function rewardConfig(ChestType $type): ChestRewardConfig
    {
        return ChestRewardConfig::where('chest_type', $type)->whereNull('reference')->firstOrFail();
    }

    private function randomInRange(int $min, int $max): int
    {
        return $min >= $max ? $min : random_int($min, $max);
    }

    public function isDailyChestAvailable(UserGameState $state): bool
    {
        if (! $state->daily_chest_claimed_at) {
            return true;
        }

        return $state->daily_chest_claimed_at->lt(Carbon::now()->subHours(self::DAILY_CHEST_COOLDOWN_HOURS));
    }

    public function dailyChestCooldownSeconds(UserGameState $state): int
    {
        if (! $state->daily_chest_claimed_at) {
            return 0;
        }

        $unlocksAt = $state->daily_chest_claimed_at->copy()->addHours(self::DAILY_CHEST_COOLDOWN_HOURS);

        return max(0, (int) Carbon::now()->diffInSeconds($unlocksAt, false));
    }

    /**
     * @return array{gems: int, xp: int, hearts: int}
     */
    public function claimDaily(User $user): array
    {
        return DB::transaction(function () use ($user) {
            $state = $this->lockedState($user->id);

            if (! $this->isDailyChestAvailable($state)) {
                abort(422, 'The daily chest is still on cooldown.');
            }

            $config = $this->rewardConfig(ChestType::Daily);
            $gems = $this->progress->applyGemsBonus($user, $this->randomInRange($config->min_gems, $config->max_gems));

            ChestClaim::create([
                'user_id' => $user->id,
                'chest_type' => ChestType::Daily,
                'reference' => Carbon::now()->toDateTimeString(),
                'gems_awarded' => $gems,
                'xp_awarded' => 0,
                'hearts_awarded' => 0,
                'claimed_at' => Carbon::now(),
            ]);

            $state->gems += $gems;
            $state->daily_chest_claimed_at = Carbon::now();
            $state->save();

            return ['gems' => $gems, 'xp' => 0, 'hearts' => 0];
        });
    }

    /**
     * @return array{gems: int, xp: int, hearts: int, milestoneDays: int}
     */
    public function claimStreak(User $user): array
    {
        return DB::transaction(function () use ($user) {
            $state = $this->lockedState($user->id);

            $milestone = $this->progress->unclaimedStreakMilestone($user, $state);

            if (! $milestone) {
                abort(422, 'No unclaimed streak milestone available.');
            }

            ChestClaim::create([
                'user_id' => $user->id,
                'chest_type' => ChestType::Streak,
                'reference' => (string) $milestone['days'],
                'gems_awarded' => $milestone['gems'],
                'xp_awarded' => 0,
                'hearts_awarded' => 0,
                'claimed_at' => Carbon::now(),
            ]);

            $state->gems += $milestone['gems'];
            $state->save();

            return ['gems' => $milestone['gems'], 'xp' => 0, 'hearts' => 0, 'milestoneDays' => $milestone['days']];
        });
    }

    public function isUnitBonusChestAvailable(User $user, Unit $unit): bool
    {
        $alreadyClaimed = ChestClaim::where('user_id', $user->id)
            ->where('chest_type', ChestType::UnitBonus)
            ->where('reference', (string) $unit->id)
            ->exists();

        if ($alreadyClaimed) {
            return false;
        }

        $firstLessonId = $unit->lessons()->orderBy('order_number')->value('id');

        if (! $firstLessonId) {
            return false;
        }

        return UserLessonCompletion::where('user_id', $user->id)
            ->where('native_language_id', $user->native_language_id)
            ->where('lesson_id', $firstLessonId)
            ->exists();
    }

    /**
     * @return array{gems: int, xp: int, hearts: int}
     */
    public function claimUnitBonus(User $user, Unit $unit): array
    {
        return DB::transaction(function () use ($user, $unit) {
            $state = $this->lockedState($user->id);

            if (! $this->isUnitBonusChestAvailable($user, $unit)) {
                abort(422, 'This bonus chest is not available.');
            }

            $config = $this->rewardConfig(ChestType::UnitBonus);
            $gems = $this->progress->applyGemsBonus($user, $this->randomInRange($config->min_gems, $config->max_gems));
            $xp = $this->randomInRange($config->min_xp, $config->max_xp);
            $hearts = $this->randomInRange($config->min_hearts, $config->max_hearts);

            ChestClaim::create([
                'user_id' => $user->id,
                'chest_type' => ChestType::UnitBonus,
                'reference' => (string) $unit->id,
                'gems_awarded' => $gems,
                'xp_awarded' => $xp,
                'hearts_awarded' => $hearts,
                'claimed_at' => Carbon::now(),
            ]);

            $state->gems += $gems;
            $state->total_xp += $xp;
            $state->today_xp += $xp;
            $maxHearts = $this->progress->effectiveMaxHearts($user);
            $state->hearts = $maxHearts === null ? $state->hearts + $hearts : min($maxHearts, $state->hearts + $hearts);
            $state->save();

            return ['gems' => $gems, 'xp' => $xp, 'hearts' => $hearts];
        });
    }
}
