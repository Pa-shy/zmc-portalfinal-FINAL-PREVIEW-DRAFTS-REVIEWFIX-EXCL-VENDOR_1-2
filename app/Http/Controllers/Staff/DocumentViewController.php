<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\ApplicationDocument;
use Illuminate\Support\Facades\Storage;

class DocumentViewController extends Controller
{
    public function show(ApplicationDocument $document): \Symfony\Component\HttpFoundation\Response
    {
        $downloadName = $document->original_name ?: basename($document->file_path ?? 'document');

        if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
            return Storage::disk('public')->response($document->file_path, $downloadName);
        }

        if ($document->file_data) {
            $mime = $document->mime ?: 'application/octet-stream';
            $data = $document->file_data;
            if (is_resource($data)) {
                $data = stream_get_contents($data);
            }
            return response($data, 200, [
                'Content-Type' => $mime,
                'Content-Disposition' => 'inline; filename="' . $downloadName . '"',
                'Cache-Control' => 'no-cache',
            ]);
        }

        abort(404, 'Document file not found.');
    }
}
