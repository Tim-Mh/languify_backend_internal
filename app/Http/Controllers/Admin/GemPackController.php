<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GemPack;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class GemPackController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.gem-packs.index', [
            'gemPacks' => GemPack::orderBy('order_number')->paginate(PerPage::resolve($request))->withQueryString(),
        ]);
    }

    public function create(): View
    {
        return view('admin.gem-packs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        GemPack::create($this->validateData($request));

        return redirect()->route('admin.gem-packs.index')->with('status', 'Gem pack created.');
    }

    public function edit(GemPack $gem_pack): View
    {
        return view('admin.gem-packs.edit', ['gem_pack' => $gem_pack]);
    }

    public function update(Request $request, GemPack $gem_pack): RedirectResponse
    {
        $gem_pack->update($this->validateData($request, $gem_pack));

        return redirect()->route('admin.gem-packs.index')->with('status', 'Gem pack updated.');
    }

    public function destroy(GemPack $gem_pack): RedirectResponse
    {
        $gem_pack->delete();

        return redirect()->route('admin.gem-packs.index')->with('status', 'Gem pack deleted.');
    }

    private function validateData(Request $request, ?GemPack $pack = null): array
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:50', Rule::unique('gem_packs', 'key')->ignore($pack?->id)],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'gems' => ['required', 'integer', 'min:1'],
            'amount_dollars' => ['required', 'numeric', 'min:0.01'],
            'badge_label' => ['nullable', 'string', 'max:50'],
            'order_number' => ['required', 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $data['amount_cents'] = (int) round($request->input('amount_dollars') * 100);
        unset($data['amount_dollars']);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
