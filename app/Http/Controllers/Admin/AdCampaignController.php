<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdPlacement;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdCampaign;
use App\Models\AdEvent;
use App\Models\AdSetting;
use App\Services\AdImageOptimizer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

/**
 * Ads, managed by product: the admin enters a product's name, link and
 * placement once and uploads any number of images for it, five at a time.
 *
 * The add and edit pages compress images in the browser and submit with
 * fetch, so store() and update() answer JSON to those requests (validation
 * errors come back as Laravel's usual 422) and a normal redirect otherwise.
 */
class AdCampaignController extends Controller
{
    /** Images accepted in one request. Larger batches hit the host's POST size limit. */
    public const MAX_IMAGES_PER_UPLOAD = 5;

    public function index(): View
    {
        $campaigns = AdCampaign::with('ads')->orderBy('product_name')->get();

        // This month's views and clicks per image, folded into per-product totals.
        $counts = AdEvent::query()
            ->where('created_at', '>=', now()->startOfMonth())
            ->selectRaw('ad_id, type, COUNT(*) as total')
            ->groupBy('ad_id', 'type')
            ->get()
            ->groupBy('ad_id');

        $monthly = $campaigns->mapWithKeys(fn (AdCampaign $campaign) => [
            $campaign->id => [
                'views' => $campaign->ads->sum(fn (Ad $ad) => (int) ($counts[$ad->id] ?? collect())->firstWhere('type', AdEvent::VIEW)?->total),
                'clicks' => $campaign->ads->sum(fn (Ad $ad) => (int) ($counts[$ad->id] ?? collect())->firstWhere('type', AdEvent::CLICK)?->total),
            ],
        ]);

        return view('admin.ads.index', [
            'placements' => AdPlacement::cases(),
            'campaignsByPlacement' => $campaigns->groupBy(fn (AdCampaign $campaign) => $campaign->placement->value),
            'monthly' => $monthly,
            'monthName' => now()->format('F'),
            'adSetting' => AdSetting::current(),
        ]);
    }

    public function create(Request $request): View
    {
        $placement = AdPlacement::tryFrom((string) $request->query('placement')) ?? AdPlacement::HomeSidebar;

        return view('admin.ads.form', [
            'campaign' => new AdCampaign(['placement' => $placement, 'is_active' => true]),
            'placements' => AdPlacement::cases(),
        ]);
    }

    public function store(Request $request, AdImageOptimizer $optimizer): JsonResponse|RedirectResponse
    {
        $data = $request->validate([
            'placement' => ['required', Rule::enum(AdPlacement::class)],
            ...$this->detailRules(),
            ...$this->imageRules(required: true),
        ], $this->messages());

        $campaign = AdCampaign::create([
            'placement' => $data['placement'],
            'product_name' => $data['product_name'],
            'link_url' => $data['link_url'],
            'is_active' => $request->boolean('is_active'),
        ]);

        $count = $this->storeImages($campaign, $request->file('images', []), $optimizer);

        return $this->saved($request, "Ad \"{$campaign->product_name}\" created with {$count} ".str('image')->plural($count).'.');
    }

    public function edit(AdCampaign $adCampaign): View
    {
        $adCampaign->load('ads');

        return view('admin.ads.form', [
            'campaign' => $adCampaign,
            'placements' => AdPlacement::cases(),
        ]);
    }

    /** POST rather than PUT: PHP does not parse multipart bodies on PUT. */
    public function update(Request $request, AdCampaign $adCampaign, AdImageOptimizer $optimizer): JsonResponse|RedirectResponse
    {
        $data = $request->validate([
            ...$this->detailRules(),
            ...$this->imageRules(required: false),
        ], $this->messages());

        $adCampaign->update([
            'product_name' => $data['product_name'],
            'link_url' => $data['link_url'],
            'is_active' => $request->boolean('is_active'),
        ]);

        $count = $this->storeImages($adCampaign, $request->file('images', []), $optimizer);

        $message = "Ad \"{$adCampaign->product_name}\" updated".($count ? " and {$count} ".str('image')->plural($count).' added' : '').'.';

        return $this->saved($request, $message);
    }

    public function destroy(AdCampaign $adCampaign): RedirectResponse
    {
        foreach ($adCampaign->ads as $ad) {
            Storage::disk('public')->delete($ad->image_path);
        }

        // Images and their view/click events go with it (cascading keys).
        $adCampaign->delete();

        return redirect()->route('admin.ads.index')->with('status', "Ad \"{$adCampaign->product_name}\" deleted.");
    }

    /** Shows or hides a whole product. */
    public function toggle(AdCampaign $adCampaign): RedirectResponse
    {
        $adCampaign->update(['is_active' => ! $adCampaign->is_active]);

        return back()->with('status', "\"{$adCampaign->product_name}\" is now ".($adCampaign->is_active ? 'showing' : 'hidden').'.');
    }

    /** Shows or hides a single image. */
    public function toggleImage(Ad $ad): RedirectResponse
    {
        $ad->update(['is_active' => ! $ad->is_active]);

        return back()->with('status', 'Image '.($ad->is_active ? 'turned on' : 'turned off').'.');
    }

    public function destroyImage(Ad $ad): RedirectResponse
    {
        Storage::disk('public')->delete($ad->image_path);
        $ad->delete();

        return back()->with('status', 'Image deleted.');
    }

    /** @return array<string, array<int, mixed>> */
    private function detailRules(): array
    {
        return [
            'product_name' => ['required', 'string', 'max:120'],
            // http/https only, so a javascript: link can never be stored.
            'link_url' => ['required', 'url:http,https', 'max:2048'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }

    /** @return array<string, array<int, mixed>> */
    private function imageRules(bool $required): array
    {
        return [
            'images' => [$required ? 'required' : 'nullable', 'array', 'max:'.self::MAX_IMAGES_PER_UPLOAD],
            'images.*' => ['file', 'mimes:jpg,jpeg,png,webp', 'max:5120', 'dimensions:max_width=4000,max_height=4000'],
        ];
    }

    /** @return array<string, string> */
    private function messages(): array
    {
        return [
            'link_url.url' => 'The web link must start with http:// or https://.',
            'images.max' => 'Only '.self::MAX_IMAGES_PER_UPLOAD.' images can be uploaded at a time.',
            'images.*.dimensions' => 'Images can be at most 4000 by 4000 pixels.',
            'images.*.max' => 'Each image must be 5 MB or smaller.',
        ];
    }

    /**
     * Optimizes and stores each image, appending after the campaign's last
     * position so earlier uploads keep their place.
     *
     * @param  array<int, \Illuminate\Http\UploadedFile>  $files
     */
    private function storeImages(AdCampaign $campaign, array $files, AdImageOptimizer $optimizer): int
    {
        $position = (int) $campaign->ads()->max('position');

        foreach ($files as $file) {
            $campaign->ads()->create([
                'image_path' => $optimizer->store($file, $campaign->placement),
                'image_alt' => $campaign->product_name,
                'position' => ++$position,
                'is_active' => true,
            ]);
        }

        return count($files);
    }

    private function saved(Request $request, string $message): JsonResponse|RedirectResponse
    {
        session()->flash('status', $message);

        $redirect = route('admin.ads.index');

        return $request->expectsJson()
            ? response()->json(['success' => true, 'redirect' => $redirect])
            : redirect($redirect);
    }
}
