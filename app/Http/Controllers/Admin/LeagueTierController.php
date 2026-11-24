<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\LeagueTier;
use App\Models\UserLeague;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LeagueTierController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(): View
    {
        $tiers = LeagueTier::orderBy('order_number')->get();
        $usageCounts = UserLeague::selectRaw('league_tier_id, count(*) as count')->groupBy('league_tier_id')->pluck('count', 'league_tier_id');

        return view('admin.league-tiers.index', ['tiers' => $tiers, 'usageCounts' => $usageCounts]);
    }

    public function create(Request $request): View
    {
        $nextOrder = (int) (LeagueTier::max('order_number') ?? 0) + 1;

        return view('admin.league-tiers.create', ['nextOrder' => $nextOrder, 'return' => $this->returnUrl($request)]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('leagues', 'public');
        }

        $tier = LeagueTier::create($data);

        return $this->backTo($request, 'admin.league-tiers.index', "League \"{$tier->name}\" added.");
    }

    public function edit(Request $request, LeagueTier $league_tier): View
    {
        return view('admin.league-tiers.edit', ['tier' => $league_tier, 'return' => $this->returnUrl($request)]);
    }

    public function update(Request $request, LeagueTier $league_tier): RedirectResponse
    {
        $data = $this->validateData($request, $league_tier);
        $oldImage = $league_tier->image_path;

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('leagues', 'public');
        } elseif ($request->boolean('remove_image')) {
            $data['image_path'] = null;
        }

        $league_tier->update($data);

        if ($oldImage && $oldImage !== $league_tier->image_path) {
            Storage::disk('public')->delete($oldImage);
        }

        return $this->backTo($request, 'admin.league-tiers.index', "League \"{$league_tier->name}\" saved.");
    }

    public function destroy(Request $request, LeagueTier $league_tier): RedirectResponse
    {
        // user_leagues.league_tier_id is cascadeOnDelete, so deleting an
        // in-use tier would silently wipe every member's standing for the
        // active week. Block it and make the admin move users off first.
        $usersInTier = UserLeague::where('league_tier_id', $league_tier->id)->count();

        if ($usersInTier > 0) {
            return back()->with('error', "Can't delete the {$league_tier->name} league: {$usersInTier} ".($usersInTier === 1 ? 'learner is' : 'learners are')." in it this week.");
        }

        $league_tier->delete();

        if ($league_tier->image_path) {
            Storage::disk('public')->delete($league_tier->image_path);
        }

        return $this->backTo($request, 'admin.league-tiers.index', "League \"{$league_tier->name}\" deleted.");
    }

    private function validateData(Request $request, ?LeagueTier $tier = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50', Rule::unique('league_tiers', 'name')->ignore($tier?->id)],
            'order_number' => ['required', 'integer', 'min:0'],
            'promotion_gems' => ['required', 'integer', 'min:0'],
            'promotion_xp' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:1024'],
            'remove_image' => ['sometimes', 'boolean'],
        ], [
            'image.image' => 'The league picture must be an image.',
            'image.mimes' => 'The league picture must be a PNG, JPG or WEBP file.',
            'image.max' => 'The league picture must be 1 MB or smaller.',
            'image.uploaded' => 'The league picture could not be uploaded. Try a smaller file.',
        ]);

        unset($data['image'], $data['remove_image']);

        return $data;
    }
}
