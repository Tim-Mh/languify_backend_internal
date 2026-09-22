<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quest;
use App\Support\PerPage;
use App\Support\Sluggable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class QuestController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.quests.index', [
            'quests' => Quest::orderBy('order_number')->paginate(PerPage::resolve($request))->withQueryString(),
        ]);
    }

    public function create(): View
    {
        return view('admin.quests.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['key'] = Sluggable::unique('quests', 'key', $data['title']);

        Quest::create($data);

        return redirect()->route('admin.quests.index')->with('status', 'Quest created.');
    }

    public function edit(Quest $quest): View
    {
        return view('admin.quests.edit', ['quest' => $quest]);
    }

    public function update(Request $request, Quest $quest): RedirectResponse
    {
        $quest->update($this->validateData($request, $quest));

        return redirect()->route('admin.quests.index')->with('status', 'Quest updated.');
    }

    public function destroy(Quest $quest): RedirectResponse
    {
        $quest->delete();

        return redirect()->route('admin.quests.index')->with('status', 'Quest deleted.');
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
