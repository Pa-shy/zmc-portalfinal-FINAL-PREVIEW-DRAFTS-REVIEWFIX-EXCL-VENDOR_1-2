<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable = [
        'title',
        'description',
        'closing_at',
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
