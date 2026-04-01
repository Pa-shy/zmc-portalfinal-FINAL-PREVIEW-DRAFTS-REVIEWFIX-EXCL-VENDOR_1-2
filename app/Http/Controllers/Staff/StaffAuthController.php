<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class StaffAuthController extends Controller
{
    public function show(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userRoles = $this->roleNamesForUser($user->id);
            $staffRoles = array_values(array_intersect($userRoles, $this->staffAllowedRoles()));

            if (count($staffRoles) > 0) {
                $active = $request->session()->get('active_staff_role');
                if ($active && in_array($active, $staffRoles, true)) {
                    return $this->redirectToRoleDashboard($active);
                }
                $role = $staffRoles[0];
                $request->session()->put('active_staff_role', $role);
                return $this->redirectToRoleDashboard($role);
            }
        }

        return view('staff.login');
    }

    public function login(Request $request)
    {
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
            ]);
            \App\Support\LoginHistory::record(null, $request, false, 'Invalid credentials (Staff)');

            return back()->withErrors(['email' => 'Invalid login credentials'])->withInput();
        }

        $request->session()->regenerate();

        $user = Auth::user();

        if (!$user) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('staff.login');
        }

        if (($user->account_status ?? 'active') !== 'active') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('staff.login')
                ->withErrors(['email' => 'Account is not active. Please contact the system administrator.']);
        }

        $userRoles = $this->roleNamesForUser($user->id);
        $staffRoles = array_values(array_intersect($userRoles, $this->staffAllowedRoles()));

        if (count($staffRoles) === 0) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('staff.login')
                ->withErrors(['email' => 'Access denied. Not a staff account.']);
        }

        $otp = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
        $user->otp_code = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        $emailSent = false;
        try {
            Mail::raw(
                "Your ZMC Staff Login OTP is: {$otp}\n\nThis code expires in 10 minutes. If you did not request this, please ignore.",
                function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('ZMC Staff Login - OTP Verification');
                }
            );
            $emailSent = true;
        } catch (\Throwable $e) {
            \Log::warning('OTP email failed: ' . $e->getMessage());
        }

        Auth::logout();

        $request->session()->put('otp_user_id', $user->id);
        $request->session()->put('otp_staff_roles', $staffRoles);

        \App\Support\AuditTrail::log('otp_sent', $user, ['email' => $user->email, 'delivered' => $emailSent]);

        if (!$emailSent) {
            return redirect()->route('staff.otp.show')
                ->with('warning', 'OTP could not be emailed. Please contact IT support or try again.');
        }

        return redirect()->route('staff.otp.show');
    }

    public function showOtp(Request $request)
    {
        if (!$request->session()->has('otp_user_id')) {
            return redirect()->route('staff.login');
        }

        $user = User::find($request->session()->get('otp_user_id'));
        $maskedEmail = $this->maskEmail($user->email ?? '');

        return view('staff.otp-verify', compact('maskedEmail'));
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $userId = $request->session()->get('otp_user_id');

        if (!$userId) {
            return redirect()->route('staff.login')
                ->withErrors(['email' => 'Session expired. Please log in again.']);
        }

        $attempts = $request->session()->get('otp_attempts', 0) + 1;
        $request->session()->put('otp_attempts', $attempts);

        if ($attempts > 5) {
            $user = User::find($userId);
            if ($user) {
                $user->otp_code = null;
                $user->otp_expires_at = null;
                $user->save();
            }
            $request->session()->forget(['otp_user_id', 'otp_staff_roles', 'otp_attempts']);
            return redirect()->route('staff.login')
                ->withErrors(['email' => 'Too many failed OTP attempts. Please log in again.']);
        }

        $user = User::find($userId);

        if (!$user || $user->otp_code !== $request->otp) {
            $remaining = 5 - $attempts;
            return back()->withErrors(['otp' => "Invalid OTP code. {$remaining} attempt(s) remaining."]);
        }

        if ($user->otp_expires_at && $user->otp_expires_at->isPast()) {
            $request->session()->forget(['otp_user_id', 'otp_staff_roles', 'otp_attempts']);
            return redirect()->route('staff.login')
                ->withErrors(['email' => 'OTP has expired. Please log in again.']);
        }

        if (($user->account_status ?? 'active') !== 'active') {
            $request->session()->forget(['otp_user_id', 'otp_staff_roles', 'otp_attempts']);
            return redirect()->route('staff.login')
                ->withErrors(['email' => 'Account is no longer active.']);
        }

        $currentRoles = $this->roleNamesForUser($user->id);
        $staffRoles = array_values(array_intersect($currentRoles, $this->staffAllowedRoles()));

        if (count($staffRoles) === 0) {
            $request->session()->forget(['otp_user_id', 'otp_staff_roles', 'otp_attempts']);
            return redirect()->route('staff.login')
                ->withErrors(['email' => 'Access denied. Staff role has been revoked.']);
        }

        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();

        Auth::login($user);
        $request->session()->regenerate();

        $request->session()->forget(['otp_user_id', 'otp_staff_roles', 'otp_attempts']);

        $role = $staffRoles[0];
        $request->session()->put('active_staff_role', $role);

        \App\Support\AuditTrail::log('login_staff', $user, ['role' => $role]);
        \App\Support\LoginHistory::record($user, $request, true);

        return $this->redirectToRoleDashboard($role);
    }

    public function resendOtp(Request $request)
    {
        $userId = $request->session()->get('otp_user_id');

        if (!$userId) {
            return redirect()->route('staff.login');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('staff.login');
        }

        $otp = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
        $user->otp_code = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        try {
            Mail::raw(
                "Your ZMC Staff Login OTP is: {$otp}\n\nThis code expires in 10 minutes. If you did not request this, please ignore.",
                function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('ZMC Staff Login - OTP Verification');
                }
            );
        } catch (\Throwable $e) {
            \Log::warning('OTP resend email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'A new OTP has been sent to your email.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->forget(['active_staff_role', 'staff_selected_role', 'otp_user_id', 'otp_staff_roles']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('staff.login');
    }

    public function showActivation(Request $request, string $token)
    {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return redirect()->route('staff.login')
                ->withErrors(['email' => 'Invalid or expired activation link.']);
        }

        if ($user->activated_at) {
            return redirect()->route('staff.login')
                ->with('success', 'Account already activated. Please log in.');
        }

        return view('staff.activate', compact('token', 'user'));
    }

    public function activate(Request $request, string $token)
    {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return redirect()->route('staff.login')
                ->withErrors(['email' => 'Invalid or expired activation link.']);
        }

        $data = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = $data['password'];
        $user->activated_at = now();
        $user->activation_token = null;
        $user->account_status = 'active';
        $user->save();

        \App\Support\AuditTrail::log('account_activated', $user);

        return redirect()->route('staff.login')
            ->with('success', 'Account activated successfully. You can now log in.');
    }

    private function redirectToRoleDashboard(string $role)
    {
        return match ($role) {
            'super_admin'            => redirect()->route('admin.dashboard'),
            'accreditation_officer'  => redirect()->route('staff.officer.dashboard'),
            'registrar'              => redirect()->route('staff.registrar.dashboard'),
            'accounts_payments',
            'chief_accountant'       => redirect()->route('staff.accounts.dashboard'),
            'production'             => redirect()->route('staff.production.dashboard'),
            'it_admin'               => redirect()->route('staff.it.dashboard'),
            'auditor'                => redirect()->route('staff.auditor.dashboard'),
            'director'               => redirect()->route('staff.director.dashboard'),
            'pr_officer'             => redirect()->route((\Illuminate\Support\Facades\Route::has('staff.pr.dashboard') ? 'staff.pr.dashboard' : 'staff.officer.dashboard')),
            'public_info_compliance' => redirect()->route((\Illuminate\Support\Facades\Route::has('staff.compliance.dashboard') ? 'staff.compliance.dashboard' : 'staff.officer.dashboard')),
            'research_training'      => redirect()->route((\Illuminate\Support\Facades\Route::has('staff.research.dashboard') ? 'staff.research.dashboard' : 'staff.officer.dashboard')),
            default                  => redirect()->route('staff.login'),
        };
    }

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
            'pr_officer',
            'public_info_compliance',
            'research_training',
            'chief_accountant',
        ];
    }

    private function roleNamesForUser(int $userId): array
    {
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

    private function maskEmail(string $email): string
    {
        $parts = explode('@', $email);
        if (count($parts) !== 2) return '***@***';

        $name = $parts[0];
        $domain = $parts[1];

        if (strlen($name) <= 2) {
            $masked = $name[0] . '***';
        } else {
            $masked = $name[0] . str_repeat('*', strlen($name) - 2) . $name[strlen($name) - 1];
        }

        return $masked . '@' . $domain;
    }
}
