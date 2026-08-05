<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\BadgeTier;
use App\Models\UserBadge;
use App\Support\Sluggable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BadgeController extends Controller
{
    public function index(): View
    {
        $counts = UserBadge::query()
            ->selectRaw('badge_key, count(*) as awarded_count')
            ->groupBy('badge_key')
            ->pluck('awarded_count', 'badge_key');

        return view('admin.badges.index', [
            'badges' => Badge::orderBy('category')->orderBy('order_number')->get(),
            'counts' => $counts,
            'totalAwards' => $counts->sum(),
        ]);
    }

    public function create(): View
    {
        return view('admin.badges.create', ['tiers' => BadgeTier::orderBy('order_number')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['key'] = Sluggable::unique('badges', 'key', $data['title']);

        Badge::create($data);

        return redirect()->route('admin.badges.index')->with('status', 'Badge created.');
    }

    public function edit(Badge $badge): View
    {
        return view('admin.badges.edit', ['badge' => $badge, 'tiers' => BadgeTier::orderBy('order_number')->get()]);
    }

    public function update(Request $request, Badge $badge): RedirectResponse
    {
        $badge->update($this->validateData($request, $badge));

        return redirect()->route('admin.badges.index')->with('status', 'Badge updated.');
    }

    public function destroy(Badge $badge): RedirectResponse
    {
        $badge->delete();

        return redirect()->route('admin.badges.index')->with('status', 'Badge deleted.');
    }

    private function validateData(Request $request, ?Badge $badge = null): array
    {
        $data = $request->validate([
            'category' => ['required', Rule::in(Badge::CATEGORIES)],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'tier' => ['required', Rule::exists('badge_tiers', 'name')],
            'requirement_type' => ['required', Rule::in(Badge::REQUIREMENT_TYPES)],
            'requirement_value' => ['required', 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
            'order_number' => ['required', 'integer', 'min:0'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
