<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Support\PerPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LanguageController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.languages.index', [
            'languages' => Language::orderBy('name')->paginate(PerPage::resolve($request))->withQueryString(),
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

        return redirect()->route('admin.languages.index')->with('status', 'Language created.');
    }

    public function edit(Language $language): View
    {
        return view('admin.languages.edit', ['language' => $language]);
    }

    public function update(Request $request, Language $language): RedirectResponse
    {
        $data = $this->validateData($request, $language);

        $language->update($data);

        return redirect()->route('admin.languages.index')->with('status', 'Language updated.');
    }

    public function destroy(Language $language): RedirectResponse
    {
        $language->delete();

        return redirect()->route('admin.languages.index')->with('status', 'Language deleted.');
    }

    private function validateData(Request $request, ?Language $language = null): array
    {
        $data = $request->validate([
            'code' => ['required', 'string', 'max:10', Rule::unique('languages', 'code')->ignore($language?->id)],
            'name' => ['required', 'string', 'max:255'],
            'native_name' => ['required', 'string', 'max:255'],
            'flag_emoji' => ['nullable', 'string', 'max:10'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
