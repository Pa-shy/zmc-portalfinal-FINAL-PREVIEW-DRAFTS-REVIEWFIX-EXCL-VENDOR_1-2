<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortalApplicationDetailsController extends Controller
{
    public function show(Request $request, Application $application)
    {
        $user = Auth::user();
        if (!$user) abort(403);

        // Applicants only access their own applications; staff may access anything.
        if (!$user->hasAnyRole(['accreditation_officer','accounts_payments','registrar','production','super_admin'])) {
            if ((int)$application->applicant_user_id !== (int)$user->id) {
                abort(403);
            }
        }

        $application->loadMissing(['applicant','documents']);

        $fd = $application->form_data;
        if (is_string($fd)) {
            $decoded = json_decode($fd, true);
            $fd = is_array($decoded) ? $decoded : [];
        }
        if (!is_array($fd)) $fd = [];

        $app = $application->toArray();
        $app['applicant_name'] = $application->applicant?->name;
        $app['form_code'] = match ($application->application_type) {
            'accreditation' => 'AP3',
            'registration'  => 'AP1',
            default         => strtoupper((string)$application->application_type),
        };

        foreach ([
            'title','first_name','surname','other_names','dob','sex','birth_place','origin','nationality',
            'id_passport_number','employer_name','medium_type','designation','assignment_brief','arrival_date',
            'departure_date','port_entry','zim_local_address','zim_address'
        ] as $k) {
            if (array_key_exists($k, $fd) && !array_key_exists($k, $app)) {
                $app[$k] = $fd[$k];
            }
        }

        $ap1 = [];
        if (isset($fd['ap1']) && is_array($fd['ap1'])) {
            $ap1 = $fd['ap1'];
        } else {
            $possible = ['category','service_name','operating_model','org_name','reg_no','website','head_office','postal_address',
                'contact_person','contact_email','contact_phone'];
            $hasAny = false;
            foreach ($possible as $p) {
                if (array_key_exists($p, $fd)) { $hasAny = true; break; }
            }
            if ($hasAny) {
                foreach ($possible as $p) {
                    if (array_key_exists($p, $fd)) $ap1[$p] = $fd[$p];
                }
            }
        }

        $directors = [];
        if (isset($fd['directors']) && is_array($fd['directors'])) $directors = $fd['directors'];
        if (isset($fd['directors_rows']) && is_array($fd['directors_rows'])) $directors = $fd['directors_rows'];

        $managers = [];
        if (isset($fd['managers']) && is_array($fd['managers'])) $managers = $fd['managers'];
        if (isset($fd['managers_rows']) && is_array($fd['managers_rows'])) $managers = $fd['managers_rows'];

        $documents = $application->documents->map(function ($d) {
            return [
                'document_type' => $d->doc_type ?? $d->document_type ?? 'document',
                'original_name' => $d->original_name ?? null,
                'file_name'     => $d->file_path ?? null,
                'url'           => !empty($d->file_path) ? Storage::disk('public')->url($d->file_path) : null,
                'status'        => $d->status ?? null,
            ];
        })->values();

        return response()->json([
            'ok' => true,
            'application' => $app,
            'ap1' => $ap1,
            'directors' => $directors,
            'managers' => $managers,
            'documents' => $documents,
        ]);
    }
}
