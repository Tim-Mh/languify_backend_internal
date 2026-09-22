<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class PageController extends Controller
{
    #[OA\Get(
        path: '/api/pages/{slug}',
        summary: 'Get a public content page (Terms, Privacy Policy, Contact Us)',
        description: 'Public — no authentication required. Content is admin-editable HTML. '
            .'Pass ?locale= to get a translation; anything not written yet falls back to English, '
            .'so this never 404s for a language and never returns an empty page.',
        tags: ['Pages'],
        parameters: [
            new OA\PathParameter(name: 'slug', description: 'terms | privacy | contact', schema: new OA\Schema(type: 'string')),
            new OA\QueryParameter(name: 'locale', description: 'en | fr | es | de | ja | ko | tr', required: false, schema: new OA\Schema(type: 'string')),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Page content', content: new OA\JsonContent(properties: [
                new OA\Property(property: 'slug', type: 'string', example: 'terms'),
                new OA\Property(property: 'locale', type: 'string', example: 'fr', description: 'The locale actually served, which is `en` when the requested one has no translation yet.'),
                new OA\Property(property: 'title', type: 'string', example: 'Terms and Conditions'),
                new OA\Property(property: 'content', type: 'string', description: 'HTML'),
                new OA\Property(property: 'updatedAt', type: 'string', format: 'date-time'),
            ])),
            new OA\Response(response: 404, description: 'No page with this slug'),
        ],
    )]
    public function show(Request $request, string $slug): JsonResponse
    {
        $requested = (string) $request->query('locale', LegalPage::SOURCE_LOCALE);
        $locale = in_array($requested, LegalPage::LOCALES, true)
            ? $requested
            : LegalPage::SOURCE_LOCALE;

        $page = LegalPage::where('slug', $slug)->where('locale', $locale)->first();

        // Falling back rather than 404ing is deliberate: a language nobody has
        // translated yet is the normal state, and a learner reading the terms
        // in English is fine while an empty screen is not. An empty body counts
        // as untranslated too, so a half-created row cannot black out the page.
        if (! $page || trim((string) $page->content) === '') {
            $page = LegalPage::where('slug', $slug)
                ->where('locale', LegalPage::SOURCE_LOCALE)
                ->first();
        }

        if (! $page) {
            return response()->json(['message' => 'Page not found.'], 404);
        }

        return response()->json([
            'slug' => $page->slug,
            // The locale served, not the one asked for, so the client can tell
            // it fell back.
            'locale' => $page->locale,
            'title' => $page->title,
            'content' => $page->content,
            'updatedAt' => $page->updated_at,
        ]);
    }
}
