<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApplicationDocument extends Model
{
    protected $fillable = [
        'application_id',
        'owner_id',
        'doc_type',
        'file_path',
        'thumbnail_path',
        'original_name',
        'mime',
        'size',
        'sha256',
        'status',
        'review_notes',
        'file_data',
    ];

    protected $hidden = ['file_data'];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function getDocumentTypeAttribute(): string
    {
        $types = [
            'id_scan' => 'National ID / Passport',
            'passport_photo' => 'Passport Photo',
            'employment_letter' => 'Employment Letter',
            'reference_letter' => 'Reference / Testimonial',
            'educational_certificate' => 'Educational Certificate',
            'passport_biodata_page' => 'Passport Bio Data Page',
            'clearance_letter' => 'Clearance Letter',
            'current_card' => 'Current Accreditation Card',
            'employer_letter' => 'Employer Letter',
            'affidavit' => 'Affidavit',
            'police_report' => 'Police Report',
            'payment_supporting' => 'Supporting Document',
        ];

        return $types[$this->doc_type] ?? ucwords(str_replace('_', ' ', $this->doc_type));
    }

    public function getUrlAttribute(): string
    {
        try {
            return route('staff.documents.show', $this);
        } catch (\Throwable $e) {}

        if ($this->file_path) {
            return asset('storage/' . $this->file_path);
        }

        return '#';
    }
}
