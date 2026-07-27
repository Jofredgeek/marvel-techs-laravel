<?php

namespace App\Services;

use App\Models\SiteActivity;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Throwable;

class ActivityLogger
{
    public function record(
        string $event,
        string $category,
        string $description,
        ?Model $subject = null,
        array $metadata = [],
        ?User $user = null,
        ?string $route = null,
    ): ?SiteActivity {
        if (! Schema::hasTable('site_activities')) {
            return null;
        }

        try {
            $request = app()->runningInConsole() ? null : request();
            $ip = $request?->ip();

            return SiteActivity::create([
                'user_id' => $user?->id ?? auth()->id(),
                'event' => $event,
                'category' => $category,
                'description' => $description,
                'subject_type' => $subject?->getMorphClass(),
                'subject_id' => $subject?->getKey(),
                'route' => $route ?? $request?->route()?->getName(),
                'method' => $request?->method(),
                'ip_hash' => $ip ? hash_hmac('sha256', $ip, (string) config('app.key')) : null,
                'metadata' => $metadata ?: null,
            ]);
        } catch (Throwable $exception) {
            if (app()->environment('testing')) {
                throw $exception;
            }

            report($exception);

            return null;
        }
    }
}
