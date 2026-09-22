<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

/**
 * Terms and Privacy, in every language the apps offer.
 *
 * A page is identified by slug *and* locale now, so the routes carry both and
 * there is no route-model binding: a slug on its own no longer names one row.
 */
class LegalPageController extends Controller
{
    public function index(): View
    {
        // English is the source and the only row guaranteed to exist, so it is
        // what the list is built from. The Contact page is managed through the
        // Contact form / Contact Messages, not edited here.
        $pages = LegalPage::where('slug', '!=', 'contact')
            ->where('locale', LegalPage::SOURCE_LOCALE)
            ->orderBy('title')
            ->get();

        // Every translation of those slugs, so the list can say how many are
        // written and how many have fallen behind.
        $translations = LegalPage::whereIn('slug', $pages->pluck('slug'))
            ->where('locale', '!=', LegalPage::SOURCE_LOCALE)
            ->get()
            ->groupBy('slug');

        $summary = $pages->mapWithKeys(function (LegalPage $source) use ($translations) {
            $rows = $translations->get($source->slug, collect());

            return [$source->slug => [
                'written' => $rows->count(),
                'total' => count(LegalPage::LOCALES) - 1,
                'outdated' => $rows->filter(fn (LegalPage $row) => $row->isOutdated($source))->count(),
            ]];
        });

        return view('admin.legal-pages.index', [
            'pages' => $pages,
            'summary' => $summary,
        ]);
    }

    public function edit(Request $request, string $slug): View
    {
        $locale = $this->resolveLocale($request->query('locale'));

        $source = LegalPage::where('slug', $slug)
            ->where('locale', LegalPage::SOURCE_LOCALE)
            ->firstOrFail();

        // Not firstOrFail: a language nobody has written yet is the normal case,
        // and the editor should open empty rather than 404.
        $page = $locale === LegalPage::SOURCE_LOCALE
            ? $source
            : LegalPage::where('slug', $slug)->where('locale', $locale)->first();

        $translations = LegalPage::where('slug', $slug)->get()->keyBy('locale');

        return view('admin.legal-pages.edit', [
            'slug' => $slug,
            'locale' => $locale,
            'source' => $source,
            'page' => $page,
            'translations' => $translations,
            'outdated' => $page?->isOutdated($source) ?? false,
        ]);
    }

    public function update(Request $request, string $slug): RedirectResponse
    {
        $data = $request->validate([
            'locale' => ['required', 'string', Rule::in(LegalPage::LOCALES)],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $locale = $data['locale'];

        $source = LegalPage::where('slug', $slug)
            ->where('locale', LegalPage::SOURCE_LOCALE)
            ->firstOrFail();

        if ($locale === LegalPage::SOURCE_LOCALE) {
            // Editing the source. The translations are not touched — rewriting
            // them would be guessing — but they are now measured against new
            // text, so any whose hash no longer matches will show as out of
            // date on the next load. That is the point of the hash.
            $source->update(['title' => $data['title'], 'content' => $data['content']]);

            return redirect()
                ->route('admin.legal-pages.edit', ['legal_page' => $slug, 'locale' => $locale])
                ->with('status', 'English updated. Any translations made from the previous text are now marked out of date.');
        }

        LegalPage::updateOrCreate(
            ['slug' => $slug, 'locale' => $locale],
            [
                'title' => $data['title'],
                'content' => $data['content'],
                // Stamped with the English text this was written against, which
                // is what lets it be called out of date later.
                'source_hash' => LegalPage::fingerprint($source->content),
            ],
        );

        return redirect()
            ->route('admin.legal-pages.edit', ['legal_page' => $slug, 'locale' => $locale])
            ->with('status', LegalPage::LOCALE_NAMES[$locale].' saved.');
    }

    /** Falls back to English rather than 404ing on a hand-typed query string. */
    private function resolveLocale(?string $locale): string
    {
        return in_array($locale, LegalPage::LOCALES, true) ? $locale : LegalPage::SOURCE_LOCALE;
    }
}
