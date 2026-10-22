<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = [
        'session_id', 'role', 'content',
    ];

    public function scopeSession($query, string $sessionId)
    {
        return $query->where('session_id', $sessionId);
    }
}
