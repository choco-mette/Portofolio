<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'published_date',
        'external_url',
        'content',
        'is_published',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_published' => 'boolean',
    ];
}
