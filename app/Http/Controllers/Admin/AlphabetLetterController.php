<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlphabetLetter;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlphabetLetterController extends Controller
{
    public function index(Request $request): View
    {
        $languages = Language::orderBy('name')->get();
        $selectedLanguage = $languages->firstWhere('id', (int) $request->query('language_id')) ?? $languages->first();

        $letters = $selectedLanguage
            ? AlphabetLetter::where('language_id', $selectedLanguage->id)->orderBy('order_number')->get()
            : collect();

        return view('admin.alphabet-letters.index', [
            'languages' => $languages,
            'selectedLanguage' => $selectedLanguage,
            'letters' => $letters,
        ]);
    }

    public function create(Request $request): View
    {
        $languages = Language::orderBy('name')->get();
        $selectedLanguageId = (int) $request->query('language_id', $languages->first()?->id);

        $nextOrder = (int) (AlphabetLetter::where('language_id', $selectedLanguageId)->max('order_number') ?? 0) + 1;

        return view('admin.alphabet-letters.create', [
            'languages' => $languages,
            'selectedLanguageId' => $selectedLanguageId,
            'nextOrder' => $nextOrder,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        AlphabetLetter::create($data);

        return redirect()->route('admin.alphabet-letters.index', ['language_id' => $data['language_id']])
            ->with('status', 'Letter created.');
    }

    public function edit(AlphabetLetter $alphabet_letter): View
    {
        return view('admin.alphabet-letters.edit', [
            'languages' => Language::orderBy('name')->get(),
            'letter' => $alphabet_letter,
        ]);
    }

    public function update(Request $request, AlphabetLetter $alphabet_letter): RedirectResponse
    {
        $data = $this->validateData($request);
        $alphabet_letter->update($data);

        return redirect()->route('admin.alphabet-letters.index', ['language_id' => $data['language_id']])
            ->with('status', 'Letter updated.');
    }

    public function destroy(AlphabetLetter $alphabet_letter): RedirectResponse
    {
        $languageId = $alphabet_letter->language_id;
        $alphabet_letter->delete();

        return redirect()->route('admin.alphabet-letters.index', ['language_id' => $languageId])
            ->with('status', 'Letter deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'language_id' => ['required', 'integer', 'exists:languages,id'],
            'character' => ['required', 'string', 'max:20'],
            'romanization' => ['nullable', 'string', 'max:50'],
            'example_word' => ['nullable', 'string', 'max:100'],
            'script_group' => ['nullable', 'string', 'max:50'],
            'order_number' => ['required', 'integer', 'min:0'],
        ]);
    }
}
