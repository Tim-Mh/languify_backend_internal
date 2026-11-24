<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\BadgeTier;
use App\Models\UserBadge;
use App\Support\Sluggable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BadgeController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        $counts = UserBadge::query()
            ->selectRaw('badge_key, count(*) as awarded_count')
            ->groupBy('badge_key')
            ->pluck('awarded_count', 'badge_key');

        return view('admin.badges.index', [
            'badges' => Badge::orderBy('category')->orderBy('order_number')->get(),
            'tiers' => BadgeTier::orderBy('order_number')->orderBy('id')->get(),
            'tierUsage' => Badge::selectRaw('tier, count(*) as badge_count')->groupBy('tier')->pluck('badge_count', 'tier'),
            'counts' => $counts,
            'totalAwards' => $counts->sum(),
        ]);
    }

    public function create(Request $request): View
    {
        $category = in_array($request->query('category'), Badge::CATEGORIES, true) ? $request->query('category') : null;

        return view('admin.badges.create', [
            'defaults' => [
                'category' => $category,
                'order_number' => (int) Badge::when($category, fn ($q) => $q->where('category', $category))->max('order_number') + 1,
            ],
            'tiers' => BadgeTier::names(),
            'return' => $this->returnUrl($request),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['key'] = Sluggable::unique('badges', 'key', $data['title']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('badges', 'public');
        }

        $badge = Badge::create($data);

        return $this->backTo($request, 'admin.badges.index', "Badge \"{$badge->title}\" added.");
    }

    public function edit(Request $request, Badge $badge): View
    {
        return view('admin.badges.edit', [
            'badge' => $badge,
            'awardedCount' => UserBadge::where('badge_key', $badge->key)->count(),
            'tiers' => BadgeTier::names(),
            'return' => $this->returnUrl($request),
        ]);
    }

    public function update(Request $request, Badge $badge): RedirectResponse
    {
        $data = $this->validateData($request, $badge);
        $oldImage = $badge->image_path;

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('badges', 'public');
        } elseif ($request->boolean('remove_image')) {
            $data['image_path'] = null;
        }

        $badge->update($data);

        if ($oldImage && $oldImage !== $badge->image_path) {
            Storage::disk('public')->delete($oldImage);
        }

        return $this->backTo($request, 'admin.badges.index', "Badge \"{$badge->title}\" saved.");
    }

    public function destroy(Request $request, Badge $badge): RedirectResponse
    {
        $badge->delete();

        if ($badge->image_path) {
            Storage::disk('public')->delete($badge->image_path);
        }

        return $this->backTo($request, 'admin.badges.index', "Badge \"{$badge->title}\" deleted.");
    }

    private function validateData(Request $request, ?Badge $badge = null): array
    {
        $data = $request->validate([
            'category' => ['required', Rule::in(Badge::CATEGORIES)],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'tier' => ['required', Rule::exists('badge_tiers', 'name')],
            'gems_reward' => ['required', 'integer', 'min:0', 'max:100000'],
            'xp_reward' => ['required', 'integer', 'min:0', 'max:100000'],
            'hearts_reward' => ['required', 'integer', 'min:0', 'max:100'],
            'requirement_type' => ['required', Rule::in(Badge::REQUIREMENT_TYPES)],
            'requirement_value' => ['required', 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
            'order_number' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:1024'],
            'remove_image' => ['sometimes', 'boolean'],
        ], [
            'image.image' => 'The badge picture must be an image.',
            'image.mimes' => 'The badge picture must be a PNG, JPG or WEBP file.',
            'image.max' => 'The badge picture must be 1 MB or smaller.',
            'image.uploaded' => 'The badge picture could not be uploaded. Try a smaller file.',
        ]);

        unset($data['image'], $data['remove_image']);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
