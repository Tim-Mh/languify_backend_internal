<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\BadgeTier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BadgeTierController extends Controller
{
    public function index(): View
    {
        $tiers = BadgeTier::orderBy('order_number')->get();
        $usageCounts = Badge::selectRaw('tier, count(*) as count')->groupBy('tier')->pluck('count', 'tier');

        return view('admin.badge-tiers.index', ['tiers' => $tiers, 'usageCounts' => $usageCounts]);
    }

    public function create(): View
    {
        $nextOrder = (int) (BadgeTier::max('order_number') ?? 0) + 1;

        return view('admin.badge-tiers.create', ['nextOrder' => $nextOrder]);
    }

    public function store(Request $request): RedirectResponse
    {
        BadgeTier::create($this->validateData($request));

        return redirect()->route('admin.badge-tiers.index')->with('status', 'Badge tier created.');
    }

    public function edit(BadgeTier $badge_tier): View
    {
        return view('admin.badge-tiers.edit', ['tier' => $badge_tier]);
    }

    public function update(Request $request, BadgeTier $badge_tier): RedirectResponse
    {
        $data = $this->validateData($request, $badge_tier);
        $oldName = $badge_tier->name;

        DB::transaction(function () use ($badge_tier, $data, $oldName) {
            $badge_tier->update($data);

            // badges.tier references this tier by NAME (no FK), so a rename
            // would orphan every badge on the old name — Badge::tierReward()
            // then returns 0/0/0 and BadgeController's Rule::exists blocks
            // editing them. Cascade the rename to keep them attached.
            if ($data['name'] !== $oldName) {
                Badge::where('tier', $oldName)->update(['tier' => $data['name']]);
            }
        });

        return redirect()->route('admin.badge-tiers.index')->with('status', 'Badge tier updated.');
    }

    public function destroy(BadgeTier $badge_tier): RedirectResponse
    {
        // badges.tier references this by name with no FK/cascade, so deleting
        // an in-use tier would silently zero those badges' rewards and make
        // them unsavable. Block it and tell the admin to reassign first.
        $badgesUsingTier = Badge::where('tier', $badge_tier->name)->count();

        if ($badgesUsingTier > 0) {
            return redirect()->route('admin.badge-tiers.index')
                ->with('error', "Can't delete this tier — {$badgesUsingTier} badge(s) still use it. Reassign them to another tier first.");
        }

        $badge_tier->delete();

        return redirect()->route('admin.badge-tiers.index')->with('status', 'Badge tier deleted.');
    }

    private function validateData(Request $request, ?BadgeTier $tier = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:50', Rule::unique('badge_tiers', 'name')->ignore($tier?->id)],
            'gems_reward' => ['required', 'integer', 'min:0'],
            'xp_reward' => ['required', 'integer', 'min:0'],
            'hearts_reward' => ['required', 'integer', 'min:0'],
            'order_number' => ['required', 'integer', 'min:0'],
        ]);
    }
}
