<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeartRefillTier;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class HeartRefillTierController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.heart-refill-tiers.index', [
            'heartRefillTiers' => HeartRefillTier::orderBy('order_number')->paginate(PerPage::resolve($request))->withQueryString(),
        ]);
    }

    public function create(): View
    {
        return view('admin.heart-refill-tiers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        HeartRefillTier::create($this->validateData($request));

        return redirect()->route('admin.heart-refill-tiers.index')->with('status', 'Heart refill tier created.');
    }

    public function edit(HeartRefillTier $heart_refill_tier): View
    {
        return view('admin.heart-refill-tiers.edit', ['heart_refill_tier' => $heart_refill_tier]);
    }

    public function update(Request $request, HeartRefillTier $heart_refill_tier): RedirectResponse
    {
        $heart_refill_tier->update($this->validateData($request, $heart_refill_tier));

        return redirect()->route('admin.heart-refill-tiers.index')->with('status', 'Heart refill tier updated.');
    }

    public function destroy(HeartRefillTier $heart_refill_tier): RedirectResponse
    {
        $heart_refill_tier->delete();

        return redirect()->route('admin.heart-refill-tiers.index')->with('status', 'Heart refill tier deleted.');
    }

    private function validateData(Request $request, ?HeartRefillTier $tier = null): array
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:50', Rule::unique('heart_refill_tiers', 'key')->ignore($tier?->id)],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'hearts' => ['required', 'integer', 'min:1', 'max:5'],
            'price_gems' => ['required', 'integer', 'min:1'],
            'badge_label' => ['nullable', 'string', 'max:50'],
            'order_number' => ['required', 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
