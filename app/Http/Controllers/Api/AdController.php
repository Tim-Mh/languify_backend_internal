<?php

namespace App\Http\Controllers\Api;

use App\Enums\AdPlacement;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdEvent;
use App\Models\AdSetting;
use App\Services\AdPlaylist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class AdController extends Controller
{
    #[OA\Get(
        path: '/api/ads',
        summary: 'Get the ads to show, in play order, grouped by placement',
        description: 'Three placements: homeSidebar feeds both home-sidebar cards (neighbouring entries are '
            .'shown together), lessonComplete the card shown after a lesson on the website, mobileLessonComplete the '
            .'full-screen ad after a lesson in the app. Each list is already in play order: products '
            .'alternate and the order is reshuffled on every request, at most 100 entries, and the same ad '
            .'may appear more than once. Clients play the list in order, looping. Admins get empty lists.',
        tags: ['Ads'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Ads by placement, in play order')],
    )]
    public function index(Request $request, AdPlaylist $playlist): JsonResponse
    {
        // Admins never see ads, so nothing they do while testing the app
        // inflates the numbers on the stats page either.
        $isAdmin = $request->user()?->isAdmin() ?? false;

        $placements = [];

        foreach (AdPlacement::cases() as $placement) {
            $placements[$placement->apiKey()] = $isAdmin
                ? []
                : $playlist->for($placement)->map(fn (Ad $ad) => [
                    'id' => $ad->id,
                    'url' => $ad->url(),
                    'productName' => $ad->campaign->product_name,
                    'targetUrl' => $ad->campaign->link_url,
                    'alt' => $ad->image_alt ?: $ad->campaign->product_name,
                ])->values()->all();
        }

        return response()->json([
            'placements' => $placements,
            'settings' => [
                'interstitialSeconds' => AdSetting::current()->interstitial_seconds,
                'sidebarSeconds' => AdSetting::current()->sidebar_seconds,
            ],
        ]);
    }

    #[OA\Post(
        path: '/api/ads/{ad}/view',
        summary: 'Record that an ad was shown',
        description: 'Fire-and-forget: clients must never wait on it or surface an error. Not recorded for admins. '
            .'404 when the ad or its product is hidden.',
        tags: ['Ads'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Recorded')],
    )]
    public function view(Request $request, Ad $ad): JsonResponse
    {
        return $this->record($request, $ad, AdEvent::VIEW);
    }

    #[OA\Post(
        path: '/api/ads/{ad}/click',
        summary: 'Record that an ad was tapped',
        description: 'Fire-and-forget, like the view endpoint. Not recorded for admins. 404 when hidden.',
        tags: ['Ads'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Recorded')],
    )]
    public function click(Request $request, Ad $ad): JsonResponse
    {
        return $this->record($request, $ad, AdEvent::CLICK);
    }

    private function record(Request $request, Ad $ad, string $type): JsonResponse
    {
        $campaign = $ad->campaign;

        abort_unless($ad->is_active && $campaign?->is_active, 404);

        if (! $request->user()->isAdmin()) {
            AdEvent::create([
                'ad_id' => $ad->id,
                'type' => $type,
                'placement' => $campaign->placement->value,
                'user_id' => $request->user()->id,
            ]);
        }

        return response()->json(['success' => true]);
    }
}
