<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'company', 'service', 'budget', 'deadline', 'details', 'status', 'read'];
    protected $casts = ['deadline' => 'date', 'read' => 'boolean'];
}