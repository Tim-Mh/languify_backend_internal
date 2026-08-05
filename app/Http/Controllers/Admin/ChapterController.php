<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ChapterKey;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ChapterController extends Controller
{
    public function index(): View
    {
        return view('admin.chapters.index', [
            'chapters' => Chapter::with('language')->orderBy('language_id')->orderBy('order_number')->paginate(25),
        ]);
    }

    public function create(): View
    {
        return view('admin.chapters.create', [
            'languages' => Language::orderBy('name')->get(),
            'chapterKeys' => ChapterKey::cases(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        Chapter::create($data);

        return redirect()->route('admin.chapters.index')->with('status', 'Chapter created.');
    }

    public function edit(Chapter $chapter): View
    {
        return view('admin.chapters.edit', [
            'chapter' => $chapter,
            'languages' => Language::orderBy('name')->get(),
            'chapterKeys' => ChapterKey::cases(),
        ]);
    }

    public function update(Request $request, Chapter $chapter): RedirectResponse
    {
        $data = $this->validateData($request, $chapter);

        $chapter->update($data);

        return redirect()->route('admin.chapters.index')->with('status', 'Chapter updated.');
    }

    public function destroy(Chapter $chapter): RedirectResponse
    {
        $chapter->delete();

        return redirect()->route('admin.chapters.index')->with('status', 'Chapter deleted.');
    }

    private function validateData(Request $request, ?Chapter $chapter = null): array
    {
        return $request->validate([
            'language_id' => ['required', 'exists:languages,id'],
            'chapter_key' => [
                'required',
                Rule::in(array_map(fn (ChapterKey $key) => $key->value, ChapterKey::cases())),
                Rule::unique('chapters', 'chapter_key')
                    ->where(fn ($query) => $query->where('language_id', $request->input('language_id')))
                    ->ignore($chapter?->id),
            ],
            'title' => ['required', 'string', 'max:255'],
            'order_number' => ['required', 'integer', 'min:0'],
        ]);
    }
}
