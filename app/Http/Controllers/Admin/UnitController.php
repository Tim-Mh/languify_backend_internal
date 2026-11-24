<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Language;
use App\Models\Unit;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        $languageId = (int) $request->query('language_id') ?: null;
        $search = trim((string) $request->query('search', ''));

        $units = Unit::with('chapter.language')->withCount('lessons')
            ->when($languageId, fn ($q) => $q->whereHas('chapter', fn ($q) => $q->where('language_id', $languageId)))
            ->when($search !== '', fn ($q) => $q->where('title', 'like', "%{$search}%"))
            ->orderBy('chapter_id')->orderBy('order_number')
            ->paginate(PerPage::resolve($request))->withQueryString();

        return view('admin.units.index', [
            'units' => $units,
            'languages' => Language::orderBy('name')->get(),
            'languageId' => $languageId,
            'search' => $search,
        ]);
    }

    public function create(Request $request): View
    {
        $chapterId = (int) $request->query('chapter_id') ?: null;

        return view('admin.units.create', [
            'chapters' => $this->chapterOptions(),
            'defaults' => [
                'chapter_id' => $chapterId,
                'order_number' => $chapterId ? (int) Unit::where('chapter_id', $chapterId)->max('order_number') + 1 : 1,
            ],
            'return' => $this->returnUrl($request),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $unit = Unit::create($this->validateData($request));

        return $this->backTo($request, 'admin.units.index', "Unit \"{$unit->title}\" added.");
    }

    public function edit(Request $request, Unit $unit): View
    {
        return view('admin.units.edit', [
            'unit' => $unit,
            'chapters' => $this->chapterOptions(),
            'return' => $this->returnUrl($request),
        ]);
    }

    public function update(Request $request, Unit $unit): RedirectResponse
    {
        $unit->update($this->validateData($request));

        return $this->backTo($request, 'admin.units.index', "Unit \"{$unit->title}\" saved.");
    }

    public function destroy(Request $request, Unit $unit): RedirectResponse
    {
        $unit->delete();

        return $this->backTo($request, 'admin.units.index', "Unit \"{$unit->title}\" deleted.");
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'chapter_id' => ['required', 'exists:chapters,id'],
            'title' => ['required', 'string', 'max:255'],
            'order_number' => ['required', 'integer', 'min:0'],
        ]);
    }

    /** Chapters grouped by language, for the picker's option groups. */
    private function chapterOptions()
    {
        return Chapter::with('language')->orderBy('order_number')->get()
            ->sortBy(fn ($chapter) => $chapter->language->name)
            ->groupBy(fn ($chapter) => trim($chapter->language->flag_emoji.' '.$chapter->language->name));
    }
}
