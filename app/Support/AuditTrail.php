<?php

namespace App\Support;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

class AuditTrail
{
    public static function log(string $action, $model = null, array $meta = []): void
    {
        try {
            $actorId = Auth::id();
            $modelType = $model ? get_class($model) : null;
            $modelId = $model?->id ?? null;

            AuditLog::create([
                'actor_user_id' => $actorId,
                'action'        => $action,
                'model_type'    => $modelType,
                'model_id'      => $modelId,
                'meta'          => $meta,
                'ip'            => request()->ip(),
                'user_agent'    => substr((string)request()->userAgent(), 0, 500),
                'created_at'    => now(),
            ]);

            if ($model instanceof \App\Models\Application) {
                \App\Models\AuditTrail::logApplicationAction(
                    $model,
                    $action,
                    $meta['description'] ?? ($meta['notes'] ?? ($meta['reason'] ?? "Action $action performed")),
                    isset($meta['from_status']) ? ['status' => $meta['from_status']] : null
                );
            }
        } catch (\Throwable $e) {
            // Never break core flows because of audit logging.
        }
    }
}
