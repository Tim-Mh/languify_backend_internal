<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ExerciseType;
use App\Http\Controllers\Controller;
use App\Models\ExerciseInstruction;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ExerciseInstructionController extends Controller
{
    public function index(): View
    {
        return view('admin.exercise-instructions.index', [
            'instructions' => ExerciseInstruction::with('language')->orderBy('language_id')->orderBy('exercise_type')->paginate(25),
        ]);
    }

    public function create(): View
    {
        return view('admin.exercise-instructions.create', [
            'languages' => Language::orderBy('name')->get(),
            'types' => ExerciseType::cases(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        ExerciseInstruction::create($data);

        return redirect()->route('admin.exercise-instructions.index')->with('status', 'Instruction created.');
    }

    public function edit(ExerciseInstruction $exerciseInstruction): View
    {
        return view('admin.exercise-instructions.edit', [
            'instruction' => $exerciseInstruction,
            'languages' => Language::orderBy('name')->get(),
            'types' => ExerciseType::cases(),
        ]);
    }

    public function update(Request $request, ExerciseInstruction $exerciseInstruction): RedirectResponse
    {
        $data = $this->validateData($request, $exerciseInstruction);

        $exerciseInstruction->update($data);

        return redirect()->route('admin.exercise-instructions.index')->with('status', 'Instruction updated.');
    }

    public function destroy(ExerciseInstruction $exerciseInstruction): RedirectResponse
    {
        $exerciseInstruction->delete();

        return redirect()->route('admin.exercise-instructions.index')->with('status', 'Instruction deleted.');
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
        ]);
    }
}
