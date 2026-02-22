<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * If an applicant is authenticated and tries to access staff routes,
 * force a logout so they must login via /staff.
 */
class EnsureStaffPortal
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user && method_exists($user, 'hasAnyRole')) {
            $isStaff = $user->hasAnyRole([
                'super_admin','accreditation_officer','accounts_payments','registrar','production','it_admin','auditor','director','oversight'
            ]);
            if (!$isStaff) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('staff.entry')
                    ->withErrors(['email' => 'Please login via the staff portal to access staff dashboards.']);
            }
            
            // Auto-set active_staff_role if missing
            if (!$request->session()->has('active_staff_role')) {
                // Get user's first staff role
                $staffRoles = ['super_admin','accreditation_officer','accounts_payments','registrar','production','it_admin','auditor','director','oversight'];
                foreach ($staffRoles as $role) {
                    if ($user->hasRole($role)) {
                        $request->session()->put('active_staff_role', $role);
                        break;
                    }
                }
            }
        }

        return $next($request);
    }
}
