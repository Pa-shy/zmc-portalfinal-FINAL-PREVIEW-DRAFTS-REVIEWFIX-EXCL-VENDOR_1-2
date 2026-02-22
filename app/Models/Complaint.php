<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'type',
        'full_name',
        'email',
        'phone',
        'subject',
        'message',
        'attachment_path',
        'attachment_original_name',
        'attachment_mime',
        'status',
        'handled_by',
        'handled_at',
    ];

    protected $casts = [
        'handled_at' => 'datetime',
    ];
}
