<?php

namespace Tests\Feature;

use App\Models\Language;
use App\Models\LeagueTier;
use App\Models\User;
use App\Models\UserGameState;
use App\Models\UserLeague;
use App\Services\LeagueService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeagueTest extends TestCase
{
    use RefreshDatabase;

    private function makeLanguage(): Language
    {
        return Language::create(['code' => 'es', 'name' => 'Spanish', 'native_name' => 'Español', 'flag_emoji' => '🇪🇸']);
    }

    private function makeUserWithCourse(Language $language, int $totalXp = 0, int $weeklyXp = 0): User
    {
        $user = User::factory()->create();
        $user->forceFill(['learning_language_id' => $language->id])->save();

        UserGameState::create(['user_id' => $user->id, 'total_xp' => $totalXp, 'weekly_league_xp' => $weeklyXp]);

        return $user;
    }

    private function placeInCohort(User $user, LeagueTier $tier, int $cohortNumber, int $leaguePoints = 0): UserLeague
    {
        return UserLeague::create([
            'user_id' => $user->id,
            'league_tier_id' => $tier->id,
            'league_points' => $leaguePoints,
            'cohort_group_number' => $cohortNumber,
            'week_start_date' => (new LeagueService)->currentWeekStart(),
        ]);
    }

    public function test_league_requires_course_selected(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->getJson('/api/league')->assertStatus(422);
    }

    public function test_league_is_lazily_created_at_the_lowest_tier(): void
    {
        $language = $this->makeLanguage();
        $user = $this->makeUserWithCourse($language);

        $response = $this->actingAs($user)->getJson('/api/league')->assertOk();

        $lowestTier = LeagueTier::orderBy('order_number')->first();

        $response->assertJsonPath('league.tierName', $lowestTier->name)
            ->assertJsonPath('league.isLowestTier', true)
            ->assertJsonPath('league.leaguePoints', 0)
            ->assertJsonPath('league.pointsToNextTier', LeagueService::PROMOTION_THRESHOLD)
            ->assertJsonPath('league.cohortSize', 1)
            ->assertJsonPath('league.currentUserRank', 1);

        $this->assertDatabaseHas('user_leagues', ['user_id' => $user->id, 'league_tier_id' => $lowestTier->id, 'league_points' => 0]);
    }

    public function test_league_works_for_a_brand_new_user_with_no_game_state_row_yet(): void
    {
        // Deliberately does NOT use makeUserWithCourse() — that helper
        // pre-creates a UserGameState row, which would mask a real bug
        // where cohortMembers()'s INNER JOIN to user_game_states silently
        // excludes a user who has never completed a lesson/trivia (the only
        // other places that lazily create that row) before ever opening the
        // leaderboard for the first time.
        $language = $this->makeLanguage();
        $user = User::factory()->create();
        $user->forceFill(['learning_language_id' => $language->id])->save();

        $this->assertDatabaseMissing('user_game_states', ['user_id' => $user->id]);

        $response = $this->actingAs($user)->getJson('/api/league')->assertOk();

        $response->assertJsonPath('league.cohortSize', 1)->assertJsonPath('league.currentUserRank', 1);
    }

    public function test_points_delta_formula_is_linear_and_symmetric_around_the_cohort_midpoint(): void
    {
        $service = new LeagueService;

        // 12-person cohort, midpoint 6.5: rank 1 earns the most, rank 12 loses the most.
        $this->assertSame(11, $service->pointsDeltaForRank(1, 12));
        $this->assertSame(-11, $service->pointsDeltaForRank(12, 12));
        $this->assertSame(1, $service->pointsDeltaForRank(6, 12));
        $this->assertSame(-1, $service->pointsDeltaForRank(7, 12));

        // 5-person cohort, midpoint 3: exact middle rank nets 0.
        $this->assertSame(4, $service->pointsDeltaForRank(1, 5));
        $this->assertSame(-4, $service->pointsDeltaForRank(5, 5));
        $this->assertSame(0, $service->pointsDeltaForRank(3, 5));

        $this->assertSame(0, $service->pointsDeltaForRank(1, 0));
    }

    public function test_tier_change_notice_is_null_when_nothing_changed(): void
    {
        $language = $this->makeLanguage();
        $user = $this->makeUserWithCourse($language);

        $response = $this->actingAs($user)->getJson('/api/league')->assertOk();

        $response->assertJsonPath('league.tierChangeNotice', null);
    }

    public function test_rollover_promotes_when_points_cross_the_threshold_and_resets_to_zero(): void
    {
        $language = $this->makeLanguage();
        $tiers = LeagueTier::orderBy('order_number')->get();
        $silver = $tiers->get(1);
        $gold = $tiers->get(2);

        // 10 users ranked by weekly_xp; midpoint 5.5 so rank 1 earns +9, rank 10 earns -9.
        $users = collect(range(1, 10))->map(fn ($i) => $this->makeUserWithCourse($language, totalXp: $i * 100, weeklyXp: $i * 10));
        $sortedDesc = $users->sortByDesc(fn (User $u) => $u->id)->values(); // rank 1 = highest weeklyXp
        $topUser = $sortedDesc->first();

        $sortedDesc->each(fn (User $u) => $this->placeInCohort($u, $silver, 1, $u->id === $topUser->id ? 92 : 10));

        $this->artisan('league:rollover', ['--force' => true])->assertExitCode(0);

        // Rank 1 (topUser): 92 + 9 = 101 >= 100 → promotes, resets to 0.
        $this->assertDatabaseHas('user_leagues', ['user_id' => $topUser->id, 'league_tier_id' => $gold->id, 'league_points' => 0]);

        foreach ($users as $user) {
            $state = UserGameState::where('user_id', $user->id)->first();
            $this->assertSame(0, $state->weekly_league_xp);
        }

        // The notice shows exactly once, then is consumed.
        $this->actingAs($topUser)->getJson('/api/league')->assertJsonPath('league.tierChangeNotice', 'promoted');
        $this->actingAs($topUser)->getJson('/api/league')->assertJsonPath('league.tierChangeNotice', null);
    }

    public function test_rollover_demotes_when_points_go_negative_and_resets_to_zero(): void
    {
        $language = $this->makeLanguage();
        $tiers = LeagueTier::orderBy('order_number')->get();
        $silver = $tiers->get(1);
        $bronze = $tiers->get(0);

        $users = collect(range(1, 10))->map(fn ($i) => $this->makeUserWithCourse($language, totalXp: $i * 100, weeklyXp: $i * 10));
        $sortedDesc = $users->sortByDesc(fn (User $u) => $u->id)->values();
        $lastUser = $sortedDesc->last(); // rank 10, weeklyPointsPreview = -9

        $sortedDesc->each(fn (User $u) => $this->placeInCohort($u, $silver, 1, $u->id === $lastUser->id ? 5 : 10));

        $this->artisan('league:rollover', ['--force' => true])->assertExitCode(0);

        // Rank 10 (lastUser): 5 + (-9) = -4 < 0 → demotes, resets to 0.
        $this->assertDatabaseHas('user_leagues', ['user_id' => $lastUser->id, 'league_tier_id' => $bronze->id, 'league_points' => 0]);

        $this->actingAs($lastUser)->getJson('/api/league')->assertJsonPath('league.tierChangeNotice', 'demoted');
        $this->actingAs($lastUser)->getJson('/api/league')->assertJsonPath('league.tierChangeNotice', null);
    }

    public function test_rollover_is_a_noop_without_force_when_already_run_this_week(): void
    {
        $language = $this->makeLanguage();
        $tier = LeagueTier::orderBy('order_number')->skip(1)->first();
        $users = collect(range(1, 10))->map(fn ($i) => $this->makeUserWithCourse($language, weeklyXp: $i * 10));
        $users->each(fn (User $u) => $this->placeInCohort($u, $tier, 1));

        $this->artisan('league:rollover')->assertExitCode(0);

        $pointsAfterFirstRun = UserLeague::orderBy('user_id')->pluck('league_points', 'user_id')->all();

        // Bump XP for someone who'd now flip the outcome, then re-run without --force.
        $users->first()->gameState()->update(['weekly_league_xp' => 9999]);
        $this->artisan('league:rollover')->assertExitCode(0);

        $pointsAfterSecondRun = UserLeague::orderBy('user_id')->pluck('league_points', 'user_id')->all();

        $this->assertSame($pointsAfterFirstRun, $pointsAfterSecondRun);
    }

    public function test_promotion_clamps_instead_of_resetting_at_the_highest_tier(): void
    {
        $language = $this->makeLanguage();
        $topTier = LeagueTier::orderBy('order_number', 'desc')->first();

        $users = collect(range(1, 10))->map(fn ($i) => $this->makeUserWithCourse($language, weeklyXp: $i * 10));
        $sortedDesc = $users->sortByDesc(fn (User $u) => $u->id)->values();
        $topScorer = $sortedDesc->first(); // rank 1, weeklyPointsPreview = +9

        $sortedDesc->each(fn (User $u) => $this->placeInCohort($u, $topTier, 1, $u->id === $topScorer->id ? 95 : 10));

        $this->artisan('league:rollover', ['--force' => true])->assertExitCode(0);

        // 95 + 9 = 104 >= 100, but there's no tier above the top one — clamp at 99, don't reset to 0.
        $this->assertDatabaseHas('user_leagues', ['user_id' => $topScorer->id, 'league_tier_id' => $topTier->id, 'league_points' => 99]);

        // A clamp isn't a real tier change — no notice should fire.
        $this->actingAs($topScorer)->getJson('/api/league')->assertJsonPath('league.tierChangeNotice', null);
    }

    public function test_demotion_clamps_at_zero_instead_of_going_negative_at_the_lowest_tier(): void
    {
        $language = $this->makeLanguage();
        $bottomTier = LeagueTier::orderBy('order_number')->first();

        $users = collect(range(1, 10))->map(fn ($i) => $this->makeUserWithCourse($language, weeklyXp: $i * 10));
        $sortedDesc = $users->sortByDesc(fn (User $u) => $u->id)->values();
        $lastScorer = $sortedDesc->last(); // rank 10, weeklyPointsPreview = -9

        $sortedDesc->each(fn (User $u) => $this->placeInCohort($u, $bottomTier, 1, $u->id === $lastScorer->id ? 3 : 10));

        $this->artisan('league:rollover', ['--force' => true])->assertExitCode(0);

        // 3 + (-9) = -6 < 0, but there's no tier below the bottom one — clamp at 0.
        $this->assertDatabaseHas('user_leagues', ['user_id' => $lastScorer->id, 'league_tier_id' => $bottomTier->id, 'league_points' => 0]);

        // A clamp isn't a real tier change — no notice should fire.
        $this->actingAs($lastScorer)->getJson('/api/league')->assertJsonPath('league.tierChangeNotice', null);
    }
}
