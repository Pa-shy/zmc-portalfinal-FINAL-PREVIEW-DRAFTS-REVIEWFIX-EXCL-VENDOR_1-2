<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle public registration.
     * Must redirect to /home to allow portal router to forward correctly.
     */
    public function store(Request $request)
    {
        // Preserve portal choice (journalist vs mediahouse) across login session regeneration.
        $portal = $request->session()->get('public_selected_portal');
        // Portal-aware validation:
        // - Media Practitioner: first + last name
        // - Mass media (media house): organization_name
        $rules = [
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'phone_country_code' => ['nullable','string','max:10'],
            'phone_number'       => ['nullable','string','max:30'],
        ];

        if ($portal === 'mass_media') {
            $rules['organization_name'] = ['required','string','max:255'];
        } else {
            $rules['first_name'] = ['required', 'string', 'max:255'];
            $rules['last_name']  = ['required', 'string', 'max:255'];
        }

        $request->validate($rules);

        $fullName = $portal === 'mass_media'
            ? trim($request->organization_name)
            : trim($request->first_name . ' ' . $request->last_name);

        $profile = [
            'portal' => $portal ?: 'journalist',
        ];
        if ($portal === 'mass_media') {
            $profile['organization_name'] = $request->organization_name;
        } else {
            $profile['first_name'] = $request->first_name;
            $profile['surname'] = $request->last_name;
        }

        $user = User::create([
            'name' => $fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'approved_at' => now(),
            'account_status' => 'active',
            'account_type' => 'public',
            'phone_country_code' => $request->phone_country_code,
            'phone_number' => $request->phone_number,
            'profile_data' => $profile,
        ]);

        Auth::login($user);

        if ($portal) {
            $request->session()->put('public_selected_portal', $portal);
        }

        \App\Support\AuditTrail::log('account_created_applicant', $user);

        // IMPORTANT: route to /home (portal decision happens there)
        return redirect()->route('home');
    }
}
