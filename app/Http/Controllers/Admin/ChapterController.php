<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ChapterKey;
use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Language;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ChapterController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        $languageId = (int) $request->query('language_id') ?: null;

        $chapters = Chapter::with('language')->withCount('units')
            ->when($languageId, fn ($q) => $q->where('language_id', $languageId))
            ->orderBy('language_id')->orderBy('order_number')
            ->paginate(PerPage::resolve($request))->withQueryString();

        return view('admin.chapters.index', [
            'chapters' => $chapters,
            'languages' => Language::orderBy('name')->get(),
            'languageId' => $languageId,
        ]);
    }

    public function create(Request $request): View
    {
        $languageId = (int) $request->query('language_id') ?: null;

        return view('admin.chapters.create', [
            'languages' => Language::orderBy('name')->get(),
            'chapterKeys' => ChapterKey::cases(),
            'defaults' => [
                'language_id' => $languageId,
                'order_number' => $languageId ? (int) Chapter::where('language_id', $languageId)->max('order_number') + 1 : 1,
            ],
            'return' => $this->returnUrl($request),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $chapter = Chapter::create($this->validateData($request));

        return $this->backTo($request, 'admin.chapters.index', "Chapter \"{$chapter->title}\" added.");
    }

    public function edit(Request $request, Chapter $chapter): View
    {
        return view('admin.chapters.edit', [
            'chapter' => $chapter,
            'languages' => Language::orderBy('name')->get(),
            'chapterKeys' => ChapterKey::cases(),
            'return' => $this->returnUrl($request),
        ]);
    }

    public function update(Request $request, Chapter $chapter): RedirectResponse
    {
        $chapter->update($this->validateData($request, $chapter));

        return $this->backTo($request, 'admin.chapters.index', "Chapter \"{$chapter->title}\" saved.");
    }

    public function destroy(Request $request, Chapter $chapter): RedirectResponse
    {
        $chapter->delete();

        return $this->backTo($request, 'admin.chapters.index', "Chapter \"{$chapter->title}\" deleted.");
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
        ], [
            'chapter_key.unique' => 'This language already has a chapter of that kind.',
        ]);
    }
}
