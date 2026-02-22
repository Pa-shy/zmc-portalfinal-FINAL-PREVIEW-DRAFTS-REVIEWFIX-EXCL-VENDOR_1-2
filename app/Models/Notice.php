<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title',
        'body',
        'target_portal',
        'is_published',
        'published_at',
        'created_by',
        'image_path',
        'attachment_path',
        'attachment_original_name',
        'attachment_mime',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
