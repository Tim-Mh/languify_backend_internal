<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ExerciseType;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\UserCourse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LanguageController extends Controller
{
    /**
     * Every language on one page with its live switch and how much course
     * there is behind it. Unpaginated: the point is seeing the whole roster
     * at a glance, and there are only a handful of languages.
     */
    public function index(): View
    {
        $lessons = Lesson::query()
            ->join('units', 'units.id', '=', 'lessons.unit_id')
            ->join('chapters', 'chapters.id', '=', 'units.chapter_id')
            ->selectRaw('chapters.language_id as language_id, count(*) as total')
            ->groupBy('chapters.language_id')
            ->pluck('total', 'language_id');

        $learners = UserCourse::selectRaw('language_id, count(*) as total')->groupBy('language_id')->pluck('total', 'language_id');

        return view('admin.languages.index', [
            'languages' => Language::withCount(['chapters', 'alphabetLetters', 'exerciseInstructions'])->orderBy('name')->get(),
            'lessons' => $lessons,
            'learners' => $learners,
            'typeCount' => count(ExerciseType::cases()),
        ]);
    }

    public function create(): View
    {
        return view('admin.languages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        Language::create($data);

        return redirect()->route('admin.languages.index')->with('status', "{$data['name']} added.");
    }

    public function edit(Language $language): View
    {
        return view('admin.languages.edit', ['language' => $language]);
    }

    public function update(Request $request, Language $language): RedirectResponse
    {
        $data = $this->validateData($request, $language);

        $language->update($data);

        return redirect()->route('admin.languages.index')->with('status', "{$language->name} saved.");
    }

    public function destroy(Language $language): RedirectResponse
    {
        $language->delete();

        return redirect()->route('admin.languages.index')->with('status', "{$language->name} deleted.");
    }

    private function validateData(Request $request, ?Language $language = null): array
    {
        $data = $request->validate([
            'code' => ['required', 'string', 'max:10', Rule::unique('languages', 'code')->ignore($language?->id)],
            'name' => ['required', 'string', 'max:255'],
            'native_name' => ['required', 'string', 'max:255'],
            'flag_emoji' => ['nullable', 'string', 'max:10'],
        ]);

        // Live or hidden, switched on the language card, is the only control:
        // live languages can be picked both as a course and as the learner's
        // own language. A new one starts hidden so it can be set up first.
        if (! $language) {
            $data['is_active'] = false;
            $data['is_learnable'] = true;
        }

        return $data;
    }
}
