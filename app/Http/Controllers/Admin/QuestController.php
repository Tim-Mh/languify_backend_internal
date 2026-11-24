<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\Quest;
use App\Models\UserDailyQuest;
use App\Support\PerPage;
use App\Support\Sluggable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class QuestController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        $status = in_array($request->query('status'), ['active', 'off'], true) ? $request->query('status') : 'all';

        $quests = Quest::query()
            ->when($status !== 'all', fn ($q) => $q->where('is_active', $status === 'active'))
            ->orderByDesc('is_active')->orderBy('order_number')
            ->paginate(PerPage::resolve($request))->withQueryString();

        return view('admin.quests.index', [
            'quests' => $quests,
            'status' => $status,
            'counts' => [
                'all' => Quest::count(),
                'active' => Quest::where('is_active', true)->count(),
                'off' => Quest::where('is_active', false)->count(),
            ],
            // How many learner-days each quest has been handed out on.
            'assigned' => UserDailyQuest::selectRaw('quest_id, count(*) as total')
                ->whereIn('quest_id', $quests->pluck('id'))
                ->groupBy('quest_id')->pluck('total', 'quest_id'),
        ]);
    }

    public function create(Request $request): View
    {
        return view('admin.quests.create', [
            'nextOrder' => (int) Quest::max('order_number') + 1,
            'return' => $this->returnUrl($request),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['key'] = Sluggable::unique('quests', 'key', $data['title']);

        $quest = Quest::create($data);

        return $this->backTo($request, 'admin.quests.index', "Quest \"{$quest->title}\" added.");
    }

    public function edit(Request $request, Quest $quest): View
    {
        return view('admin.quests.edit', ['quest' => $quest, 'return' => $this->returnUrl($request)]);
    }

    public function update(Request $request, Quest $quest): RedirectResponse
    {
        $quest->update($this->validateData($request, $quest));

        return $this->backTo($request, 'admin.quests.index', "Quest \"{$quest->title}\" saved.");
    }

    public function destroy(Request $request, Quest $quest): RedirectResponse
    {
        $quest->delete();

        return $this->backTo($request, 'admin.quests.index', "Quest \"{$quest->title}\" deleted.");
    }

    private function validateData(Request $request, ?Quest $quest = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'requirement_type' => ['required', Rule::in(Quest::REQUIREMENT_TYPES)],
            'target_count' => ['required', 'integer', 'min:1'],
            'target_increment' => ['required', 'integer', 'min:0'],
            'max_target' => ['nullable', 'integer', 'min:1'],
            'difficulty' => ['required', 'integer', 'min:1', 'max:3'],
            'gems_reward' => ['required', 'integer', 'min:0'],
            'xp_reward' => ['required', 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
            'order_number' => ['required', 'integer', 'min:0'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
