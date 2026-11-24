<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * One language's whole course on one page: chapters, their units and the
 * lessons in each, with exercise counts. Exercises themselves open on the
 * Exercises page filtered to the lesson, since a single language holds a
 * couple of thousand of them.
 */
class ContentTreeController extends Controller
{
    public function index(Request $request): View
    {
        $languages = Language::orderByDesc('is_learnable')->orderBy('name')->get();

        $selectedLanguage = $languages->firstWhere('id', (int) $request->query('language_id'))
            ?? $languages->firstWhere('is_learnable', true)
            ?? $languages->first();

        $chapters = $selectedLanguage
            ? $selectedLanguage->chapters()
                ->with(['units' => fn ($q) => $q->orderBy('order_number')
                    ->with(['lessons' => fn ($q) => $q->orderBy('order_number')
                        ->withCount('exercises')
                        ->withMax('exercises', 'session_number')]),
                ])
                ->orderBy('order_number')
                ->get()
            : collect();

        $units = $chapters->flatMap->units;
        $lessons = $units->flatMap->lessons;

        return view('admin.content-tree.index', [
            'languages' => $languages,
            'selectedLanguage' => $selectedLanguage,
            'chapters' => $chapters,
            'totals' => [
                'chapters' => $chapters->count(),
                'units' => $units->count(),
                'lessons' => $lessons->count(),
                'exercises' => $lessons->sum('exercises_count'),
                'empty' => $lessons->where('exercises_count', 0)->count(),
            ],
        ]);
    }
}
