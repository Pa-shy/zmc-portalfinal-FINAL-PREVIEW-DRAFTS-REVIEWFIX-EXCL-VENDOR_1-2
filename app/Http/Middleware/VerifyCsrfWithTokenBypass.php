<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

class VerifyCsrfWithTokenBypass extends ValidateCsrfToken
{
    protected $except = [
        'logout',
        'staff/logout',
        'payments/*/upload-proof',
        'payments/*/upload-waiver',
        'payments/*/initiate',
        'payments/*/initiate-mobile',
        'portal/accreditation/submit',
        'portal/accreditation/save-draft',
        'portal/media-house/submit',
        'portal/media-house/save-draft',
        'portal/media-house/register',
    ];

    protected function tokensMatch($request): bool
    {
        if ($request->attributes->get('_token_authenticated')) {
            return true;
        }

        return parent::tokensMatch($request);
    }
}
