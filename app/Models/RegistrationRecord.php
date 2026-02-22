<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_user_id',
        'application_id',
        'entity_name',
        'registration_no',
        'record_number',
        'status',
        'issued_at',
        'expires_at',
        'collected_at',
        'qr_token',
        'meta',
    ];

    protected $casts = [
        'issued_at' => 'date',
        'expires_at' => 'date',
        'collected_at' => 'datetime',
        'meta' => 'array',
    ];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(User::class, 'contact_user_id');
    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }
}
