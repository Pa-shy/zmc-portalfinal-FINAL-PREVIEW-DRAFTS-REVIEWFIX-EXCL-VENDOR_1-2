<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        abort_unless(auth()->user()->can('receive_complaints_appeals') || auth()->user()->can('manage_complaints_appeals'), 403);

        $type = $request->get('type');
        $status = $request->get('status');

        $q = Complaint::query()->orderByDesc('id');
        if (in_array($type, ['complaint','appeal'], true)) $q->where('type',$type);
        if (in_array($status, ['open','in_progress','resolved','closed'], true)) $q->where('status',$status);

        $items = $q->paginate(20);
        return view('admin.complaints.index', compact('items','type','status'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        abort_unless(auth()->user()->can('manage_complaints_appeals'), 403);

        $data = $request->validate([
            'status' => ['required','in:open,in_progress,resolved,closed'],
        ]);

        $complaint->update([
            'status' => $data['status'],
            'handled_by' => Auth::id(),
            'handled_at' => now(),
        ]);

        \App\Support\AuditTrail::log('complaint_update', null, ['complaint_id'=>$complaint->id,'status'=>$data['status']]);

        return back()->with('success','Updated.');
    }
}
