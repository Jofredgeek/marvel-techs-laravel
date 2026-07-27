<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Project;
use App\Models\Quote;
use App\Models\Service;
use App\Models\User;
use App\Observers\RecordsSiteActivity;
use App\Services\ActivityLogger;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Contact::observe(RecordsSiteActivity::class);
        Quote::observe(RecordsSiteActivity::class);
        User::observe(RecordsSiteActivity::class);
        Service::observe(RecordsSiteActivity::class);
        Project::observe(RecordsSiteActivity::class);
        Post::observe(RecordsSiteActivity::class);

        Event::listen(Login::class, function (Login $event): void {
            if ($event->user instanceof User) {
                if (Schema::hasColumn('users', 'last_login_at')) {
                    DB::table('users')
                        ->where('id', $event->user->id)
                        ->update(['last_login_at' => now(), 'last_seen_at' => now()]);
                }

                app(ActivityLogger::class)->record(
                    'login',
                    'security',
                    "Connexion de {$event->user->name}",
                    user: $event->user,
                );
            }
        });

        Event::listen(Logout::class, function (Logout $event): void {
            if ($event->user instanceof User) {
                app(ActivityLogger::class)->record(
                    'logout',
                    'security',
                    "Déconnexion de {$event->user->name}",
                    user: $event->user,
                );
            }
        });

        Event::listen(Failed::class, function (): void {
            app(ActivityLogger::class)->record(
                'login_failed',
                'security',
                'Tentative de connexion échouée',
            );
        });

        View::composer('components.admin.layout', function ($view): void {
            $view->with('adminNavCounts', [
                'contacts' => Schema::hasTable('contacts') ? Contact::where('read', false)->count() : 0,
                'quotes' => Schema::hasTable('quotes') ? Quote::where('read', false)->count() : 0,
            ]);
        });
    }
}
