<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class PageController extends Controller
{
    #[OA\Get(
        path: '/api/pages/{slug}',
        summary: 'Get a public content page (Terms, Privacy Policy, Contact Us)',
        description: 'Public — no authentication required. Content is admin-editable HTML.',
        tags: ['Pages'],
        parameters: [new OA\PathParameter(name: 'slug', description: 'terms | privacy | contact', schema: new OA\Schema(type: 'string'))],
        responses: [
            new OA\Response(response: 200, description: 'Page content', content: new OA\JsonContent(properties: [
                new OA\Property(property: 'slug', type: 'string', example: 'terms'),
                new OA\Property(property: 'title', type: 'string', example: 'Terms and Conditions'),
                new OA\Property(property: 'content', type: 'string', description: 'HTML'),
                new OA\Property(property: 'updatedAt', type: 'string', format: 'date-time'),
            ])),
            new OA\Response(response: 404, description: 'No page with this slug'),
        ],
    )]
    public function show(string $slug): JsonResponse
    {
        $page = LegalPage::where('slug', $slug)->first();

        if (! $page) {
            return response()->json(['message' => 'Page not found.'], 404);
        }

        return response()->json([
            'slug' => $page->slug,
            'title' => $page->title,
            'content' => $page->content,
            'updatedAt' => $page->updated_at,
        ]);
    }
}
