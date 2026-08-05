<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContentTreeController extends Controller
{
    public function index(Request $request): View
    {
        $languages = Language::orderBy('name')->get();

        $selectedLanguage = $languages->firstWhere('id', (int) $request->query('language_id'))
            ?? $languages->first();

        $chapters = collect();

        if ($selectedLanguage) {
            $chapters = $selectedLanguage->chapters()
                ->with('units.lessons.exercises')
                ->orderBy('order_number')
                ->get();
        }

        return view('admin.content-tree.index', [
            'languages' => $languages,
            'selectedLanguage' => $selectedLanguage,
            'chapters' => $chapters,
        ]);
    }
}
