<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditFlag extends Model
{
    protected $fillable = [
        'auditor_user_id',
        'entity_type',
        'entity_id',
        'severity',
        'reason',
    ];

    public function auditor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'auditor_user_id');
    }
}
