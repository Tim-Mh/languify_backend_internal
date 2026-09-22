<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ExerciseType;
use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ExerciseController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.exercises.index', [
            'exercises' => Exercise::with('lesson.unit.chapter.language')->orderBy('lesson_id')->orderBy('order_number')->paginate(PerPage::resolve($request))->withQueryString(),
        ]);
    }

    public function create(): View
    {
        return view('admin.exercises.create', [
            'lessons' => $this->lessonOptions(),
            'types' => ExerciseType::cases(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        Exercise::create($data);

        return redirect()->route('admin.exercises.index')->with('status', 'Exercise created.');
    }

    public function edit(Exercise $exercise): View
    {
        return view('admin.exercises.edit', [
            'exercise' => $exercise,
            'lessons' => $this->lessonOptions(),
            'types' => ExerciseType::cases(),
        ]);
    }

    public function update(Request $request, Exercise $exercise): RedirectResponse
    {
        $data = $this->validateData($request);

        $exercise->update($data);

        return redirect()->route('admin.exercises.index')->with('status', 'Exercise updated.');
    }

    public function destroy(Exercise $exercise): RedirectResponse
    {
        $exercise->delete();

        return redirect()->route('admin.exercises.index')->with('status', 'Exercise deleted.');
    }

    private function validateData(Request $request): array
    {
        $validated = $request->validate([
            'lesson_id' => ['required', 'exists:lessons,id'],
            'type' => ['required', Rule::in(array_map(fn (ExerciseType $type) => $type->value, ExerciseType::cases()))],
            'data' => ['required', 'json'],
            'order_number' => ['required', 'integer', 'min:0'],
            'session_number' => ['required', 'integer', 'min:1'],
        ]);

        $validated['data'] = json_decode($validated['data'], true);

        return $validated;
    }

    private function lessonOptions()
    {
        return Lesson::with('unit.chapter.language')->orderBy('unit_id')->orderBy('order_number')->get();
    }
}
