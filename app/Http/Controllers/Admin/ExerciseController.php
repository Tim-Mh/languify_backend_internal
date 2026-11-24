<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ExerciseType;
use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Language;
use App\Models\Lesson;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ExerciseController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        $lesson = Lesson::with('unit.chapter.language')->find((int) $request->query('lesson_id'));
        $languageId = $lesson?->unit->chapter->language_id ?? ((int) $request->query('language_id') ?: null);
        $type = ExerciseType::tryFrom((string) $request->query('type'));
        $search = trim((string) $request->query('search', ''));

        $exercises = Exercise::with('lesson.unit.chapter.language')
            ->when($lesson, fn ($q) => $q->where('lesson_id', $lesson->id))
            ->when(! $lesson && $languageId, fn ($q) => $q->whereHas('lesson.unit.chapter', fn ($q) => $q->where('language_id', $languageId)))
            ->when($type, fn ($q) => $q->where('type', $type->value))
            ->when($search !== '', fn ($q) => $q->where('data', 'like', "%{$search}%"))
            // Inside one lesson, read in the order learners meet them.
            ->when($lesson, fn ($q) => $q->orderBy('session_number'))
            ->orderBy('lesson_id')->orderBy('order_number')
            ->paginate(PerPage::resolve($request))->withQueryString();

        return view('admin.exercises.index', [
            'exercises' => $exercises,
            'lesson' => $lesson,
            'languages' => Language::orderBy('name')->get(),
            'languageId' => $languageId,
            'types' => ExerciseType::cases(),
            'type' => $type,
            'search' => $search,
        ]);
    }

    public function create(Request $request): View
    {
        $lessonId = (int) $request->query('lesson_id') ?: null;
        $last = $lessonId ? Exercise::where('lesson_id', $lessonId)->orderByDesc('session_number')->orderByDesc('order_number')->first() : null;

        return view('admin.exercises.create', [
            'lessons' => $this->lessonOptions(),
            'types' => ExerciseType::cases(),
            'defaults' => [
                'lesson_id' => $lessonId,
                'order_number' => $last ? $last->order_number + 1 : 1,
                'session_number' => $last?->session_number ?? 1,
            ],
            'return' => $this->returnUrl($request),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Exercise::create($this->validateData($request));

        return $this->backTo($request, 'admin.exercises.index', 'Exercise added.');
    }

    public function edit(Request $request, Exercise $exercise): View
    {
        return view('admin.exercises.edit', [
            'exercise' => $exercise,
            'lessons' => $this->lessonOptions(),
            'types' => ExerciseType::cases(),
            'return' => $this->returnUrl($request),
        ]);
    }

    public function update(Request $request, Exercise $exercise): RedirectResponse
    {
        $exercise->update($this->validateData($request));

        return $this->backTo($request, 'admin.exercises.index', 'Exercise saved.');
    }

    public function destroy(Request $request, Exercise $exercise): RedirectResponse
    {
        $exercise->delete();

        return $this->backTo($request, 'admin.exercises.index', 'Exercise deleted.');
    }

    private function validateData(Request $request): array
    {
        $validated = $request->validate([
            'lesson_id' => ['required', 'exists:lessons,id'],
            'type' => ['required', Rule::in(array_map(fn (ExerciseType $type) => $type->value, ExerciseType::cases()))],
            'data' => ['required', 'json'],
            'order_number' => ['required', 'integer', 'min:0'],
            'session_number' => ['required', 'integer', 'min:1'],
        ], [
            'data.json' => 'The exercise content is not valid JSON. Check for a missing comma, quote or bracket.',
        ]);

        $validated['data'] = json_decode($validated['data'], true);

        return $validated;
    }

    /** Lessons grouped by language, chapter and unit for the picker. */
    private function lessonOptions()
    {
        return Lesson::with('unit.chapter.language')->orderBy('order_number')->get()
            ->sortBy(fn ($lesson) => [$lesson->unit->chapter->language->name, $lesson->unit->chapter->order_number, $lesson->unit->order_number])
            ->groupBy(fn ($lesson) => trim($lesson->unit->chapter->language->flag_emoji.' '.$lesson->unit->chapter->language->name).' / '.$lesson->unit->chapter->title.' / '.$lesson->unit->title);
    }
}
