<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class StaffAuthController extends Controller
{
    public function show(Request $request)
    {
        // If user is already logged in, keep them inside staff flow
        if (Auth::check()) {
            return $this->redirectAfterLogin(Auth::user(), $request);
        }

        // Must choose role first
        if (!$request->session()->has('staff_selected_role')) {
            return redirect()->route('staff.entry'); // /staff landing
        }

        return view('staff.login');
    }

    public function login(Request $request)
    {
        // Must choose role first
        $selectedRole = $request->session()->get('staff_selected_role');
        if (!$selectedRole) {
            return redirect()->route('staff.entry');
        }

        $credentials = $request->validate([
            'email'    => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt(
            ['email' => $credentials['email'], 'password' => $credentials['password']],
            $request->boolean('remember')
        )) {
            \App\Support\AuditTrail::log('login_failed', null, [
                'portal' => 'staff',
                'email' => $credentials['email'],
                'selected_role' => $selectedRole,
            ]);
            return back()->withErrors(['email' => 'Invalid login credentials'])->withInput();
        }

        $request->session()->regenerate();

        $loginToken = bin2hex(random_bytes(32));
        \Illuminate\Support\Facades\Cache::put('login_token:' . $loginToken, [
            'user_id' => Auth::id(),
            'role' => $selectedRole,
        ], now()->addMinutes(2));

        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (!$user) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('staff.entry');
        }

        // Block suspended / pending accounts (keep this)
        if (($user->account_status ?? 'active') !== 'active') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('staff.login')
                ->withErrors(['email' => 'Account is not active. Please contact the system administrator.']);
        }

        /**
         * ✅ REMOVED: approval blocking on login
         * You requested approval to be enforced at IT Admin account generation instead.
         */

        // ✅ Pull roles from DB (Spatie tables) — no trait methods needed
        $userRoles = $this->roleNamesForUser($user->id);

        // Check that user is staff
        $staffRoles = array_values(array_intersect($userRoles, $this->staffAllowedRoles()));
        if (count($staffRoles) === 0) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('staff.login')
                ->withErrors(['email' => 'Access denied. Not a staff account.']);
        }

        // ✅ Enforce selected role must be owned by user
        if (!in_array($selectedRole, $userRoles, true)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('staff.login')
                ->withErrors(['email' => 'You are not authorized for the selected staff role.']);
        }

        $request->session()->put('active_staff_role', $selectedRole);
        $request->session()->forget('staff_selected_role');

        \App\Support\AuditTrail::log('login_staff', $user, ['role' => $selectedRole]);

        $redirectUrl = $this->getRoleDashboardUrl($selectedRole);
        $separator = str_contains($redirectUrl, '?') ? '&' : '?';
        $redirectUrl .= $separator . '_auth_token=' . $loginToken;
        return response(
            '<html><head><meta http-equiv="refresh" content="0;url=' . e($redirectUrl) . '"></head>'
            . '<body><p>Redirecting…</p><script>window.location.href="' . e($redirectUrl) . '";</script></body></html>'
        )->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->forget(['active_staff_role', 'staff_selected_role']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('staff.entry');
    }

    private function redirectAfterLogin($user, Request $request)
    {
        if (!$user) {
            return redirect()->route('staff.entry');
        }

        $userRoles = $this->roleNamesForUser($user->id);
        $staffRoles = array_values(array_intersect($userRoles, $this->staffAllowedRoles()));

        if (count($staffRoles) === 0) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('staff.entry')
                ->withErrors(['email' => 'Access denied. Not a staff account.']);
        }

        // If active role exists and user still has it -> go there
        $active = $request->session()->get('active_staff_role');
        if ($active && in_array($active, $userRoles, true)) {
            return $this->redirectToRoleDashboard($active);
        }

        // Otherwise force role selection again
        return redirect()->route('staff.entry');
    }

    private function redirectToRoleDashboard(string $role)
    {
        return redirect($this->getRoleDashboardUrl($role));
    }

    private function getRoleDashboardUrl(string $role): string
    {
        return match ($role) {
            'super_admin'            => route('admin.dashboard'),
            'accreditation_officer'  => route('staff.officer.dashboard'),
            'registrar'              => route('staff.registrar.dashboard'),
            'accounts_payments'      => route('staff.accounts.dashboard'),
            'production'             => route('staff.production.dashboard'),
            'it_admin'               => route('staff.it.dashboard'),
            'auditor'                => route('staff.auditor.dashboard'),
            'director'               => route('staff.director.dashboard'),
            default                  => route('staff.entry'),
        };
    }

    /**
     * Staff roles permitted in the staff portal.
     */
    private function staffAllowedRoles(): array
    {
        return [
            'super_admin',
            'accreditation_officer',
            'registrar',
            'accounts_payments',
            'production',
            'it_admin',
            'auditor',
            'director',
        ];
    }

    /**
     * ✅ Reads roles from Spatie tables directly:
     * model_has_roles + roles
     */
    private function roleNamesForUser(int $userId): array
    {
        // Default Spatie table names (works unless you customized config)
        $rolesTable = 'roles';
        $modelHasRolesTable = 'model_has_roles';

        return DB::table($modelHasRolesTable)
            ->join($rolesTable, "{$rolesTable}.id", '=', "{$modelHasRolesTable}.role_id")
            ->where("{$modelHasRolesTable}.model_id", $userId)
            ->where("{$modelHasRolesTable}.model_type", User::class)
            ->pluck("{$rolesTable}.name")
            ->map(fn ($r) => (string) $r)
            ->toArray();
    }
}
