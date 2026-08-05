<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LegalPageController extends Controller
{
    public function index(): View
    {
        return view('admin.legal-pages.index', [
            // The Contact page is managed through the Contact form / Contact
            // Messages, not edited here, so it's excluded from this list.
            'pages' => LegalPage::where('slug', '!=', 'contact')->orderBy('title')->get(),
        ]);
    }

    public function edit(LegalPage $legal_page): View
    {
        return view('admin.legal-pages.edit', ['page' => $legal_page]);
    }

    public function update(Request $request, LegalPage $legal_page): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $legal_page->update($data);

        return redirect()->route('admin.legal-pages.index')->with('status', 'Page updated.');
    }
}
