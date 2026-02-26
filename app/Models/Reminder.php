<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reminder extends Model
{
    protected $fillable = [
        'target_type',
        'target_id',
        'reminder_type',
        'message',
        'created_by',
        'acknowledged_at',
        'acknowledged_by',
    ];

    protected $casts = [
        'acknowledged_at' => 'datetime',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeUnacknowledged($query)
    {
        return $query->whereNull('acknowledged_at');
    }

    public function scopeForTarget($query, string $type, int $id)
    {
        return $query->where('target_type', $type)->where('target_id', $id);
    }
}
