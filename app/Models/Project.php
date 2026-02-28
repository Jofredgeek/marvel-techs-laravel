<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'client', 'year', 'tags', 'excerpt', 'content', 'cover_image', 'gallery', 'featured'];

    protected $casts = [
        'tags' => 'array',
        'gallery' => 'array',
        'featured' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(fn($m) => $m->slug ??= Str::slug($m->title));
    }
}