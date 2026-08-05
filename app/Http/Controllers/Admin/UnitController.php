<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitController extends Controller
{
    public function index(): View
    {
        return view('admin.units.index', [
            'units' => Unit::with('chapter.language')->orderBy('chapter_id')->orderBy('order_number')->paginate(25),
        ]);
    }

    public function create(): View
    {
        return view('admin.units.create', [
            'chapters' => $this->chapterOptions(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        Unit::create($data);

        return redirect()->route('admin.units.index')->with('status', 'Unit created.');
    }

    public function edit(Unit $unit): View
    {
        return view('admin.units.edit', [
            'unit' => $unit,
            'chapters' => $this->chapterOptions(),
        ]);
    }

    public function update(Request $request, Unit $unit): RedirectResponse
    {
        $data = $this->validateData($request);

        $unit->update($data);

        return redirect()->route('admin.units.index')->with('status', 'Unit updated.');
    }

    public function destroy(Unit $unit): RedirectResponse
    {
        $unit->delete();

        return redirect()->route('admin.units.index')->with('status', 'Unit deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'chapter_id' => ['required', 'exists:chapters,id'],
            'title' => ['required', 'string', 'max:255'],
            'order_number' => ['required', 'integer', 'min:0'],
        ]);
    }

    private function chapterOptions()
    {
        return Chapter::with('language')->orderBy('language_id')->orderBy('order_number')->get();
    }
}
