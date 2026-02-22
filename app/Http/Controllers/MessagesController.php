<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        // Latest message per application for this user
        $latestIds = ApplicationMessage::query()
            ->select(DB::raw('MAX(id) as id'))
            ->where(function ($q) use ($userId) {
                $q->where('from_user_id', $userId)
                  ->orWhere('to_user_id', $userId);
            })
            ->groupBy('application_id')
            ->pluck('id');

        $threads = ApplicationMessage::query()
            ->whereIn('id', $latestIds)
            ->with(['application'])
            ->orderByDesc('sent_at')
            ->orderByDesc('id')
            ->get()
            ->map(function ($m) use ($userId) {
                $otherId = $m->from_user_id == $userId ? $m->to_user_id : $m->from_user_id;
                $m->other_user = User::find($otherId);
                $m->unread_count = ApplicationMessage::where('application_id', $m->application_id)
                    ->where('to_user_id', $userId)
                    ->whereNull('read_at')
                    ->count();
                return $m;
            });

        return view('messages.index', compact('threads'));
    }

    public function thread(Request $request, Application $application)
    {
        $this->authorizeThreadAccess(Auth::user(), $application);

        $userId = Auth::id();

        $messages = ApplicationMessage::query()
            ->where('application_id', $application->id)
            ->where(function ($q) use ($userId) {
                $q->where('from_user_id', $userId)
                  ->orWhere('to_user_id', $userId);
            })
            ->orderBy('sent_at')
            ->orderBy('id')
            ->get();

        // Mark received as read
        ApplicationMessage::query()
            ->where('application_id', $application->id)
            ->where('to_user_id', $userId)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return view('messages.thread', compact('application', 'messages'));
    }

    public function send(Request $request, Application $application)
    {
        $this->authorizeThreadAccess(Auth::user(), $application);

        // Only Accreditation Officers are allowed to initiate staff->applicant messaging.
        $sender = Auth::user();
        $isStaff = $sender && method_exists($sender, 'hasAnyRole') && $sender->hasAnyRole([
            'super_admin','accounts_payments','registrar','production','it_admin','auditor','director'
        ]);
        if ($isStaff) {
            abort(403, 'Only Accreditation Officers may message applicants.');
        }

        $data = $request->validate([
            'body' => ['required', 'string', 'max:5000'],
        ]);

        $fromId = Auth::id();
        $toId = $this->resolveRecipientUserId($application, $fromId);

        ApplicationMessage::create([
            'application_id' => $application->id,
            'from_user_id'   => $fromId,
            'to_user_id'     => $toId,
            'channel'        => 'internal',
            'subject'        => null,
            'body'           => $data['body'],
            'sent_at'        => now(),
            'read_at'        => null,
        ]);

        \App\Support\AuditTrail::log('message_sent', $application, ['to_user_id' => $toId]);

        return back()->with('success', 'Message sent.');
    }

    /**
     * Basic authorization:
     * - applicant can view their own application
     * - staff can view any application
     */
    /**
     * Basic authorization:
     * - applicant can view their own application
     * - staff can view any application
     *
     * IMPORTANT:
     * Laravel's base Controller already defines a PUBLIC authorizeForUser() method.
     * Defining a private method with the same name causes a fatal error.
     */
    private function authorizeThreadAccess($user, Application $application): void
    {
        if (!$user) abort(403);
        if ($user->hasAnyRole(['accreditation_officer','super_admin','director','auditor'])) {
            return;
        }
        if ((int)$application->applicant_user_id === (int)$user->id) {
            return;
        }
        abort(403);
    }

    /**
     * Route applicant messages to the most relevant staff user.
     * Strategy:
     * 1) If last_action_by is a staff user, use them
     * 2) Else if assigned_officer_id exists, use them
     * 3) Else pick the first user matching the owning stage (by status)
     * 4) Else fall back to any super_admin
     */
    private function resolveRecipientUserId(Application $application, int $fromId): int
    {
        // If staff is messaging, default to applicant
        if ((int)$application->applicant_user_id && $fromId !== (int)$application->applicant_user_id) {
            return (int)$application->applicant_user_id;
        }

        // Applicant -> staff
        $candidateIds = [];

        if (!empty($application->last_action_by)) {
            $candidateIds[] = (int)$application->last_action_by;
        }
        if (!empty($application->assigned_officer_id)) {
            $candidateIds[] = (int)$application->assigned_officer_id;
        }

        // Prefer last staff who spoke on this application
        $lastStaff = ApplicationMessage::query()
            ->where('application_id', $application->id)
            ->where('to_user_id', (int)$application->applicant_user_id)
            ->orderByDesc('sent_at')
            ->orderByDesc('id')
            ->value('from_user_id');
        if ($lastStaff) $candidateIds[] = (int)$lastStaff;

        foreach (array_unique(array_filter($candidateIds)) as $id) {
            $u = User::find($id);
            if ($u && $u->hasAnyRole(['accreditation_officer'])) {
                return (int)$id;
            }
        }

        // Fall back to any accreditation officer
        $u = User::role('accreditation_officer')->orderBy('id')->first();
        if ($u) return (int)$u->id;

        // Absolute fall back: send to self (should never happen)
        return (int)$fromId;
    }
}
