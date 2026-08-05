<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonController extends Controller
{
    public function index(): View
    {
        return view('admin.lessons.index', [
            'lessons' => Lesson::with('unit.chapter.language')->orderBy('unit_id')->orderBy('order_number')->paginate(25),
        ]);
    }

    public function create(): View
    {
        return view('admin.lessons.create', [
            'units' => $this->unitOptions(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        Lesson::create($data);

        return redirect()->route('admin.lessons.index')->with('status', 'Lesson created.');
    }

    public function edit(Lesson $lesson): View
    {
        return view('admin.lessons.edit', [
            'lesson' => $lesson,
            'units' => $this->unitOptions(),
        ]);
    }

    public function update(Request $request, Lesson $lesson): RedirectResponse
    {
        $data = $this->validateData($request);

        $lesson->update($data);

        return redirect()->route('admin.lessons.index')->with('status', 'Lesson updated.');
    }

    public function destroy(Lesson $lesson): RedirectResponse
    {
        $lesson->delete();

        return redirect()->route('admin.lessons.index')->with('status', 'Lesson deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'unit_id' => ['required', 'exists:units,id'],
            'title' => ['required', 'string', 'max:255'],
            'order_number' => ['required', 'integer', 'min:0'],
        ]);
    }

    private function unitOptions()
    {
        return Unit::with('chapter.language')->orderBy('chapter_id')->orderBy('order_number')->get();
    }
}
