<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\Unit;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        $languageId = (int) $request->query('language_id') ?: null;
        $search = trim((string) $request->query('search', ''));
        $emptyOnly = $request->boolean('empty');

        $lessons = Lesson::with('unit.chapter.language')->withCount('exercises')
            ->when($languageId, fn ($q) => $q->whereHas('unit.chapter', fn ($q) => $q->where('language_id', $languageId)))
            ->when($search !== '', fn ($q) => $q->where('title', 'like', "%{$search}%"))
            ->when($emptyOnly, fn ($q) => $q->doesntHave('exercises'))
            ->orderBy('unit_id')->orderBy('order_number')
            ->paginate(PerPage::resolve($request))->withQueryString();

        return view('admin.lessons.index', [
            'lessons' => $lessons,
            'languages' => Language::orderBy('name')->get(),
            'languageId' => $languageId,
            'search' => $search,
            'emptyOnly' => $emptyOnly,
        ]);
    }

    public function create(Request $request): View
    {
        $unitId = (int) $request->query('unit_id') ?: null;

        return view('admin.lessons.create', [
            'units' => $this->unitOptions(),
            'defaults' => [
                'unit_id' => $unitId,
                'order_number' => $unitId ? (int) Lesson::where('unit_id', $unitId)->max('order_number') + 1 : 1,
            ],
            'return' => $this->returnUrl($request),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $lesson = Lesson::create($this->validateData($request));

        return $this->backTo($request, 'admin.lessons.index', "Lesson \"{$lesson->title}\" added.");
    }

    public function edit(Request $request, Lesson $lesson): View
    {
        return view('admin.lessons.edit', [
            'lesson' => $lesson,
            'units' => $this->unitOptions(),
            'return' => $this->returnUrl($request),
        ]);
    }

    public function update(Request $request, Lesson $lesson): RedirectResponse
    {
        $lesson->update($this->validateData($request));

        return $this->backTo($request, 'admin.lessons.index', "Lesson \"{$lesson->title}\" saved.");
    }

    public function destroy(Request $request, Lesson $lesson): RedirectResponse
    {
        $lesson->delete();

        return $this->backTo($request, 'admin.lessons.index', "Lesson \"{$lesson->title}\" deleted.");
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'unit_id' => ['required', 'exists:units,id'],
            'title' => ['required', 'string', 'max:255'],
            'order_number' => ['required', 'integer', 'min:0'],
        ]);
    }

    /** Units grouped by language and chapter, for the picker's option groups. */
    private function unitOptions()
    {
        return Unit::with('chapter.language')->orderBy('order_number')->get()
            ->sortBy(fn ($unit) => [$unit->chapter->language->name, $unit->chapter->order_number])
            ->groupBy(fn ($unit) => trim($unit->chapter->language->flag_emoji.' '.$unit->chapter->language->name).' / '.$unit->chapter->title);
    }
}
