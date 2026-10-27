<?php

namespace App\Services;

use App\Enums\AdPlacement;
use App\Models\Ad;
use App\Models\AdCampaign;
use Illuminate\Support\Collection;

/**
 * The order ads are played in for one placement.
 *
 * Products alternate (A B A B ...), so every product gets equal exposure, and
 * both the product order and each product's image order are reshuffled on
 * every call, so a learner sees a different sequence each visit. A product
 * with fewer images repeats its own images to keep up. The list is capped so
 * one response never grows with the size of the catalogue; with more images
 * than the cap, every call is a fresh random selection.
 */
class AdPlaylist
{
    public const MAX_ADS = 100;

    /** @return Collection<int, Ad> */
    public function for(AdPlacement $placement): Collection
    {
        $campaigns = AdCampaign::query()
            ->select(['id', 'product_name', 'link_url'])
            ->where('placement', $placement->value)
            ->where('is_active', true)
            ->with(['ads' => fn ($query) => $query
                ->select(['id', 'ad_campaign_id', 'image_path', 'image_alt'])
                ->where('is_active', true)])
            ->get()
            ->filter(fn (AdCampaign $campaign) => $campaign->ads->isNotEmpty())
            ->shuffle()
            ->values();

        if ($campaigns->isEmpty()) {
            return collect();
        }

        $images = $campaigns->map(fn (AdCampaign $campaign) => $campaign->ads->shuffle()->values());

        $rounds = min(
            $images->max(fn (Collection $list) => $list->count()),
            max(1, intdiv(self::MAX_ADS, $campaigns->count())),
        );

        $playlist = collect();

        for ($round = 0; $round < $rounds; $round++) {
            foreach ($campaigns as $index => $campaign) {
                $list = $images[$index];
                $ad = $list[$round % $list->count()];
                $ad->setRelation('campaign', $campaign);
                $playlist->push($ad);
            }
        }

        return $playlist->take(self::MAX_ADS)->values();
    }
}
