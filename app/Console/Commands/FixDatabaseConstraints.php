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
                'officer_review', 'officer_approved', 'officer_rejected',
                'correction_requested', 'returned_to_applicant',
                'approved_awaiting_payment', 'forwarded_to_registrar', 'registrar_fix_request',
                'registrar_review', 'registrar_approved', 'registrar_rejected',
                'returned_to_officer', 'pending_accounts_from_registrar', 'registrar_approved_pending_reg_fee',
                'accounts_review', 'awaiting_accounts_verification',
                'payment_verified', 'payment_rejected',
                'paid_confirmed', 'returned_to_accounts',
                'submitted_with_app_fee', 'verified_by_officer',
                'approved_pending_payment', 'paid', 'returned_from_payments', 'returned_from_registrar', 'rejected',
                'production_queue', 'produced_ready', 'card_generated', 'certificate_generated', 'printed', 'issued'
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

            $cols = [
                'owner_id' => 'BIGINT',
                'mime' => 'VARCHAR(255)',
                'size' => 'BIGINT',
                'sha256' => 'VARCHAR(64)',
                'thumbnail_path' => 'VARCHAR(255)',
                'file_data' => 'BYTEA',
            ];
            foreach ($cols as $col => $type) {
                DB::statement("ALTER TABLE application_documents ADD COLUMN IF NOT EXISTS {$col} {$type}");
            }
            $this->info('  - application_documents missing columns added');

            if (!$this->columnExists('files', 'id')) {
                DB::statement("CREATE TABLE IF NOT EXISTS files (
                    id BIGSERIAL PRIMARY KEY,
                    owner_id BIGINT,
                    application_id BIGINT,
                    path VARCHAR(255),
                    mime VARCHAR(255),
                    size BIGINT,
                    sha256 VARCHAR(64),
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )");
                $this->info('  - files table created');
            }

            $this->info('All constraints fixed successfully!');
            return 0;
        } catch (\Throwable $e) {
            $this->error('Failed to fix constraints: ' . $e->getMessage());
            return 1;
        }
    }

    private function columnExists(string $table, string $column): bool
    {
        return DB::selectOne(
            "SELECT 1 FROM information_schema.columns WHERE table_name = ? AND column_name = ?",
            [$table, $column]
        ) !== null;
    }
}
