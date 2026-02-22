<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\ApplicationDocument;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DocumentViewController extends Controller
{
    /**
     * Secure document viewing for staff roles (prevents web-server permission/403 issues
     * and ensures only authorized staff can access applicant uploads).
     */
    public function show(ApplicationDocument $document): \Symfony\Component\HttpFoundation\Response
    {
        // Staff portal middleware + role middleware protect this route.
        // Additional safety: ensure the underlying file exists.
        if (!$document->file_path || !Storage::disk('public')->exists($document->file_path)) {
            abort(404);
        }

        $downloadName = $document->original_name ?: basename($document->file_path);
        return Storage::disk('public')->response($document->file_path, $downloadName);
    }
}
