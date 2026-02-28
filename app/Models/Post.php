<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'category', 'tags', 'cover_image', 'published_at', 'active'];

    protected $casts = [
        'tags' => 'array',
        'published_at' => 'datetime',
        'active' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(fn($m) => $m->slug ??= Str::slug($m->title));
    }

    public function scopePublished($query)
    {
        return $query->where('active', true)->whereNotNull('published_at')->where('published_at', '<=', now());
    }
}