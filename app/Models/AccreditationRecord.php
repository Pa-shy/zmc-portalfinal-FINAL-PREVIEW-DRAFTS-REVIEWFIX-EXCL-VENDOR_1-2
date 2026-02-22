<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccreditationRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'holder_user_id',
        'application_id',
        'certificate_no',
        'record_number',
        'status',
        'issued_at',
        'expires_at',
        'collected_at',
        'card_issued_at',
        'qr_token',
        'meta',
    ];

    protected $casts = [
        'issued_at' => 'date',
        'expires_at' => 'date',
        'collected_at' => 'datetime',
        'card_issued_at' => 'datetime',
        'meta' => 'array',
    ];

    public function holder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'holder_user_id');
    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }
}
