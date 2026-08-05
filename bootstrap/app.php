<?php

use App\Http\Middleware\AuthenticateFromCookie;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\RequireActiveSubscription;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'auth.cookie' => AuthenticateFromCookie::class,
            'role' => EnsureUserHasRole::class,
            'subscription.active' => RequireActiveSubscription::class,
        ]);

        // Laravel's middleware sorter matches auth:sanctum against the
        // AuthenticatesRequests interface (not the Authenticate class itself),
        // and otherwise runs it before this alias regardless of route
        // declaration order — breaking cookie-to-Bearer-token translation.
        $middleware->prependToPriorityList(
            before: AuthenticatesRequests::class,
            prepend: AuthenticateFromCookie::class,
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );

        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
        });
    })->create();
