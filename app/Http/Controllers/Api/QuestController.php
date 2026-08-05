<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\LeagueService;
use App\Services\LessonProgressService;
use App\Services\QuestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class QuestController extends Controller
{
    public function __construct(
        private QuestService $quests,
        private LessonProgressService $progress,
        private LeagueService $leagues,
    ) {}

    #[OA\Get(
        path: '/api/quests/today',
        summary: "Get the current user's daily quests",
        description: 'Assigns a random set of 3 active quests for today on first call (persists for the rest of '
            ."the day), then returns each with live progress computed from the user's game state.",
        tags: ['Quests'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: "Today's quests",
                content: new OA\JsonContent(properties: [
                    new OA\Property(property: 'quests', type: 'array', items: new OA\Items(properties: [
                        new OA\Property(property: 'id', type: 'integer', example: 12),
                        new OA\Property(property: 'key', type: 'string', example: 'quest-2-lessons'),
                        new OA\Property(property: 'title', type: 'string', example: 'Quick Study'),
                        new OA\Property(property: 'description', type: 'string', example: 'Complete 2 lessons today'),
                        new OA\Property(property: 'targetCount', type: 'integer', example: 2),
                        new OA\Property(property: 'progress', type: 'integer', example: 1),
                        new OA\Property(property: 'gemsReward', type: 'integer', example: 20),
                        new OA\Property(property: 'xpReward', type: 'integer', example: 0),
                        new OA\Property(property: 'completed', type: 'boolean', example: false),
                        new OA\Property(property: 'claimed', type: 'boolean', example: false),
                    ], type: 'object')),
                ]),
            ),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ],
    )]
    public function today(Request $request): JsonResponse
    {
        $user = $request->user();
        $state = $this->progress->hydrate($user);

        return response()->json(['quests' => $this->quests->todayForUser($user, $state)->values()]);
    }

    #[OA\Post(
        path: '/api/quests/{userDailyQuest}/claim',
        summary: 'Claim the reward for a completed daily quest',
        tags: ['Quests'],
        security: [['cookieAuth' => []]],
        parameters: [new OA\PathParameter(name: 'userDailyQuest', description: 'Today-quest assignment ID (from GET /api/quests/today)', schema: new OA\Schema(type: 'integer'))],
        responses: [
            new OA\Response(response: 200, description: 'Reward claimed', content: new OA\JsonContent(properties: [
                new OA\Property(property: 'gems', type: 'integer', example: 20),
                new OA\Property(property: 'xp', type: 'integer', example: 0),
            ])),
            new OA\Response(response: 404, description: 'Quest assignment not found for this user'),
            new OA\Response(response: 422, description: 'Not completed yet, or already claimed'),
        ],
    )]
    public function claim(Request $request, int $userDailyQuest): JsonResponse
    {
        $user = $request->user();
        $result = $this->quests->claim($user, $userDailyQuest);

        // A quest that awards XP counts as earning XP this week, which enrols
        // the user into the league (no-op if already in). Gems-only quests
        // don't — league standings are XP-based.
        if (($result['xp'] ?? 0) > 0) {
            $this->leagues->ensureEnrolled($user);
        }

        return response()->json($result);
    }
}
