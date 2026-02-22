<?php

namespace App\Http\Controllers;

use App\Models\AccreditationRecord;
use App\Models\RegistrationRecord;
use Illuminate\Http\Request;

class PublicVerificationController extends Controller
{
    /**
     * Verify an accreditation or registration via QR token.
     */
    public function verify($token)
    {
        // Search in accreditation records first
        $record = AccreditationRecord::with(['holder', 'application'])
            ->where('qr_token', $token)
            ->first();

        $type = 'accreditation';

        if (!$record) {
            // Search in registration records
            $record = RegistrationRecord::with(['contact', 'application'])
                ->where('qr_token', $token)
                ->first();
            $type = 'registration';
        }

        if (!$record) {
            return view('public.verify', ['error' => 'Invalid or expired verification token.']);
        }

        return view('public.verify', compact('record', 'type'));
    }
}
