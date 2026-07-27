<?php

use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\TrackSiteActivity;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
        $middleware->alias([
            'admin' => EnsureUserIsAdmin::class,
        ]);
        $middleware->appendToGroup('web', TrackSiteActivity::class);
        $middleware->redirectTo(
            guests: '/login',
            users: fn (Request $request) => route(
                $request->user()?->homeRoute() ?? 'dashboard',
                absolute: false
            )
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
