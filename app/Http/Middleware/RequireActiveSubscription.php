<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * The app has no free tier — every account needs an active subscription
 * (their own, or inherited via a Family plan membership — see
 * User::hasActiveAppAccess()) to use anything beyond auth/subscribing/
 * accepting a family invite. Applied to routes/api.php's main protected
 * group EXCEPT the handful of routes needed to actually get access in the
 * first place (see the exceptions carved out there), so this can't create a
 * chicken-and-egg lockout.
 */
class RequireActiveSubscription
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()?->hasActiveAppAccess()) {
            return response()->json([
                'message' => 'An active subscription is required to use Languify.',
                'subscriptionRequired' => true,
            ], 402);
        }

        return $next($request);
    }
}
