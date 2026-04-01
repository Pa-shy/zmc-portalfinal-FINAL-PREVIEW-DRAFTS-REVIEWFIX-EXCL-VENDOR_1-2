# ZMC Portal - Zimbabwe Media Commission

## Overview
This Laravel 12 PHP application serves as the Zimbabwe Media Commission portal, managing media practitioner accreditation and media house registration. It features comprehensive workflow enforcement, role-based access for various staff roles, and aims to streamline the accreditation process.

## User Preferences
No explicit user preferences were provided in the original document.

## System Architecture

### Tech Stack
-   **Backend**: Laravel 12 (PHP 8.4)
-   **Frontend**: Blade templates, AdminLTE theme, Vite, Tailwind CSS, Bootstrap 5
-   **Database**: PostgreSQL (Replit Neon-backed)
-   **Authentication**: Laravel UI with token-based authentication for iframe environments

### Key Features
-   **Portal Views**: Dedicated portals for public users (accreditation and media house applications).
-   **Staff Dashboards**: Role-specific interfaces for administrators, registrars, accounts, and production staff.
-   **Application Workflow**: Robust state machine with over 30 granular statuses for managing applications from draft to completion, including specific flows for new applications, renewals, and media houses.
-   **Activity Logging**: Immutable audit trail for all user actions via `ActivityLogger` service.
-   **Payment Processing**: Integration with PayNow, manual proof uploads, cash, bank transfer, and waiver options, with auto-generated receipt numbers (format: `{PREFIX}-{YEAR}-{NNNNN}`).
-   **Card/Certificate Designer**: A production template designer supporting drag-and-drop field placement for generating credentials.
-   **Records Management**: CSV export and analytics summaries for journalists and media houses.
-   **Physical Intake**: System for processing walk-in applications via AccreditationOfficerController.
-   **Reminders System**: Registrar can send reminders to applicants; portal displays unacknowledged reminders as banners with acknowledge buttons.
-   **Renewal/Replacement Flow**: Separate sidebar links and routes for renewals vs replacements; accreditation number lookup API for pre-filling data.

### Core Architectural Decisions
-   **Role-Based Access Control**: Implemented using Spatie Laravel Permission.
-   **Token-based Authentication**: A custom solution to bypass iframe cookie limitations in Replit, involving a `TokenAuth` middleware, client-side JavaScript for token propagation, and a CSRF bypass mechanism.
-   **Workflow Enforcement**: Centralized `ApplicationWorkflow` service and `StatusTransitionValidator` ensure strict adherence to application lifecycle rules.
-   **Database Structure**: `Application` model uses JSON fields for `form_data` to store draft content, and `CardTemplate` uses `layout_config` for design configurations. User profile fields include `id_number`, `passport_number`, `phone2`, `social_media` as dedicated DB columns.
-   **UI/UX Design**: Uses an AdminLTE theme with a professional black (#1a1a1a), yellow (#f5c518), and white color scheme, Montserrat/Source Sans Pro typography, and reduced font sizes for a clean aesthetic. Dark mode persists via both server-side theme setting and localStorage fallback.
-   **Reminder Model**: Uses `Reminder` + `ReminderRead` models with `active()` and `forUser()` scopes; acknowledged via separate `ReminderRead` records.

### Key Routes & Controllers
-   **Portal**: `AccreditationPortalController` handles dashboard, new/renewal/replacement forms, payments, profile, reminders acknowledgment, accreditation lookup
-   **Staff**: `AccreditationOfficerController`, `RegistrarController`, `AccountsPaymentsController`, `ProductionController`
-   **Renewal**: Separate `/renewal` and `/replacement` routes with preset `$ap5Type`
-   **Lookup API**: `GET /portal/accreditation/lookup/{accreditationNumber}` returns JSON
-   **Reminders**: `POST /portal/accreditation/reminders/{id}/acknowledge`

### Test Accounts
-   **Staff**: `officer@zmc.org.zw`, `registrar@zmc.org.zw`, `accounts@zmc.org.zw`, `production@zmc.org.zw`, `itadmin@zmc.org.zw` (password: `Staff@12345`)
-   **Applicants**: `john.moyo@example.com`, `mary.ndlovu@example.com`, `tatenda.chirwa@example.com` (password: `Test@12345`)
-   **Media House**: `admin@dailyherald.co.zw` (password: `Test@12345`)

## External Dependencies
-   **PayNow**: Payment gateway integration for processing application fees.
-   **PostgreSQL**: Primary database for application data.
-   **Spatie Laravel Permission**: Role-based access control.
