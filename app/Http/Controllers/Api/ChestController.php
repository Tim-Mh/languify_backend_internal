<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Services\ChestService;
use App\Services\LessonProgressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class ChestController extends Controller
{
    public function __construct(
        private ChestService $chests,
        private LessonProgressService $progress,
    ) {}

    #[OA\Get(
        path: '/api/chests/status',
        summary: 'Get daily and streak chest availability',
        tags: ['Chests'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(
            response: 200,
            description: 'Chest availability',
            content: new OA\JsonContent(properties: [
                new OA\Property(property: 'daily', properties: [
                    new OA\Property(property: 'available', type: 'boolean'),
                    new OA\Property(property: 'cooldownSeconds', type: 'integer', example: 0),
                ], type: 'object'),
                new OA\Property(property: 'streak', properties: [
                    new OA\Property(property: 'unclaimedMilestone', type: 'object', nullable: true),
                ], type: 'object'),
            ]),
        )],
    )]
    public function status(Request $request): JsonResponse
    {
        $user = $request->user();
        $state = $this->progress->hydrate($user);

        return response()->json([
            'daily' => [
                'available' => $this->chests->isDailyChestAvailable($state),
                'cooldownSeconds' => $this->chests->dailyChestCooldownSeconds($state),
            ],
            'streak' => [
                'unclaimedMilestone' => $this->progress->unclaimedStreakMilestone($user, $state),
            ],
        ]);
    }

    #[OA\Post(
        path: '/api/chests/daily/claim',
        summary: 'Claim the daily chest',
        description: 'Unlocks 24 hours after the previous claim (no XP requirement). Grants a random 10-20 gems.',
        tags: ['Chests'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(response: 200, description: 'Reward granted'),
            new OA\Response(response: 422, description: 'Still on cooldown'),
        ],
    )]
    public function claimDaily(Request $request): JsonResponse
    {
        $reward = $this->chests->claimDaily($request->user());

        return response()->json(['reward' => $reward]);
    }

    #[OA\Post(
        path: '/api/chests/streak/claim',
        summary: 'Claim the earliest unclaimed streak milestone chest',
        description: 'Milestones: 3/7/30/100/365 days, each claimable once.',
        tags: ['Chests'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(response: 200, description: 'Reward granted'),
            new OA\Response(response: 422, description: 'No unclaimed milestone available'),
        ],
    )]
    public function claimStreak(Request $request): JsonResponse
    {
        $reward = $this->chests->claimStreak($request->user());

        return response()->json(['reward' => $reward]);
    }

    #[OA\Post(
        path: '/api/chests/unit-bonus/claim',
        summary: 'Claim a unit\'s bonus chest',
        description: 'Available once the unit\'s first lesson is completed. Grants random gems/XP/hearts.',
        tags: ['Chests'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['unitId'],
            properties: [new OA\Property(property: 'unitId', type: 'integer', example: 44)],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Reward granted'),
            new OA\Response(response: 403, description: 'Unit does not belong to the user\'s selected course'),
            new OA\Response(response: 422, description: 'Chest not available (already claimed or first lesson not done)'),
        ],
    )]
    public function claimUnitBonus(Request $request): JsonResponse
    {
        $data = $request->validate([
            'unitId' => ['required', 'integer', 'exists:units,id'],
        ]);

        $user = $request->user();
        $unit = Unit::with('chapter')->findOrFail($data['unitId']);

        if ($unit->chapter->language_id !== $user->learning_language_id) {
            abort(403, 'This content does not belong to your selected course.');
        }

        $reward = $this->chests->claimUnitBonus($user, $unit);

        return response()->json(['reward' => $reward]);
    }
}
