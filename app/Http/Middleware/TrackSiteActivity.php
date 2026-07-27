<?php

namespace App\Http\Middleware;

use App\Services\ActivityLogger;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;

class TrackSiteActivity
{
    private const PUBLIC_ROUTES = [
        'home' => 'Page d’accueil consultée',
        'about' => 'Page À propos consultée',
        'services.index' => 'Catalogue des services consulté',
        'services.show' => 'Détail d’un service consulté',
        'portfolio.index' => 'Portfolio consulté',
        'portfolio.show' => 'Détail d’une réalisation consulté',
        'blog.index' => 'Blog consulté',
        'blog.show' => 'Article du blog consulté',
        'contact' => 'Page de contact consultée',
        'quote' => 'Page de devis consultée',
        'login' => 'Page de connexion consultée',
        'register' => 'Page d’inscription consultée',
    ];

    public function __construct(private readonly ActivityLogger $logger) {}

    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()?->getName();
        $response = $next($request);

        if ($response->getStatusCode() >= 400) {
            return $response;
        }

        $this->touchAuthenticatedUser($request);
        $this->recordPublicPageView($request, $routeName);

        return $response;
    }

    private function touchAuthenticatedUser(Request $request): void
    {
        if (
            ! $request->user()
            || $request->session()->has('activity_seen_at')
            || ! Schema::hasColumn('users', 'last_seen_at')
        ) {
            return;
        }

        DB::table('users')
            ->where('id', $request->user()->id)
            ->update(['last_seen_at' => now()]);

        $request->session()->put('activity_seen_at', now()->timestamp);
    }

    private function recordPublicPageView(Request $request, ?string $routeName): void
    {
        if (! $request->isMethod('GET')) {
            return;
        }

        if (! $routeName || ! isset(self::PUBLIC_ROUTES[$routeName])) {
            return;
        }

        $routeKey = 'page_view_'.hash('sha256', $request->fullUrl());

        if ($request->session()->has($routeKey)) {
            return;
        }

        $subject = $request->route('service')
            ?? $request->route('project')
            ?? $request->route('post');

        $this->logger->record(
            'page_view',
            'traffic',
            self::PUBLIC_ROUTES[$routeName],
            $subject instanceof Model ? $subject : null,
            route: $routeName,
        );

        $request->session()->put($routeKey, true);
    }
}
