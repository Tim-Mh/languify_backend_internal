<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeagueTier;
use App\Models\UserLeague;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LeagueTierController extends Controller
{
    public function index(): View
    {
        $tiers = LeagueTier::orderBy('order_number')->get();
        $usageCounts = UserLeague::selectRaw('league_tier_id, count(*) as count')->groupBy('league_tier_id')->pluck('count', 'league_tier_id');

        return view('admin.league-tiers.index', ['tiers' => $tiers, 'usageCounts' => $usageCounts]);
    }

    public function create(): View
    {
        $nextOrder = (int) (LeagueTier::max('order_number') ?? 0) + 1;

        return view('admin.league-tiers.create', ['nextOrder' => $nextOrder]);
    }

    public function store(Request $request): RedirectResponse
    {
        LeagueTier::create($this->validateData($request));

        return redirect()->route('admin.league-tiers.index')->with('status', 'League tier created.');
    }

    public function edit(LeagueTier $league_tier): View
    {
        return view('admin.league-tiers.edit', ['tier' => $league_tier]);
    }

    public function update(Request $request, LeagueTier $league_tier): RedirectResponse
    {
        $league_tier->update($this->validateData($request, $league_tier));

        return redirect()->route('admin.league-tiers.index')->with('status', 'League tier updated.');
    }

    public function destroy(LeagueTier $league_tier): RedirectResponse
    {
        // user_leagues.league_tier_id is cascadeOnDelete, so deleting an
        // in-use tier would silently wipe every member's standing for the
        // active week. Block it and make the admin move users off first.
        $usersInTier = UserLeague::where('league_tier_id', $league_tier->id)->count();

        if ($usersInTier > 0) {
            return redirect()->route('admin.league-tiers.index')
                ->with('error', "Can't delete this tier — {$usersInTier} user(s) are currently in it. Move them out first.");
        }

        $league_tier->delete();

        return redirect()->route('admin.league-tiers.index')->with('status', 'League tier deleted.');
    }

    private function validateData(Request $request, ?LeagueTier $tier = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:50', Rule::unique('league_tiers', 'name')->ignore($tier?->id)],
            'order_number' => ['required', 'integer', 'min:0'],
            'promotion_gems' => ['required', 'integer', 'min:0'],
            'promotion_xp' => ['required', 'integer', 'min:0'],
        ]);
    }
}
