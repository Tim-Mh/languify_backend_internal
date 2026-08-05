<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Services\LessonProgressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class BadgeController extends Controller
{
    public function __construct(private LessonProgressService $progress) {}

    #[OA\Post(
        path: '/api/badges/{badgeKey}/claim',
        summary: 'Claim an earned badge and receive its tier reward',
        description: 'Fails (422) if the badge is already claimed or the requirement is not yet met. Returns the gems/XP/hearts awarded.',
        tags: ['Badges'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(response: 200, description: 'Badge claimed; reward returned'),
            new OA\Response(response: 422, description: 'Already claimed or not yet earned'),
        ],
    )]
    public function claim(Request $request, string $badgeKey): JsonResponse
    {
        $badge = Badge::where('key', $badgeKey)->where('is_active', true)->firstOrFail();

        $reward = $this->progress->claimBadge($request->user(), $badge);

        return response()->json([
            'badgeKey' => $badge->key,
            'reward' => $reward,
        ]);
    }
}
