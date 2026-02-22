# ZMC Portal - Zimbabwe Media Commission

## Overview
This is a Laravel 12 PHP application for the Zimbabwe Media Commission portal. It provides:
- Journalist accreditation management
- Media house registration
- Staff dashboards for various roles (admin, registrar, accounts, production, etc.)
- Role-based access control using Spatie Laravel Permission

## Project Architecture

### Tech Stack
- **Backend**: Laravel 12 (PHP 8.4)
- **Frontend**: Blade templates with AdminLTE theme, Vite, Tailwind CSS, Bootstrap 5
- **Database**: PostgreSQL (Replit built-in Neon-backed)
- **Authentication**: Laravel UI with custom staff authentication

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
- **Application Workflow**: Processing applications through various stages
- **Activity Logging**: Tracking user actions

## Development

### Running the Application
```bash
npm run start
```
This runs both Laravel's development server (port 5000) and Vite for hot module replacement.

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

## Recent Changes
- January 05, 2026: Green theme implementation
  - Updated color theme from black to dark green (#1a3a1a) across all pages
  - Landing page: Dark green gradient background with visible white text
  - Portal sidebars: Green theme (#1a3a1a to #0d2810 gradient)
  - Dashboard topbars: Green header with white icons
  - Login/Register pages: Light green background (#f0f7f0)
  - Staff portal: Green header and navigation
  - Golden/olive accent buttons (#c9a227) matching ZMC branding
  - Card preview now displays uploaded passport photos

- January 04, 2026: Paynow payment integration
  - Installed paynow/php-sdk for payment processing
  - PaynowController handles web and mobile money payments (EcoCash/OneMoney)
  - "Pay Now" button on dashboards for applications awaiting payment (accounts_review status)
  - Secure payment flow with callback verification and status polling
  - Fee calculation: Local journalist $50 new/$30 renewal, Foreign $150/$100, Media house $500/$300
  - Payment credentials stored in environment variables (PAYNOW_INTEGRATION_ID, PAYNOW_INTEGRATION_KEY)
  - Notices and events pages now display database-driven content from admin uploads
  - Notice/Event models provide dynamic content instead of static demo data

- January 04, 2026: UI and feature enhancements
  - Changed sidebar color from dark blue to black (#1a1a1a/#111111)
  - Enhanced chatbot knowledge base with comprehensive ZMC information
    - FAQs for eligibility, changes/amendments, processing times
    - Paynow payment guide, replacement card process
    - Additional office locations (Gweru, Chinhoyi)
    - Fallback to info@zmc.org.zw for unanswered questions
  - Updated card templates to match official ZMC design
    - Media card with passport photo area, wave background
    - Scope banner (LOCAL/FOREIGN media) with color coding
    - Back side with QR verification code
  - Updated certificate template with pinkish/cream color scheme
    - Decorative ornaments and proper layout
    - Signature blocks for Chairperson and CEO
    - Zimbabwe flag and ZMC logo footer

- December 29, 2025: Fixed document upload pipeline
  - Documents now upload with applications using FormData (multipart/form-data)
  - Files stored in storage/app/public/documents/{application_id}/
  - Review modal shows uploaded documents before submission with file names and sizes
  - Accreditation Officer dashboard displays all uploaded documents with file-type icons
  - View Details modal shows complete application info: applicant data, form fields, and documents
  - ApplicationDocument model with document_type accessor for friendly names
  - Supports: id_scan, passport_photo, employment_letter document types

- December 29, 2025: Staff portal enhancements and audit trail
  - Staff landing page updated with dropdown role selector (replaces card-based UI)
  - Complete role list: Accreditation Officer, Accounts/Payments, Registrar, Production, IT Admin, Oversight/Audit, Director, Super Admin
  - Immutable AuditTrail model with enforced append-only pattern (throws RuntimeException on update/delete attempts)
  - IT Admin dashboard with user management UI, role assignment, notices, and audit log display
  - Workflow: Application → Accreditation Officer → Accounts → Registrar → Production → Issue

- December 29, 2025: Added functional ZMC chatbot assistant
  - Keyword-based chatbot answering questions about ZMC, accreditation, registration
  - Knowledge base includes: about ZMC, accreditation process, registration process, required documents, fees, office locations, application tracking, renewals, contact info
  - Fallback message directs users to info@zmc.org.zw when question is not matched
  - Modern chat UI with typing indicators and formatted responses

- December 29, 2025: Added draft saving and review before submission
  - Both AP3 (accreditation) and AP1 (media house registration) forms now support:
    - Save Draft button to save progress at any step
    - Review modal showing all form data before final submission
    - Draft restoration when returning to continue an application
  - Dashboard statistics now use database queries (not in-memory filters)
  - Recent applications list shows on both portal dashboards
  - Regional collection offices: Harare, Bulawayo, Mutare, Masvingo

- December 29, 2025: Imported and configured for Replit environment
  - Configured Vite to allow all hosts for Replit proxy
  - Set up Laravel server on port 5000
  - Created SQLite database and ran migrations
  - Configured proxy trust for Replit's iframe environment
  - Fixed session handling for CSRF tokens
  - Portal selection flow: Home → Login/Signup → Journalist/Media House Portal

## Application Model
- `form_data` (JSON): Stores all form fields as JSON for draft saving
- `is_draft` (boolean): True if application is a draft, false if submitted
- `submitted_at` (timestamp): When the application was formally submitted
- `collection_region`: Regional office where user will collect press card/certificate
