<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'title',
        'body',
        'closing_at',
        'image_path',
        'attachment_path',
        'attachment_original_name',
        'attachment_mime',
        'is_published',
        'published_at',
        'created_by',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'closing_at' => 'datetime',
    ];
}
