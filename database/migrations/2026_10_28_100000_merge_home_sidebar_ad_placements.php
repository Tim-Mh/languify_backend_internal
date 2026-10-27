<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

/**
 * The home sidebar's top and bottom cards now share one list of ads instead
 * of two, and the admin sets how long each sidebar ad stays up.
 *
 * Existing top/bottom campaigns move into the shared placement. A product that
 * had a campaign in both is folded into one. The same picture uploaded to both
 * slots is kept once (compared by file contents), with the duplicate's views
 * and clicks moved onto the copy that stays.
 */
return new class extends Migration
{
    private const OLD = ['home_primary', 'home_secondary'];

    private const NEW = 'home_sidebar';

    public function up(): void
    {
        Schema::table('ad_settings', function (Blueprint $table) {
            $table->unsignedInteger('sidebar_seconds')->default(5)->after('interstitial_seconds');
        });

        DB::transaction(function () {
            DB::table('ad_campaigns')->whereIn('placement', self::OLD)->update(['placement' => self::NEW]);
            DB::table('ad_events')->whereIn('placement', self::OLD)->update(['placement' => self::NEW]);

            $byProduct = DB::table('ad_campaigns')->where('placement', self::NEW)->orderBy('id')->get()
                ->groupBy(fn ($campaign) => mb_strtolower(preg_replace('/\s+/u', '', $campaign->product_name)));

            $disk = Storage::disk('public');
            $hash = fn (string $path) => $disk->exists($path) ? md5($disk->get($path)) : 'missing:'.$path;

            foreach ($byProduct as $campaigns) {
                $keep = $campaigns->shift();
                $kept = DB::table('ads')->where('ad_campaign_id', $keep->id)->get(['id', 'image_path'])
                    ->mapWithKeys(fn ($ad) => [$hash($ad->image_path) => $ad->id]);
                $position = (int) DB::table('ads')->where('ad_campaign_id', $keep->id)->max('position');

                foreach ($campaigns as $duplicate) {
                    foreach (DB::table('ads')->where('ad_campaign_id', $duplicate->id)->orderBy('position')->get(['id', 'image_path']) as $ad) {
                        $key = $hash($ad->image_path);

                        if ($kept->has($key)) {
                            DB::table('ad_events')->where('ad_id', $ad->id)->update(['ad_id' => $kept[$key]]);
                            DB::table('ads')->where('id', $ad->id)->delete();
                            $disk->delete($ad->image_path);

                            continue;
                        }

                        DB::table('ads')->where('id', $ad->id)->update(['ad_campaign_id' => $keep->id, 'position' => ++$position]);
                        $kept[$key] = $ad->id;
                    }

                    DB::table('ad_campaigns')->where('id', $duplicate->id)->delete();
                }
            }
        });
    }

    public function down(): void
    {
        // The merged campaigns cannot be split back apart; they return as top-slot ads.
        DB::table('ad_campaigns')->where('placement', self::NEW)->update(['placement' => self::OLD[0]]);
        DB::table('ad_events')->where('placement', self::NEW)->update(['placement' => self::OLD[0]]);

        Schema::table('ad_settings', function (Blueprint $table) {
            $table->dropColumn('sidebar_seconds');
        });
    }
};
