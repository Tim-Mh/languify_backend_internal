<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * After a save or delete, go back to the page the admin started from (say,
 * the Content Tree on the language they were working in) instead of always
 * landing on the flat list.
 *
 * Forms carry that page as a hidden `return` field. Only addresses inside
 * this panel are honoured, so the field can never send anyone off-site.
 */
trait ReturnsToPreviousPage
{
    /** Where a form should send the admin back to: the page they came from. */
    protected function returnUrl(Request $request): ?string
    {
        // old() first: after a failed save the form is shown again, and the
        // page it was opened from is only remembered in the flashed input.
        $candidate = $request->old('return') ?? $request->input('return') ?? url()->previous();

        return $this->isPanelUrl($candidate) && $candidate !== $request->fullUrl() ? $candidate : null;
    }

    protected function backTo(Request $request, string $fallbackRoute, string $status): RedirectResponse
    {
        // A delete button carries no field, so it falls back to the page it
        // was pressed on.
        $return = $request->input('return') ?? url()->previous();

        return ($this->isPanelUrl($return) ? redirect()->to($return) : redirect()->route($fallbackRoute))
            ->with('status', $status);
    }

    private function isPanelUrl(?string $url): bool
    {
        return is_string($url) && str_starts_with($url, url('/admin').'/') && ! str_contains($url, '/edit') && ! str_ends_with(parse_url($url, PHP_URL_PATH) ?? '', '/create');
    }
}
