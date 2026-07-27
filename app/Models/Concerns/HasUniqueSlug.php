<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUniqueSlug
{
    protected static function bootHasUniqueSlug(): void
    {
        static::creating(function (Model $model): void {
            if (filled($model->slug)) {
                return;
            }

            $baseSlug = Str::slug($model->title) ?: 'element';
            $slug = $baseSlug;
            $suffix = 2;

            while ($model->newQuery()->where('slug', $slug)->exists()) {
                $slug = "{$baseSlug}-{$suffix}";
                $suffix++;
            }

            $model->slug = $slug;
        });
    }
}
