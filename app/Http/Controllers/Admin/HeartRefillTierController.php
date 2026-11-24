<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\HeartRefillTier;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class HeartRefillTierController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        return view('admin.heart-refill-tiers.index', [
            'heartRefillTiers' => HeartRefillTier::orderBy('order_number')->paginate(PerPage::resolve($request))->withQueryString(),
        ]);
    }

    public function create(Request $request): View
    {
        return view('admin.heart-refill-tiers.create', ['return' => $this->returnUrl($request)]);
    }

    public function store(Request $request): RedirectResponse
    {
        $tier = HeartRefillTier::create($this->validateData($request));

        return $this->backTo($request, 'admin.heart-refill-tiers.index', "Heart refill \"{$tier->title}\" added.");
    }

    public function edit(Request $request, HeartRefillTier $heart_refill_tier): View
    {
        return view('admin.heart-refill-tiers.edit', ['heart_refill_tier' => $heart_refill_tier, 'return' => $this->returnUrl($request)]);
    }

    public function update(Request $request, HeartRefillTier $heart_refill_tier): RedirectResponse
    {
        $heart_refill_tier->update($this->validateData($request, $heart_refill_tier));

        return $this->backTo($request, 'admin.heart-refill-tiers.index', "Heart refill \"{$heart_refill_tier->title}\" saved.");
    }

    public function destroy(Request $request, HeartRefillTier $heart_refill_tier): RedirectResponse
    {
        $heart_refill_tier->delete();

        return $this->backTo($request, 'admin.heart-refill-tiers.index', "Heart refill \"{$heart_refill_tier->title}\" deleted.");
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
