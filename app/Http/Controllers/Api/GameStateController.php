<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserBadge;
use App\Services\LessonProgressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class GameStateController extends Controller
{
    public function __construct(private LessonProgressService $progress) {}

    #[OA\Get(
        path: '/api/game-state',
        summary: 'Get the current user\'s hydrated game state',
        description: 'Applies any pending daily-counter reset, streak-break detection, and passive heart '
            .'regeneration before returning. Day boundaries use the user\'s own reported timezone.',
        tags: ['Game State'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Current game state',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: 'gameState',
                            properties: [
                                new OA\Property(property: 'totalXp', type: 'integer', example: 140),
                                new OA\Property(property: 'todayXp', type: 'integer', example: 30),
                                new OA\Property(property: 'streak', type: 'integer', example: 3),
                                new OA\Property(property: 'longestStreak', type: 'integer', example: 5),
                                new OA\Property(property: 'lessonsToday', type: 'integer', example: 1),
                                new OA\Property(property: 'maxLessonsInADay', type: 'integer', example: 4),
                                new OA\Property(property: 'totalLessonsCompleted', type: 'integer', example: 12),
                                new OA\Property(property: 'perfectLessons', type: 'integer', example: 5),
                                new OA\Property(property: 'unitsCompletedCount', type: 'integer', example: 2),
                                new OA\Property(property: 'gems', type: 'integer', example: 490),
                                new OA\Property(property: 'hearts', type: 'integer', example: 4),
                                new OA\Property(property: 'heartsRegenSecondsRemaining', type: 'integer', example: 420),
                                new OA\Property(property: 'infiniteHeartsActive', type: 'boolean', example: false),
                                new OA\Property(property: 'infiniteHeartsSecondsRemaining', type: 'integer', example: 0),
                                new OA\Property(property: 'maxStreakFreezes', type: 'integer', example: 1),
                                new OA\Property(property: 'streakFreezesRemaining', type: 'integer', example: 1),
                                new OA\Property(
                                    property: 'earnedBadgeIds',
                                    type: 'array',
                                    items: new OA\Items(type: 'string'),
                                    example: ['xp-first', 'lesson-first'],
                                ),
                            ],
                            type: 'object',
                        ),
                    ],
                ),
            ),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ],
    )]
    public function show(Request $request): JsonResponse
    {
        $user = $request->user();
        $state = $this->progress->hydrate($user);

        $earnedBadgeIds = UserBadge::where('user_id', $user->id)->pluck('badge_key');

        return response()->json([
            'gameState' => [
                'totalXp' => $state->total_xp,
                'todayXp' => $state->today_xp,
                'streak' => $state->streak,
                'longestStreak' => $state->longest_streak,
                'lessonsToday' => $state->lessons_today,
                'maxLessonsInADay' => $state->max_lessons_in_a_day,
                'totalLessonsCompleted' => $state->total_lessons_completed,
                'perfectLessons' => $state->perfect_lessons,
                'unitsCompletedCount' => $state->units_completed_count,
                'gems' => $state->gems,
                'hearts' => $state->hearts,
                'maxHearts' => $this->progress->effectiveMaxHearts($user),
                'heartsRegenSecondsRemaining' => $this->progress->heartsRegenSecondsRemaining($state, $user),
                'infiniteHeartsActive' => $this->progress->isInfiniteHeartsActive($state) || $this->progress->isPermanentlyUnlimitedHearts($user),
                // Permanent (Family plan) has no countdown to show; the timed
                // trivia-reward/shop-purchased buff does — see infiniteHeartsSecondsRemaining.
                'infiniteHeartsPermanent' => $this->progress->isPermanentlyUnlimitedHearts($user),
                'infiniteHeartsSecondsRemaining' => $this->progress->infiniteHeartsSecondsRemaining($state),
                'maxStreakFreezes' => $this->progress->maxStreakFreezesPerMonth($user),
                'streakFreezesRemaining' => $this->progress->streakFreezesRemaining($user, $state),
                'earnedBadgeIds' => $earnedBadgeIds,
            ],
        ]);
    }

    #[OA\Post(
        path: '/api/game-state/lose-heart',
        summary: 'Lose one heart immediately',
        description: 'Called the instant an exercise is answered incorrectly (not batched at lesson completion). Floored at 0.',
        tags: ['Game State'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Heart lost',
                content: new OA\JsonContent(properties: [
                    new OA\Property(property: 'hearts', type: 'integer', example: 3),
                    new OA\Property(property: 'heartsRegenSecondsRemaining', type: 'integer', example: 900),
                ]),
            ),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ],
    )]
    public function loseHeart(Request $request): JsonResponse
    {
        return response()->json($this->progress->loseHeart($request->user()));
    }

    #[OA\Get(
        path: '/api/game-state/activity',
        summary: 'Get the days in a given month with at least one completed lesson',
        description: 'Powers the Activity Calendar. Days are computed in the user\'s own timezone.',
        tags: ['Game State'],
        security: [['cookieAuth' => []]],
        parameters: [
            new OA\QueryParameter(name: 'year', description: 'e.g. 2026', schema: new OA\Schema(type: 'integer')),
            new OA\QueryParameter(name: 'month', description: '1-12', schema: new OA\Schema(type: 'integer')),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Active days',
                content: new OA\JsonContent(properties: [
                    new OA\Property(property: 'year', type: 'integer', example: 2026),
                    new OA\Property(property: 'month', type: 'integer', example: 7),
                    new OA\Property(
                        property: 'activeDays',
                        type: 'array',
                        items: new OA\Items(type: 'integer'),
                        example: [1, 4, 5, 6, 7, 8],
                    ),
                    new OA\Property(
                        property: 'frozenDays',
                        type: 'array',
                        items: new OA\Items(type: 'integer'),
                        example: [3],
                    ),
                ]),
            ),
            new OA\Response(response: 401, description: 'Unauthenticated'),
            new OA\Response(response: 422, description: 'Invalid year/month'),
        ],
    )]
    public function activity(Request $request): JsonResponse
    {
        $data = $request->validate([
            'year' => ['required', 'integer', 'min:2000', 'max:2100'],
            'month' => ['required', 'integer', 'min:1', 'max:12'],
        ]);

        $user = $request->user();
        $activeDays = $this->progress->activityDaysForMonth($user, $data['year'], $data['month']);
        $frozenDays = $this->progress->frozenDaysForMonth($user, $data['year'], $data['month']);

        return response()->json([
            'year' => $data['year'],
            'month' => $data['month'],
            'activeDays' => $activeDays,
            'frozenDays' => $frozenDays,
        ]);
    }
}
