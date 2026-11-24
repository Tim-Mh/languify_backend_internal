<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\BadgeTier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Adds and deletes badge tiers from the card at the top of the Badges page.
 * A tier is only a name and a position; rewards are set on each badge.
 */
class BadgeTierController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->merge(['name' => strtoupper(trim((string) $request->input('name')))]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:badge_tiers,name'],
        ], [
            'name.required' => 'Type a name for the new tier.',
            'name.unique' => 'There is already a tier with that name.',
            'name.max' => 'Tier names can be at most 50 characters.',
        ]);

        BadgeTier::create([
            'name' => $data['name'],
            'order_number' => (int) BadgeTier::max('order_number') + 1,
        ]);

        return back()->with('status', 'Tier "'.ucfirst(strtolower($data['name'])).'" added.');
    }

    public function destroy(BadgeTier $badgeTier): RedirectResponse
    {
        $label = ucfirst(strtolower($badgeTier->name));
        $used = Badge::where('tier', $badgeTier->name)->count();

        if ($used > 0) {
            return back()->with('error', "Tier \"{$label}\" is used by {$used} ".($used === 1 ? 'badge' : 'badges').'. Move them to another tier first, then delete it.');
        }

        $badgeTier->delete();

        return back()->with('status', "Tier \"{$label}\" deleted.");
    }
}
