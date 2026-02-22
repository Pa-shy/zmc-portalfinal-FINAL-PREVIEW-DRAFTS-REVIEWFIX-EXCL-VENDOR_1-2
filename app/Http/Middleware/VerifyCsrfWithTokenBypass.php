<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

class VerifyCsrfWithTokenBypass extends ValidateCsrfToken
{
    protected function tokensMatch($request): bool
    {
        if ($request->attributes->get('_token_authenticated')) {
            return true;
        }

        return parent::tokensMatch($request);
    }
}
