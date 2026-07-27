<?php

namespace App\Models;

use App\Models\Concerns\HasUniqueSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, HasUniqueSlug;

    protected $fillable = ['title', 'slug', 'icon', 'excerpt', 'content', 'features', 'technologies', 'sort_order', 'active'];

    protected $casts = [
        'features' => 'array',
        'technologies' => 'array',
        'active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
