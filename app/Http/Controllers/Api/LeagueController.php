<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LeagueTier;
use App\Models\User;
use App\Services\LeagueService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class LeagueController extends Controller
{
    public function __construct(private LeagueService $leagues) {}

    #[OA\Get(
        path: '/api/league',
        summary: 'Get the current user\'s league standing',
        description: 'Global (not per-course) weekly leaderboard. Requires a course to be selected first, same gate as Trivia, even though leagues themselves aren\'t course-scoped.',
        tags: ['League'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(response: 200, description: 'League standing'),
            new OA\Response(response: 422, description: 'No course selected yet'),
        ],
    )]
    public function show(Request $request): JsonResponse
    {
        $user = $this->requireCourseSelected($request);

        // Viewing the board must NOT enrol you — you join by earning XP (see
        // LeagueService::ensureEnrolled). Anyone who hasn't earned XP yet this
        // week has no membership row and gets a "do a lesson to join" state.
        $league = $this->leagues->currentLeagueFor($user);

        if (! $league) {
            $lowestTier = LeagueTier::orderBy('order_number')->first();
            $nextRollover = $this->leagues->currentWeekStart()->addWeek();

            return response()->json([
                'league' => [
                    'enrolled' => false,
                    'tierName' => $lowestTier?->name,
                    'secondsUntilRollover' => max(0, (int) now()->diffInSeconds($nextRollover)),
                    'members' => [],
                ],
            ]);
        }

        $league->loadMissing('leagueTier');

        // One-shot: read whatever the last rollover left, then immediately
        // clear it so this notice only ever surfaces on the very next visit.
        $tierChangeNotice = $league->pending_tier_change;
        if ($tierChangeNotice) {
            $league->forceFill(['pending_tier_change' => null])->save();
        }

        $tiers = LeagueTier::orderBy('order_number')->get();
        $tier = $league->leagueTier;
        $isHighestTier = $tier->order_number === $tiers->max('order_number');

        $members = $this->leagues->cohortMembers($league);
        $cohortSize = $members->count();

        $currentUserRank = null;

        $formattedMembers = $members->values()->map(function ($member, $index) use ($user, &$currentUserRank) {
            $rank = $index + 1;
            $isCurrentUser = $member->user_id === $user->id;

            if ($isCurrentUser) {
                $currentUserRank = $rank;
            }

            return [
                'userId' => $member->user_id,
                'fullName' => $member->full_name,
                'weeklyXp' => $member->weekly_league_xp,
                'rank' => $rank,
                'isCurrentUser' => $isCurrentUser,
                'avatar' => [
                    'skinColor' => $member->skin_color,
                    'hair' => $member->hair,
                    'hairColor' => $member->hair_color,
                    'eyes' => $member->eyes,
                    'eyebrows' => $member->eyebrows,
                    'mouth' => $member->mouth,
                    'glasses' => $member->glasses,
                    'earrings' => $member->earrings,
                    'backgroundColor' => $member->background_color,
                ],
            ];
        });

        $nextRollover = $this->leagues->currentWeekStart()->addWeek();

        return response()->json([
            'league' => [
                'enrolled' => true,
                'tierName' => $tier->name,
                'tierOrderNumber' => $tier->order_number,
                'isLowestTier' => $tier->order_number === $tiers->min('order_number'),
                'isHighestTier' => $isHighestTier,
                'leaguePoints' => $league->league_points,
                'pointsToNextTier' => $isHighestTier ? null : LeagueService::PROMOTION_THRESHOLD - $league->league_points,
                'tierChangeNotice' => $tierChangeNotice,
                'weekStartDate' => $league->week_start_date->toDateString(),
                'secondsUntilRollover' => max(0, (int) now()->diffInSeconds($nextRollover)),
                'cohortSize' => $cohortSize,
                'currentUserRank' => $currentUserRank,
                'members' => $formattedMembers,
            ],
        ]);
    }

    private function requireCourseSelected(Request $request): User
    {
        $user = $request->user();

        abort_if(! $user->learning_language_id, 422, 'Please select a course first.');

        return $user;
    }
}
