<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\TriviaTopic;
use App\Support\Sluggable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TriviaTopicController extends Controller
{
    public const ICONS = [
        'flask' => '🧪 Flask (Science)',
        'calculator' => '🧮 Calculator (Math)',
        'book-open' => '📖 Book (English/Reading)',
        'globe' => '🌍 Globe (Geography)',
        'music' => '🎵 Music',
        'palette' => '🎨 Art',
        'trophy' => '🏆 Sports',
        'rocket' => '🚀 Space',
        'landmark' => '🏛️ History',
    ];

    public function index(): View
    {
        return view('admin.trivia-topics.index', [
            'topics' => TriviaTopic::with('language')->withCount('questions')
                ->orderBy('language_id')->orderBy('order_number')->paginate(25),
        ]);
    }

    public function create(): View
    {
        $nextOrder = (int) (TriviaTopic::max('order_number') ?? 0) + 1;

        return view('admin.trivia-topics.create', [
            'icons' => self::ICONS,
            'nextOrder' => $nextOrder,
            'languages' => Language::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['key'] = Sluggable::unique('trivia_topics', 'key', $data['title'], ['language_id' => $data['language_id']]);

        TriviaTopic::create($data);

        return redirect()->route('admin.trivia-topics.index')->with('status', 'Trivia topic created.');
    }

    public function edit(TriviaTopic $trivia_topic): View
    {
        return view('admin.trivia-topics.edit', [
            'topic' => $trivia_topic,
            'icons' => self::ICONS,
            'languages' => Language::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, TriviaTopic $trivia_topic): RedirectResponse
    {
        $trivia_topic->update($this->validateData($request));

        return redirect()->route('admin.trivia-topics.index')->with('status', 'Trivia topic updated.');
    }

    public function destroy(TriviaTopic $trivia_topic): RedirectResponse
    {
        $trivia_topic->delete();

        return redirect()->route('admin.trivia-topics.index')->with('status', 'Trivia topic deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'language_id' => ['required', 'exists:languages,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'icon' => ['required', Rule::in(array_keys(self::ICONS))],
            'order_number' => ['required', 'integer', 'min:0'],
        ]);
    }
}
