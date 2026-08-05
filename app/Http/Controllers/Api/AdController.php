<?php

namespace App\Http\Controllers\Api;

use App\Enums\AdPlacement;
use App\Http\Controllers\Controller;
use App\Models\AdImage;
use App\Models\AdSetting;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class AdController extends Controller
{
    #[OA\Get(
        path: '/api/ads',
        summary: 'Get the active admin-managed ad creatives, grouped by placement',
        description: 'Three independently managed pools: homePrimary and homeSecondary feed the two home-sidebar '
            .'slots, which rotate through their own pool every few seconds; lessonComplete feeds the interstitial '
            .'shown after a lesson session. Because the two home slots read different pools they can never show the '
            .'same creative at once. Each creative carries an optional product name (shown under the image) and an '
            .'optional click-through URL. A pool stays empty until an admin assigns a creative to that placement.',
        tags: ['Ads'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Active ad creatives by placement')],
    )]
    public function index(): JsonResponse
    {
        $byPlacement = AdImage::where('is_active', true)
            ->orderBy('order_number')
            ->orderBy('id')
            ->get()
            ->groupBy(fn (AdImage $image) => $image->placement->apiKey());

        $placements = [];

        // Emit every placement, empty ones included, so the client never has to
        // guard against a missing key.
        foreach (AdPlacement::cases() as $placement) {
            $key = $placement->apiKey();

            $placements[$key] = ($byPlacement[$key] ?? collect())
                ->map(fn (AdImage $image) => [
                    'id' => $image->id,
                    'url' => $image->url(),
                    'productName' => $image->product_name,
                    'targetUrl' => $image->target_url,
                ])
                ->values();
        }

        return response()->json([
            'placements' => $placements,
            'settings' => [
                'interstitialSeconds' => AdSetting::current()->interstitial_seconds,
            ],
        ]);
    }
}
