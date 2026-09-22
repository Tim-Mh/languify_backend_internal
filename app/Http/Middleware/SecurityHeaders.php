<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Hardening headers on every response (SEC-06).
 *
 * The web tier already sets some of these in `.htaccess`, but the API is a
 * different host and was answering with only HSTS, X-Frame-Options and
 * X-Content-Type-Options — no Referrer-Policy, no Permissions-Policy — while
 * announcing its exact PHP version in `X-Powered-By`. Setting them here rather
 * than in server config keeps them with the application, so they survive a move
 * between hosts and are visible to anyone reading the code.
 *
 * Each one closes a bug class rather than a bug:
 *
 * - `nosniff` stops a browser second-guessing a Content-Type, which is what
 *   turns an uploaded file served as text/plain into executable script.
 * - `frame-ancestors 'none'` is the modern clickjacking control;
 *   X-Frame-Options stays alongside it for older browsers. Nothing here is
 *   meant to be embedded: this host serves JSON and audio.
 * - `Referrer-Policy` stops a full URL, including any token in a query string,
 *   leaking to a third party in the Referer header.
 * - `Permissions-Policy` switches off camera, microphone, geolocation and
 *   payment. An API needs none of them, and an unset policy is permissive.
 *
 * Note the deliberate asymmetry: CSP is not set here. A meaningful policy for
 * the admin panel's Blade pages, which load Tailwind and Quill from a CDN, is a
 * different and larger change; a wrong CSP breaks the panel silently. The API's
 * JSON responses are not a script execution context, so the value of adding one
 * here is small.
 */
class SecurityHeaders
{
    /**
     * Two years, matching what the web tier already sends. Long max-age is the
     * point of HSTS: a short one leaves a window where the first request of a
     * session can still be downgraded.
     */
    private const HSTS = 'max-age=63072000; includeSubDomains';

    private const PERMISSIONS = 'camera=(), microphone=(), geolocation=(), payment=(), usb=(), interest-cohort=()';

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('Content-Security-Policy', "frame-ancestors 'none'");
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', self::PERMISSIONS);

        // Only over TLS. Sending HSTS on a plain-HTTP response is ignored by
        // browsers and would break local development over http://127.0.0.1.
        if ($request->secure()) {
            $response->headers->set('Strict-Transport-Security', self::HSTS);
        }

        // "Strip server and framework version headers." PHP adds this one from
        // php.ini (expose_php), which cannot be changed from application code on
        // shared hosting, so it is removed per response instead.
        $response->headers->remove('X-Powered-By');
        header_remove('X-Powered-By');

        return $response;
    }
}
