# replit.md

## Overview
This Laravel 12-based inspection management application helps companies and individuals manage property inspections, clients, reports, and bookings. It provides a comprehensive dashboard with tools for inspection management, report generation, form building, staff management, and subscription handling. The system supports multi-tenancy, asset management (including areas, photos, custom attributes, notes, files, and follow-ups), and features like inspection type management, notifications, audit logs, and centralized settings.

## User Preferences
Preferred communication style: Simple, everyday language.

## System Architecture
### Framework & Core
The application is built on Laravel 12 (PHP 8.2+) utilizing its MVC pattern, Eloquent ORM, Blade templating, and Artisan CLI for robust and rapid development. It implements a multi-tenant SaaS architecture, ensuring data isolation between companies.

### Frontend Architecture
Frontend assets are managed with Vite and styled using Tailwind CSS 4.0. This setup provides fast development builds, optimized production bundles, and a utility-first CSS approach. A custom font, Instrument Sans, is used.

### HTTP & API Layer
Guzzle HTTP client (v7.x) is used for reliable HTTP requests and external API integrations, supporting synchronous and asynchronous operations.

### Database & Data Access
Laravel Eloquent ORM with migrations manages database interactions. The schema includes comprehensive migrations for multi-tenancy, supporting tables for companies, users, clients, properties, inspections, templates, reports, and detailed asset management (Area, Asset, AssetPhoto, AssetAttribute, AssetNote, AssetFile, FollowUp). Soft deletes are implemented across core models, and all queries are company-scoped for tenant isolation. SQLite is configured with WAL mode for improved concurrency.

### Authentication & Security
Laravel Breeze handles authentication, including login, registration, password reset, and email verification. Security features include CSRF protection, bcrypt password hashing, and middleware-based route protection. Authorization policies prevent cross-tenant data access.

### Background Processing
The Laravel Queue system is used for asynchronous task processing, such as report generation, email notifications, and scheduled reminders.

### Development & Testing
Development relies on Laravel Pint for code style enforcement, PHPUnit for comprehensive testing, and Faker for realistic test data generation. Laravel Sail provides a Docker-based development environment.

### Error Handling & Debugging
Whoops error handler provides detailed error pages for development.

### UI/UX Decisions
The design system is based on Bootstrap 5.3.2, offering a responsive layout with a consistent design language. It includes a sidebar navigation, various dashboards, lists, detail views, and forms for all modules. Status badges and inspection types are color-coded for visual clarity.

### Feature Specifications
- **Asset Management System**: Tracks assets with types, status, risk levels, GPS, photos, custom attributes, notes, files, and follow-ups. Assets are hierarchically organized (Company > Property > Area > Asset).
- **Areas Module**: Manages sub-locations within properties.
- **Inspection Types Module**: Provides CRUD for configurable inspection categories, including system and custom types.
- **Subscriptions Management**: Manages plans, pricing, billing cycles, usage limits, and subscription statuses.
- **Notifications & Reminders**: Centralized system for company-wide and user-specific notifications with priority levels.
- **Audit Logs**: Tracks all create/update/delete actions with user attribution, old/new values, and IP logging.
- **Settings Page**: Centralized management for company info, account details, and user preferences.

## External Dependencies
- **Composer**: PHP dependency management.
- **npm/Vite**: Frontend asset management and bundling.
- **Laravel Framework** (^12.0): Core application framework.
- **Laravel Breeze**: Authentication scaffolding.
- **Guzzle HTTP** (^7.8), **Guzzle Promises** (^2.0), **Guzzle PSR-7** (^2.0), **Guzzle URI Template** (^1.0): HTTP client and related components.
- **fruitcake/php-cors** (^1.3): CORS support.
- **egulias/email-validator** (^3.2|^4.0): Email validation.
- **nesbot/carbon** (^3.8): Date/time manipulation.
- **dragonmantank/cron-expression** (^3.4): CRON expression parsing.
- **Ramsey UUID** (^4.7): UUID generation.
- **League CommonMark** (^2.7): Markdown parsing.
- **League Flysystem** (^3.25): Filesystem abstraction.
- **League URI** (^7.5): URI manipulation.
- **Monolog** (^3.0): Logging library.
- **Symfony components**: Various core components (Console, HTTP Foundation, ErrorHandler).
- **PHPUnit** (^11.5), **Mockery** (^1.6), **Faker** (^1.23): Testing libraries.
- **Whoops** (^2.0): Error handler for development.
- **Tailwind CSS** (^4.0): Utility-first CSS framework.
- **Axios** (^1.11): JavaScript HTTP client.
- **Concurrently** (^9.0): Runs multiple npm scripts.
- **Laravel Tinker** (^2.10), **Laravel Pail** (^1.2), **Laravel Sail** (^1.41), **Laravel Pint** (^1.24), **Laravel Prompts** (^0.3), **Laravel Serializable Closure** (^1.3|^2.0): Laravel development tools.
- **Doctrine Inflector** (^2.0), **Doctrine Lexer** (^2.0|^3.0), **brick/math** (^0.11-0.14): Various utility libraries.