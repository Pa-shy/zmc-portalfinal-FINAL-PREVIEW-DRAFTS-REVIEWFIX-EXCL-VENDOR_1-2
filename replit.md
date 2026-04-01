# ZMC Portal - Zimbabwe Media Commission

## Overview
This Laravel 12 PHP application serves as the Zimbabwe Media Commission portal, managing media practitioner accreditation and media house registration. It features comprehensive workflow enforcement, role-based access for various staff roles, and aims to streamline the accreditation process. The project targets market potential in efficient media regulation and compliance.

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
-   **Activity Logging**: Immutable audit trail for all user actions.
-   **Payment Processing**: Integration with PayNow, manual proof uploads, cash, bank transfer, and waiver options, with auto-generated receipt numbers.
-   **Card/Certificate Designer**: A production template designer supporting drag-and-drop field placement for generating credentials.
-   **Records Management**: CSV export and analytics summaries for journalists and media houses.
-   **Physical Intake**: System for processing walk-in applications.

### Core Architectural Decisions
-   **Role-Based Access Control**: Implemented using Spatie Laravel Permission.
-   **Token-based Authentication**: A custom solution to bypass iframe cookie limitations in Replit, involving a `TokenAuth` middleware, client-side JavaScript for token propagation, and a CSRF bypass mechanism.
-   **Workflow Enforcement**: Centralized `ApplicationWorkflow` service and `StatusTransitionValidator` ensure strict adherence to application lifecycle rules.
-   **Database Structure**: `Application` model uses JSON fields for `form_data` to store draft content, and `CardTemplate` uses `layout_config` for design configurations.
-   **UI/UX Design**: Uses an AdminLTE theme with a professional black, yellow, and white color scheme, Montserrat/Source Sans Pro typography, and reduced font sizes for a clean aesthetic.

## External Dependencies
-   **PayNow**: Payment gateway integration for processing application fees.
-   **PostgreSQL**: Primary database for application data.