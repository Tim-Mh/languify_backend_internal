<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\Lesson;
use App\Services\LeagueService;
use App\Services\LessonProgressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class LessonProgressController extends Controller
{
    public function __construct(
        private LessonProgressService $progress,
        private LeagueService $leagues,
    ) {}

    #[OA\Post(
        path: '/api/lessons/{lesson}/complete',
        summary: 'Record a lesson completion',
        description: 'Awards XP (+ perfect bonus) on every session, advances the streak, detects unit '
            .'completion (one-time +20 XP bonus), and checks all badges — all in one DB transaction. Each '
            .'call is one "session"; a lesson is mastered after targetCompletions sessions, which unlocks the '
            .'next lesson. Hearts are NOT deducted here; they are lost in real time per mistake via POST '
            .'/api/game-state/lose-heart while the exercise is in progress.',
        tags: ['Lesson Progress'],
        security: [['cookieAuth' => []]],
        parameters: [new OA\PathParameter(name: 'lesson', description: 'Lesson ID', schema: new OA\Schema(type: 'integer'))],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['mistakes'],
            properties: [new OA\Property(property: 'mistakes', type: 'integer', minimum: 0, example: 1)],
        )),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Completion result',
                content: new OA\JsonContent(properties: [
                    new OA\Property(property: 'xpAwarded', type: 'integer', example: 30),
                    new OA\Property(property: 'unitXpAwarded', type: 'integer', example: 20),
                    new OA\Property(
                        property: 'newBadges',
                        type: 'array',
                        items: new OA\Items(properties: [
                            new OA\Property(property: 'id', type: 'string', example: 'lesson-first'),
                            new OA\Property(property: 'title', type: 'string', example: 'First Lesson'),
                            new OA\Property(property: 'description', type: 'string', example: 'Complete your very first lesson'),
                            new OA\Property(property: 'tier', type: 'string', example: 'BRONZE'),
                            new OA\Property(property: 'reward', properties: [
                                new OA\Property(property: 'gems', type: 'integer', example: 20),
                                new OA\Property(property: 'xp', type: 'integer', example: 10),
                                new OA\Property(property: 'hearts', type: 'integer', example: 1),
                            ], type: 'object'),
                        ], type: 'object'),
                    ),
                    new OA\Property(
                        property: 'streakMilestoneHit',
                        description: 'The earliest unclaimed streak milestone, if any (claim via /api/chests/streak/claim)',
                        nullable: true,
                        properties: [
                            new OA\Property(property: 'days', type: 'integer', example: 3),
                            new OA\Property(property: 'badgeId', type: 'string', example: 'streak-3'),
                            new OA\Property(property: 'gems', type: 'integer', example: 0),
                            new OA\Property(property: 'reward', type: 'string', example: 'Badge on profile'),
                        ],
                        type: 'object',
                    ),
                    new OA\Property(property: 'streak', type: 'integer', example: 1),
                    new OA\Property(property: 'totalXp', type: 'integer', example: 75),
                    new OA\Property(property: 'gems', type: 'integer', example: 440),
                    new OA\Property(property: 'hearts', type: 'integer', example: 5),
                    new OA\Property(property: 'alreadyCompletedBefore', type: 'boolean', example: false),
                ]),
            ),
            new OA\Response(response: 403, description: 'Lesson does not belong to the user\'s selected course'),
            new OA\Response(response: 422, description: 'No course selected, or validation error'),
        ],
    )]
    public function complete(Request $request, Lesson $lesson): JsonResponse
    {
        $user = $request->user();

        if (! $user->learning_language_id) {
            return response()->json(['message' => 'Please select a course first.'], 422);
        }

        $lesson->loadMissing('unit.chapter');

        if ($lesson->unit->chapter->language_id !== $user->learning_language_id) {
            abort(403, 'This content does not belong to your selected course.');
        }

        $data = $request->validate([
            'mistakes' => ['required', 'integer', 'min:0'],
        ]);

        $result = $this->progress->completeLesson($user, $lesson, $data['mistakes']);

        // Finishing a lesson always earns XP, and earning XP is the ONLY way
        // into the weekly league — enrol the user now (no-op if already in).
        $this->leagues->ensureEnrolled($user);

        return response()->json([
            'xpAwarded' => $result['xpAwarded'],
            'unitXpAwarded' => $result['unitXpAwarded'],
            'unitBonusGems' => $result['unitBonusGems'],
            'languageBonus' => $result['languageBonus'], // {xp, gems} or null
            'newBadges' => array_map(fn (array $badge) => [
                'id' => $badge['id'],
                'title' => $badge['title'],
                'description' => $badge['description'],
                'tier' => $badge['tier'],
                'reward' => Badge::tierReward($badge['tier']),
            ], $result['newBadges']),
            'streakMilestoneHit' => $result['streakMilestoneHit'],
            'streak' => $result['streak'],
            'totalXp' => $result['totalXp'],
            'gems' => $result['gems'],
            'hearts' => $result['hearts'],
            'alreadyCompletedBefore' => $result['alreadyCompletedBefore'],
            // Session progress toward mastery (fills the lesson's ring and, at
            // target, unlocks the next lesson).
            'completionsCount' => $result['completionsCount'],
            'targetCompletions' => $result['targetCompletions'],
            'mastered' => $result['mastered'],
        ]);
    }
}
