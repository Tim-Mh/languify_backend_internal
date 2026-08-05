<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdPlacement;
use App\Http\Controllers\Controller;
use App\Models\AdImage;
use App\Models\AdSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdImageController extends Controller
{
    public function index(): View
    {
        // Grouped rather than paginated: there are only a handful of placements
        // to manage and an admin needs to see, at a glance, which ones are empty
        // (an empty placement silently shows no ad at all).
        //
        // Then grouped again by surface, so the mobile app's placements are
        // their own section of the page. They take a differently shaped creative
        // from the website's, and mixing them in one flat list is how a
        // landscape banner ends up assigned to a full-screen portrait slot.
        return view('admin.ad-images.index', [
            'adImagesByPlacement' => AdImage::orderBy('order_number')->orderBy('id')->get()
                ->groupBy(fn (AdImage $image) => $image->placement->value),
            'placementsBySurface' => collect(AdPlacement::cases())
                ->groupBy(fn (AdPlacement $placement) => $placement->surface()),
            'adSetting' => AdSetting::current(),
        ]);
    }

    public function create(): View
    {
        return view('admin.ad-images.create', ['placements' => AdPlacement::options()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request, imageRequired: true);
        $data['image_path'] = $request->file('image')->store('ad-images', 'public');

        AdImage::create($data);

        return redirect()->route('admin.ad-images.index')->with('status', 'Ad image created.');
    }

    public function edit(AdImage $ad_image): View
    {
        return view('admin.ad-images.edit', [
            'ad_image' => $ad_image,
            'placements' => AdPlacement::options(),
        ]);
    }

    public function update(Request $request, AdImage $ad_image): RedirectResponse
    {
        $data = $this->validateData($request, imageRequired: false);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($ad_image->image_path);
            $data['image_path'] = $request->file('image')->store('ad-images', 'public');
        }

        $ad_image->update($data);

        return redirect()->route('admin.ad-images.index')->with('status', 'Ad image updated.');
    }

    public function destroy(AdImage $ad_image): RedirectResponse
    {
        Storage::disk('public')->delete($ad_image->image_path);
        $ad_image->delete();

        return redirect()->route('admin.ad-images.index')->with('status', 'Ad image deleted.');
    }

    private function validateData(Request $request, bool $imageRequired): array
    {
        $data = $request->validate([
            'image' => [$imageRequired ? 'required' : 'nullable', 'image', 'max:4096'],
            // Capped short because it renders as a one-line caption in a 300px
            // sidebar slot, where anything longer just truncates.
            'product_name' => ['nullable', 'string', 'max:60'],
            'placement' => ['required', Rule::enum(AdPlacement::class)],
            'target_url' => ['nullable', 'url', 'max:2048'],
            'order_number' => ['required', 'integer', 'min:1'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        unset($data['image']);
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
