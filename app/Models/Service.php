<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'icon', 'excerpt', 'content', 'features', 'technologies', 'sort_order', 'active'];

    protected $casts = [
        'features' => 'array',
        'technologies' => 'array',
        'active' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(fn($m) => $m->slug ??= Str::slug($m->title));
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}