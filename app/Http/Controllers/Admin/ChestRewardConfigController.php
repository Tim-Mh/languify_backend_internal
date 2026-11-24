<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ChestType;
use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\ChestRewardConfig;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ChestRewardConfigController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        $type = ChestType::tryFrom((string) $request->query('chest_type'));

        $all = ChestRewardConfig::all();

        return view('admin.chest-reward-configs.index', [
            'chestRewardConfigs' => ChestRewardConfig::query()
                ->when($type, fn ($q) => $q->where('chest_type', $type))
                // Daily, then unit bonus, then the streak milestones.
                ->orderByRaw("CASE chest_type WHEN 'daily' THEN 1 WHEN 'unit_bonus' THEN 2 ELSE 3 END")
                ->orderBy('order_number')
                ->paginate(PerPage::resolve($request))->withQueryString(),
            'type' => $type,
            'typeCounts' => $all->countBy(fn ($config) => $config->chest_type->value),
            'allCount' => $all->count(),
            // ChestService opens the daily and unit chests from the row with no
            // reference; without one, claiming that chest fails.
            'missing' => collect([ChestType::Daily, ChestType::UnitBonus])
                ->reject(fn ($t) => $all->contains(fn ($c) => $c->chest_type === $t && $c->reference === null))
                ->values(),
        ]);
    }

    public function create(Request $request): View
    {
        $type = ChestType::tryFrom((string) $request->query('chest_type'));

        return view('admin.chest-reward-configs.create', [
            'defaults' => [
                'chest_type' => $type?->value,
                'order_number' => (int) ChestRewardConfig::max('order_number') + 1,
            ],
            'badges' => Badge::orderBy('category')->orderBy('order_number')->get(['key', 'title']),
            'return' => $this->returnUrl($request),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $config = ChestRewardConfig::create($this->validateData($request));

        return $this->backTo($request, 'admin.chest-reward-configs.index', "Chest reward \"{$config->label}\" added.");
    }

    public function edit(Request $request, ChestRewardConfig $chest_reward_config): View
    {
        return view('admin.chest-reward-configs.edit', [
            'chest_reward_config' => $chest_reward_config,
            'badges' => Badge::orderBy('category')->orderBy('order_number')->get(['key', 'title']),
            'return' => $this->returnUrl($request),
        ]);
    }

    public function update(Request $request, ChestRewardConfig $chest_reward_config): RedirectResponse
    {
        $chest_reward_config->update($this->validateData($request, $chest_reward_config));

        return $this->backTo($request, 'admin.chest-reward-configs.index', "Chest reward \"{$chest_reward_config->label}\" saved.");
    }

    public function destroy(Request $request, ChestRewardConfig $chest_reward_config): RedirectResponse
    {
        $chest_reward_config->delete();

        return $this->backTo($request, 'admin.chest-reward-configs.index', "Chest reward \"{$chest_reward_config->label}\" deleted.");
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
