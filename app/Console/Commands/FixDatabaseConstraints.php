<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixDatabaseConstraints extends Command
{
    protected $signature = 'db:fix-constraints';
    protected $description = 'Fix database CHECK constraints to match application requirements';

    public function handle(): int
    {
        $this->info('Fixing database constraints...');

        try {
            DB::statement('ALTER TABLE applications DROP CONSTRAINT IF EXISTS applications_status_check');
            DB::statement("ALTER TABLE applications ADD CONSTRAINT applications_status_check CHECK (status::text = ANY(ARRAY[
                'draft', 'submitted', 'withdrawn', 'needs_correction',
                'officer_review', 'officer_approved', 'officer_rejected', 'correction_requested',
                'registrar_review', 'registrar_approved', 'registrar_rejected', 'returned_to_officer',
                'accounts_review', 'paid_confirmed', 'returned_to_accounts',
                'approved_pending_payment', 'paid', 'returned_from_payments', 'returned_from_registrar', 'rejected',
                'production_queue', 'card_generated', 'certificate_generated', 'printed', 'issued'
            ]::text[]))");
            $this->info('  - applications.status constraint updated');

            DB::statement('ALTER TABLE applications DROP CONSTRAINT IF EXISTS applications_collection_region_check');
            DB::statement("ALTER TABLE applications ADD CONSTRAINT applications_collection_region_check CHECK (collection_region IS NULL OR collection_region::text = ANY(ARRAY[
                'harare', 'bulawayo', 'mutare', 'masvingo', 'gweru', 'chinhoyi'
            ]::text[]))");
            $this->info('  - applications.collection_region constraint updated');

            DB::statement("ALTER TABLE applications ALTER COLUMN status SET DEFAULT 'draft'");
            DB::statement("ALTER TABLE applications ALTER COLUMN collection_region DROP NOT NULL");
            $this->info('  - applications defaults updated');

            DB::statement('ALTER TABLE application_documents DROP CONSTRAINT IF EXISTS application_documents_status_check');
            DB::statement("ALTER TABLE application_documents ADD CONSTRAINT application_documents_status_check CHECK (status::text = ANY(ARRAY[
                'pending', 'accepted', 'rejected', 'draft', 'uploaded'
            ]::text[]))");
            $this->info('  - application_documents.status constraint updated');

            $this->info('All constraints fixed successfully!');
            return 0;
        } catch (\Throwable $e) {
            $this->error('Failed to fix constraints: ' . $e->getMessage());
            return 1;
        }
    }
}
