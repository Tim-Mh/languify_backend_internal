<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChestRewardConfig;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ChestRewardConfigController extends Controller
{
    public function index(): View
    {
        return view('admin.chest-reward-configs.index', [
            'chestRewardConfigs' => ChestRewardConfig::orderBy('chest_type')->orderBy('order_number')->paginate(25),
        ]);
    }

    public function create(): View
    {
        return view('admin.chest-reward-configs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ChestRewardConfig::create($this->validateData($request));

        return redirect()->route('admin.chest-reward-configs.index')->with('status', 'Chest reward config created.');
    }

    public function edit(ChestRewardConfig $chest_reward_config): View
    {
        return view('admin.chest-reward-configs.edit', ['chest_reward_config' => $chest_reward_config]);
    }

    public function update(Request $request, ChestRewardConfig $chest_reward_config): RedirectResponse
    {
        $chest_reward_config->update($this->validateData($request, $chest_reward_config));

        return redirect()->route('admin.chest-reward-configs.index')->with('status', 'Chest reward config updated.');
    }

    public function destroy(ChestRewardConfig $chest_reward_config): RedirectResponse
    {
        $chest_reward_config->delete();

        return redirect()->route('admin.chest-reward-configs.index')->with('status', 'Chest reward config deleted.');
    }

    private function validateData(Request $request, ?ChestRewardConfig $config = null): array
    {
        $data = $request->validate([
            'chest_type' => [
                'required',
                Rule::in(['daily', 'streak', 'unit_bonus']),
                Rule::unique('chest_reward_configs')
                    ->where(fn ($query) => $query
                        ->where('chest_type', $request->input('chest_type'))
                        ->where('reference', $request->input('reference')))
                    ->ignore($config?->id),
            ],
            'reference' => ['nullable', 'string', 'max:20'],
            'label' => ['required', 'string', 'max:255'],
            'reward_description' => ['nullable', 'string', 'max:255'],
            'badge_key' => ['nullable', 'string', 'max:50'],
            'min_gems' => ['required', 'integer', 'min:0'],
            'max_gems' => ['required', 'integer', 'min:0', function ($attribute, $value, $fail) use ($request) {
                if ($value < (int) $request->input('min_gems')) {
                    $fail('Max gems must be >= min gems.');
                }
            }],
            'min_xp' => ['required', 'integer', 'min:0'],
            'max_xp' => ['required', 'integer', 'min:0', function ($attribute, $value, $fail) use ($request) {
                if ($value < (int) $request->input('min_xp')) {
                    $fail('Max xp must be >= min xp.');
                }
            }],
            'min_hearts' => ['required', 'integer', 'min:0'],
            'max_hearts' => ['required', 'integer', 'min:0', function ($attribute, $value, $fail) use ($request) {
                if ($value < (int) $request->input('min_hearts')) {
                    $fail('Max hearts must be >= min hearts.');
                }
            }],
            'order_number' => ['required', 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
