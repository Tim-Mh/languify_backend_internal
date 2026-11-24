<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ExerciseType;
use App\Http\Controllers\Admin\Concerns\ReturnsToPreviousPage;
use App\Http\Controllers\Controller;
use App\Models\ExerciseInstruction;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

/**
 * The line above each exercise ("Pick the right word for {word}"), written
 * once per exercise type in each language a learner can use the app in.
 * Exercise content itself is never translated; only these lines are.
 *
 * Shown one language at a time, one row per exercise type, so a missing line
 * is a visible gap rather than an absent row.
 */
class ExerciseInstructionController extends Controller
{
    use ReturnsToPreviousPage;

    public function index(Request $request): View
    {
        $languages = Language::withCount('exerciseInstructions')->orderBy('name')->get();
        $language = $languages->firstWhere('id', (int) $request->query('language_id')) ?? $languages->first();

        return view('admin.exercise-instructions.index', [
            'languages' => $languages,
            'language' => $language,
            'types' => ExerciseType::cases(),
            'instructions' => $language
                ? ExerciseInstruction::where('language_id', $language->id)->get()->keyBy(fn ($i) => $i->exercise_type->value)
                : collect(),
        ]);
    }

    public function create(Request $request): View
    {
        return view('admin.exercise-instructions.create', [
            'languages' => Language::orderBy('name')->get(),
            'types' => ExerciseType::cases(),
            'defaults' => [
                'language_id' => (int) $request->query('language_id') ?: null,
                'exercise_type' => ExerciseType::tryFrom((string) $request->query('exercise_type'))?->value,
            ],
            'return' => $this->returnUrl($request),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        ExerciseInstruction::create($this->validateData($request));

        return $this->backTo($request, 'admin.exercise-instructions.index', 'Instruction added.');
    }

    public function edit(Request $request, ExerciseInstruction $exerciseInstruction): View
    {
        return view('admin.exercise-instructions.edit', [
            'instruction' => $exerciseInstruction,
            'languages' => Language::orderBy('name')->get(),
            'types' => ExerciseType::cases(),
            'return' => $this->returnUrl($request),
        ]);
    }

    public function update(Request $request, ExerciseInstruction $exerciseInstruction): RedirectResponse
    {
        $exerciseInstruction->update($this->validateData($request, $exerciseInstruction));

        return $this->backTo($request, 'admin.exercise-instructions.index', 'Instruction saved.');
    }

    public function destroy(Request $request, ExerciseInstruction $exerciseInstruction): RedirectResponse
    {
        $exerciseInstruction->delete();

        return $this->backTo($request, 'admin.exercise-instructions.index', 'Instruction deleted.');
    }

    private function validateData(Request $request, ?ExerciseInstruction $instruction = null): array
    {
        return $request->validate([
            'language_id' => ['required', 'exists:languages,id'],
            'exercise_type' => [
                'required',
                Rule::in(array_map(fn (ExerciseType $type) => $type->value, ExerciseType::cases())),
                Rule::unique('exercise_instructions', 'exercise_type')
                    ->where(fn ($query) => $query->where('language_id', $request->input('language_id')))
                    ->ignore($instruction?->id),
            ],
            'template' => ['required', 'string', 'max:1000'],
            'fallback_template' => ['nullable', 'string', 'max:1000'],
        ], [
            'exercise_type.unique' => 'This language already has an instruction for that exercise type. Edit that one instead.',
        ]);
    }
}
