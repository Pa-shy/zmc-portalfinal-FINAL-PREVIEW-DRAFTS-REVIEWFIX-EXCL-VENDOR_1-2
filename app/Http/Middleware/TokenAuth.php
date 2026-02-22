<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class TokenAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->query('_auth_token');

        if ($token && !Auth::check()) {
            $data = Cache::pull('login_token:' . $token);

            if ($data && is_array($data) && isset($data['user_id'])) {
                Auth::loginUsingId($data['user_id']);

                if (isset($data['role'])) {
                    $request->session()->put('active_staff_role', $data['role']);
                }
            }
        }

        return $next($request);
    }
}
