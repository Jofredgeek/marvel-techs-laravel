<?php

namespace App\Models;

use App\Models\Concerns\HasUniqueSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, HasUniqueSlug;

    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'category', 'tags', 'cover_image', 'published_at', 'active'];

    protected $casts = [
        'tags' => 'array',
        'published_at' => 'datetime',
        'active' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('active', true)->whereNotNull('published_at')->where('published_at', '<=', now());
    }
}
