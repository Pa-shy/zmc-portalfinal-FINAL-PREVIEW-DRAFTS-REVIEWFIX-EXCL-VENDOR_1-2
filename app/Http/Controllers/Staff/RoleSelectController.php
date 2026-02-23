<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleSelectController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('staff_selected_role');

        $roles = [
            [
                'key' => 'accreditation_officer',
                'title' => 'Accreditation Officer',
                'desc' => 'Review applications, verify documents, communicate with applicants, approve for payment or reject. Multi-user role assigned by collection region.',
                'icon' => 'ri-shield-user-line',
            ],
            [
                'key' => 'accounts_payments',
                'title' => 'Accounts / Payments',
                'desc' => 'Check waivers and payment proofs, receive payments via Paynow, approve to Registrar or reject applications.',
                'icon' => 'ri-bank-card-line',
            ],
            [
                'key' => 'registrar',
                'title' => 'Registrar',
                'desc' => 'Review approved applications from Accounts, approve for Production or reject. Final verification authority.',
                'icon' => 'ri-file-list-3-line',
            ],
            [
                'key' => 'production',
                'title' => 'Production Officer',
                'desc' => 'Generate press cards for journalists and certificates for media houses with QR codes. Handle printing and issuance. Multi-user role assigned by region.',
                'icon' => 'ri-printer-line',
            ],
            [
                'key' => 'it_admin',
                'title' => 'IT Administrator',
                'desc' => 'User management, account creation, role and permission assignment. Upload notices and events. System administration.',
                'icon' => 'ri-settings-3-line',
            ],
            [
                'key' => 'auditor',
                'title' => 'Auditor',
                'desc' => 'Read-only access to audit trails, reporting across the entire workflow. Monitor system activity.',
                'icon' => 'ri-eye-line',
            ],
            [
                'key' => 'director',
                'title' => 'Director',
                'desc' => 'Full access to the entire accreditation and registration process. Executive oversight and approval authority.',
                'icon' => 'ri-vip-crown-line',
            ],
            [
                'key' => 'super_admin',
                'title' => 'Super Admin',
                'desc' => 'Complete system access including all roles, settings, and administrative functions. Highest privilege level.',
                'icon' => 'ri-admin-line',
            ],
        ];

        return view('staff.select-role', compact('roles'));
    }

    public function choose(Request $request)
    {
        $data = $request->validate([
            'role' => ['required', 'string'],
        ]);

        $request->session()->put('staff_selected_role', $data['role']);

        return redirect()->route('staff.login', ['role' => $data['role']]);
    }
}
