# ZMC Portal - Zimbabwe Media Commission

## Overview
This is a Laravel 12 PHP application for the Zimbabwe Media Commission portal. It provides:
- Media practitioner accreditation management
- Media house registration
- Staff dashboards for various roles (admin, registrar, accounts, production, etc.)
- Role-based access control using Spatie Laravel Permission
- Comprehensive workflow enforcement with granular status tracking

## Project Architecture

### Tech Stack
- **Backend**: Laravel 12 (PHP 8.4)
- **Frontend**: Blade templates with AdminLTE theme, Vite, Tailwind CSS, Bootstrap 5
- **Database**: PostgreSQL (Replit built-in Neon-backed)
- **Authentication**: Laravel UI with token-based auth for iframe environments

### Directory Structure
- `app/` - Application code (Controllers, Models, Services, Middleware)
- `config/` - Configuration files including AdminLTE and permissions
- `database/` - Migrations, seeders, and SQLite database
- `public/` - Public assets and entry point
- `resources/views/` - Blade templates organized by feature
- `routes/web.php` - All route definitions

### Key Features
- **Portal Views**: Accreditation and Media House portals for public users
- **Staff Dashboards**: Role-specific dashboards for admin, registrar, accounts, production
- **Application Workflow**: Processing applications through various stages with enforced state machine
- **Activity Logging**: Tracking user actions with immutable audit trail
- **Payment Processing**: PayNow integration, manual proof uploads, cash payments
- **Card/Certificate Designer**: Production template designer with drag-and-drop field placement

## Application Workflow

### Status Constants (Application Model)
**Draft & Submission:**
- `draft` - Application saved but not submitted
- `submitted` - Submitted to accreditation officer queue
- `withdrawn` - Withdrawn by applicant

**Accreditation Officer:**
- `officer_review` - Under officer review
- `officer_approved` - Approved by officer (legacy)
- `officer_rejected` - Rejected by officer
- `correction_requested` - Correction requested (legacy)
- `returned_to_applicant` - Returned for applicant corrections
- `approved_awaiting_payment` - Officer approved, awaiting payment
- `forwarded_to_registrar` - Forwarded to registrar (waiver/special cases)
- `registrar_fix_request` - Registrar raised fix request to officer

**Registrar:**
- `registrar_review` - Under registrar review
- `registrar_approved` - Approved by registrar
- `registrar_rejected` - Rejected by registrar
- `returned_to_officer` - Returned to accreditation officer
- `pending_accounts_from_registrar` - Pushed to accounts from registrar
- `registrar_approved_pending_reg_fee` - Registrar approved, pending registration fee

**Accounts/Payments:**
- `accounts_review` - Under accounts review
- `awaiting_accounts_verification` - PayNow ref submitted, awaiting verification
- `payment_verified` - Payment verified by accounts
- `payment_rejected` - Payment rejected
- `paid_confirmed` - Payment confirmed (legacy)
- `returned_to_accounts` - Returned to accounts

**Media House Specific:**
- `submitted_with_app_fee` - Submitted with application fee paid
- `verified_by_officer` - Verified by accreditation officer

**Production:**
- `production_queue` - In production queue
- `produced_ready` - Produced and ready for collection
- `card_generated` - Card generated
- `certificate_generated` - Certificate generated
- `printed` - Printed

### Workflow Routes
**New Application (Journalist):**
Applicant → Submit → Officer Review → Approve (awaiting payment) → Payment → Accounts Verify → Production → Print

**New Application (Media House, two-stage payment):**
Applicant → Pay App Fee → Submit → Officer Verify → Registrar Review → Approve (pending reg fee) → Payment → Accounts Verify → Production → Print

**Renewal:**
Applicant → Submit → Accounts → Production (bypasses Officer/Registrar review)

**Physical Intake (walk-in):**
Officer enters details + receipt → Auto-creates application → Production queue

### Key Services
- `ApplicationWorkflow` - State machine with transition validation
- `ActivityLogger` - Immutable audit trail logging
- `ManualPaymentController` - PayNow reference and proof upload handling

## Development

### Running the Application
```bash
npm run start
```
This runs Laravel's development server (port 5000).

### Build for Production
```bash
npm run build
```

### Database Migrations
```bash
php artisan migrate
```

### Seeding Data
```bash
php artisan db:seed
```
Seeds: staff users (officer@zmc.org.zw, registrar@zmc.org.zw, accounts@zmc.org.zw, production@zmc.org.zw, itadmin@zmc.org.zw, auditor@zmc.org.zw, director@zmc.org.zw), test applicants, regions, notices, events, news, system configs, card templates. Staff password: `Staff@12345`, Test users: `Test@12345`.

### Authentication Architecture (Iframe Token Auth)
Since Replit runs apps inside an iframe proxy, browser cookies often don't persist (blocked as third-party cookies). The portal uses a token-based auth workaround:
- **Login**: StaffAuthController generates a random token, stores user data in Laravel Cache (8hr TTL), and redirects with `?_auth_token=TOKEN`
- **TokenAuth Middleware**: Registered in web group with priority before Laravel's auth, reads token from URL query or X-Auth-Token header, authenticates user via `Auth::loginUsingId()`
- **Client-side forwarding**: JavaScript in portal.blade.php and staff.blade.php stores token in localStorage and automatically appends it to all same-origin links, form submissions, fetch(), and XHR requests
- **Logout**: Clears both server-side cache token and client-side localStorage
- **Key files**: `app/Http/Middleware/TokenAuth.php`, `bootstrap/app.php` (middleware priority), layout Blade files
- **CSRF bypass**: `VerifyCsrfWithTokenBypass` middleware bypasses CSRF for token-authenticated requests and specific routes

## Models

### Application
- `form_data` (JSON): Stores all form fields as JSON for draft saving
- `is_draft` (boolean): True if application is a draft, false if submitted
- `submitted_at` (timestamp): When the application was formally submitted
- `collection_region`: Regional office where user will collect press card/certificate
- `payment_stage`: 'application_fee' or 'registration_fee' (media house two-stage)
- `forward_reason`: Reason for forwarding to registrar
- `receipt_number`: Physical intake receipt number
- `paynow_ref_submitted`: PayNow reference number submitted by applicant

### CardTemplate
- `name`, `type` (card/certificate), `year`, `background_path`
- `layout_config` (JSON): Field positions/sizes for template designer
- `is_active` (boolean): Active template for production

### Reminder
- `target_type`, `target_id`, `message`, `type`, `acknowledged_at`, `created_by`
- Used by Registrar to send notifications to portal users

## Recent Changes
- March 31, 2026: B6-B8 feature implementation
  - Records CSV export: officer can export journalists and media houses to CSV from records views
  - Records analytics summary cards: total, collected, uncollected, expired counts on records views (DB-backed, not paginated)
  - Registrar supervisory checkbox review: markReviewed/batchMarkReviewed with checkbox UI on incoming queue
  - Batch review scoped to registrar queue statuses only (REGISTRAR_REVIEW, FORWARDED_TO_REGISTRAR, etc.)
  - Physical intake route + controller: GET form and POST processing for walk-in applications
  - New staff roles seeded: pr_officer, public_info_compliance, research_training, chief_accountant
  - Auto-role selection: single-role users bypass role selection page on login
  - Draft 2-week expiry: CleanExpiredDrafts command scheduled daily

- March 31, 2026: Unified workflow enforcement & dashboard fixes
  - Consolidated Application model status constants with simplified naming (31 canonical statuses)
  - Legacy constant aliases for backward compatibility (old verbose names → new short string values)
  - Unified StatusTransitionValidator to read from ApplicationWorkflow::transitionMap() (single source of truth)
  - Updated ApplicationWorkflow transition map with all active controller routes covered
  - Fixed RegistrarController missing `$year`/`$isCurrentYear` view variables
  - Fixed AccountsPaymentsController dashboard `$badge` variable collision (renamed to `$statusBadge`)
  - Updated Officer/Registrar/Accounts dashboard queries to use new status constants
  - Added `allStatuses()` and `statusLabel()` helpers to Application model

- March 31, 2026: Post-merge deployment fixes
  - Fixed TokenAuth middleware priority: TokenAuth now runs before Laravel's auth middleware via explicit priority chain
  - Fixed all post-merge migration failures: handled existing tables (reminders), duplicate columns (users.passport_number), SQLite-style drop-recreate on Postgres (renewal_applications), and CHECK constraint blocking new workflow statuses
  - Updated DeployMigrate command: added 14 new tables (fix_requests, payment_submissions, official_letters, renewal_applications, renewal_change_requests, portal_requirements, portal_requirement_items, application_categories, portal_requirements_audit, login_activities, cash_payments, physical_intakes, design_templates, system_logs), new user/application/payment columns, dropped overly-restrictive status CHECK constraint (validation enforced at app level)
  - DeployMigrate table schemas now match actual migration definitions exactly (payment_submissions, official_letters)
  - Build script (build.sh) runs clean: deploy-migrate, seed, storage:link, config/route/view cache all pass

- February 26, 2026: Reduced green opacity system-wide
  - Lightened primary green from #1a3a1a to #2e7d32 (medium green)
  - Lightened dark green from #0d2810 to #1b5e20
  - Reduced overlay opacity on sidebar, topbar, and landing page (0.94→0.82, 0.97→0.85)
  - Updated all inline color references across howto, requirements, auth, and layout templates

- February 26, 2026: Comprehensive workflow enforcement & new features
  - 15+ new application status constants for granular state tracking
  - ApplicationWorkflow state machine with enforced transitions
  - Accreditation Officer: approve → awaiting payment, return to applicant, forward to registrar, physical intake with receipt
  - Registrar: fix requests to officer, read-only accounts oversight, reminders to portal users, media house letter requirement
  - Accounts: PayNow reference verification, proof/waiver approve/reject, cash payment recording with audit trail
  - Portal payment flow: PayNow → reference submission → awaiting accounts verification
  - Media house two-stage payment: application fee before submission, registration fee after registrar approval
  - Renewal simplification: number lookup, confirm/change, direct to accounts (bypass officer/registrar)
  - Production card/certificate designer: drag-and-drop template builder, background upload, field positioning
  - Previous applications panel in officer/registrar/accounts views
  - Previous payments panel in accounts/auditor views
  - Request type badges (New/Renewal/Replacement) across all staff views
  - CSRF bypass expanded for all new staff action routes
  - Test data seeder with sample applications at various workflow stages
  - Default card and certificate templates seeded

- February 23, 2026: Fixed production deployment migration failure
  - Created SafeMigrate command (db:safe-migrate) to handle existing database tables
  - Updated build.sh to use db:safe-migrate instead of plain migrate
  - Deployment target: autoscale with build: bash build.sh, run: php public/router.php

- February 23, 2026: Production deployment preparation
  - Token-based auth for iframe environments
  - Database-backed sessions and cache for autoscale compatibility
  - Health check router.php for non-browser requests

- January 05, 2026: Theme — black/yellow/white with professional typography
  - Color scheme: Black (#1a1a1a) primary, Yellow (#f5c518) accent, White backgrounds
  - Font stack: Montserrat (headings), Source Sans Pro / Open Sans (body), Inter (UI), Helvetica (fallback)
  - Reduced font sizes system-wide (base 13px, headings scaled down proportionally)
  - Removed all-caps from dashboard cards, table headers, nav tabs, content headings
  - Kept uppercase only for brand logos, sidebar section labels, small badges/eyebrows

- January 04, 2026: Paynow payment integration
  - Fee calculation: Local journalist $50 new/$30 renewal, Foreign $150/$100, Media house $500/$300

- December 29, 2025: Initial setup and core features
  - Document upload pipeline, staff portal, chatbot, draft saving, Replit configuration
