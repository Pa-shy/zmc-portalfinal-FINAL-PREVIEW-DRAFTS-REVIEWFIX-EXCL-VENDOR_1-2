<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => ['nullable','in:complaint,appeal'],
            'full_name' => ['required','string','max:200'],
            'email' => ['nullable','email','max:200'],
            'phone' => ['nullable','string','max:50'],
            'subject' => ['nullable','string','max:200'],
            'message' => ['required','string','max:10000'],
            'attachment' => ['nullable','file','max:10240','mimes:pdf,doc,docx,jpg,jpeg,png,webp,txt'],
        ]);

        $payload = [
            'type' => $data['type'] ?? 'complaint',
            'full_name' => $data['full_name'],
            'email' => $data['email'] ?? null,
            'phone' => $data['phone'] ?? null,
            'subject' => $data['subject'] ?? null,
            'message' => $data['message'],
        ];

        if ($request->hasFile('attachment')) {
            $f = $request->file('attachment');
            $payload['attachment_path'] = $f->store('website/complaints', 'public');
            $payload['attachment_original_name'] = $f->getClientOriginalName();
            $payload['attachment_mime'] = $f->getMimeType();
        }

        $complaint = Complaint::create($payload);

        \App\Support\AuditTrail::log('complaint_create', null, ['complaint_id'=>$complaint->id,'type'=>$payload['type']]);

        return response()->json(['success'=>true,'message'=>'Received']);
    }
}
