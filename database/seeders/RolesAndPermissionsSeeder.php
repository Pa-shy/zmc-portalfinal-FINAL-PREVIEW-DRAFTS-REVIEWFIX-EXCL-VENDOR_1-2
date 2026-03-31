<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            'super_admin',
            'accreditation_officer',
            'registrar',
            'accounts_payments',
            'production',
            'it_admin',
            'auditor',
            'director',
            'complaints_officer',
            'pr_officer',
            'public_info_compliance',
            'research_training',
            'chief_accountant',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $permissions = [
            'view_all_applications',
            'view_analytics',
            'view_audit_trail',
            'approve_application',
            'reject_application',
            'request_correction',
            'confirm_payment',
            'generate_cards',
            'manage_users',
            'approve_user_accounts',
            'view_content',
            'manage_content',
            'view_news',
            'manage_news',
            'download_reports',
            'receive_complaints_appeals',
            'manage_complaints_appeals',
            'manage_notices_events',
            'manage_downloads',
            'view_financial_oversight',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        Role::findByName('super_admin')->syncPermissions(Permission::all());

        Role::findByName('auditor')->syncPermissions([
            'view_audit_trail',
            'view_all_applications',
            'view_analytics',
            'view_financial_oversight',
        ]);

        Role::findByName('director')->syncPermissions([
            'view_all_applications',
            'view_analytics',
            'view_audit_trail',
            'approve_user_accounts',
            'view_content',
            'view_news',
            'receive_complaints_appeals',
            'download_reports',
            'view_financial_oversight',
        ]);

        Role::findByName('it_admin')->syncPermissions([
            'manage_users',
            'approve_user_accounts',
            'view_audit_trail',
            'view_analytics',
        ]);

        Role::findByName('complaints_officer')->syncPermissions([
            'receive_complaints_appeals',
            'manage_complaints_appeals',
        ]);

        Role::findByName('pr_officer')->syncPermissions([
            'manage_content',
            'manage_news',
            'manage_notices_events',
            'manage_downloads',
            'view_content',
            'view_news',
        ]);

        Role::findByName('public_info_compliance')->syncPermissions([
            'receive_complaints_appeals',
            'manage_complaints_appeals',
            'view_content',
            'view_news',
        ]);

        Role::findByName('research_training')->syncPermissions([
            'view_content',
            'view_news',
            'view_all_applications',
            'view_analytics',
        ]);

        Role::findByName('chief_accountant')->syncPermissions([
            'view_all_applications',
            'view_analytics',
            'view_audit_trail',
            'confirm_payment',
            'download_reports',
            'view_financial_oversight',
        ]);
    }
}
