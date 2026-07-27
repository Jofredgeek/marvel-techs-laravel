<?php

namespace App\Models;

use App\Models\Concerns\HasUniqueSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, HasUniqueSlug;

    protected $fillable = ['title', 'slug', 'client', 'year', 'tags', 'excerpt', 'content', 'cover_image', 'gallery', 'featured'];

    protected $casts = [
        'tags' => 'array',
        'gallery' => 'array',
        'featured' => 'boolean',
    ];
}
