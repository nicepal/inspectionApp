# replit.md

## Overview

This is a Laravel 12-based inspection management application designed to help companies and individuals manage property inspections, clients, reports, and bookings. The system provides a comprehensive dashboard with tools for inspection management, report generation, form building, staff management, and subscription handling.

The application follows Laravel's MVC architecture with frontend assets built using Vite and Tailwind CSS 4.0. It includes standard Laravel features like routing, Eloquent ORM, migrations, authentication, and job processing.

## Recent Changes

### October 6, 2025 - Bootstrap HTML Design Implementation
- Created complete Bootstrap 5.3.2 HTML design system for the inspection management application
- Implemented responsive layout with sidebar navigation and main content area
- Designed and built 8 complete pages:
  - **Dashboard**: Stats cards, upcoming inspections table, recent activity feed, quick actions
  - **Properties List**: Searchable/filterable table with pagination, property management
  - **Property Details**: Full property information, inspection history, upcoming inspections, attachments
  - **Add New Property**: Comprehensive form with property details, address, media uploads
  - **Inspections List**: Stats overview, searchable/filterable table, inspection management
  - **Inspection Details**: Full inspection info, detailed checklist with pass/fail status, report generation
  - **Schedule New Inspection**: Form with property/client selection, inspector assignment, scheduling
  - All pages follow consistent design patterns with Bootstrap components
- Integrated Bootstrap Icons for UI elements
- Configured Laravel routes for all pages
- Color-coded status badges and inspection types for visual clarity
- Responsive design that works across desktop, tablet, and mobile devices

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Framework & Core

**Problem**: Need a robust, modern PHP framework for rapid application development
**Solution**: Laravel 12 (PHP 8.2+)
**Rationale**: Laravel provides comprehensive tooling, excellent documentation, and modern PHP features. Version 12 ensures long-term support and access to latest features.

**Key Components**:
- MVC pattern for separation of concerns
- Eloquent ORM for database interactions
- Blade templating engine for views
- Artisan CLI for development tasks
- Service container for dependency injection

### Frontend Architecture

**Problem**: Need modern, maintainable frontend tooling with utility-first CSS
**Solution**: Vite + Tailwind CSS 4.0
**Rationale**: Vite provides fast development builds and optimized production bundles. Tailwind CSS 4.0 offers utility-first styling with improved performance and new features.

**Configuration**:
- Entry points: `resources/css/app.css`, `resources/js/app.js`
- Asset compilation via Vite with hot module replacement
- Tailwind source directive system for optimal CSS generation
- Custom font: Instrument Sans

### HTTP & API Layer

**Problem**: Need reliable HTTP client for external API integrations
**Solution**: Guzzle HTTP client (v7.x)
**Rationale**: Industry-standard HTTP client with promise support, middleware system, and PSR-7/PSR-18 compatibility.

**Features**:
- Synchronous and asynchronous requests
- Middleware for request/response manipulation
- Automatic JSON encoding/decoding
- Cookie management via `CookieJar`

### Database & Data Access

**Problem**: Need database-agnostic data management
**Solution**: Laravel Eloquent ORM with migrations
**Rationale**: Eloquent provides elegant Active Record implementation with relationship management, query building, and database abstraction.

**Expected Setup**:
- Database-agnostic migrations for schema management
- Eloquent models for data representation
- Query builder for complex queries
- Factory and seeder support for testing/development

### Authentication & Security

**Problem**: Need secure user authentication and authorization
**Solution**: Laravel's built-in authentication system
**Rationale**: Provides session management, password hashing (bcrypt), CSRF protection, and middleware-based authorization.

**Security Features**:
- CSRF token validation on forms
- Password hashing with bcrypt
- Middleware-based route protection
- Email validation (via egulias/email-validator)
- CORS support (via fruitcake/php-cors)

### Background Processing

**Problem**: Need asynchronous task processing for reports and notifications
**Solution**: Laravel Queue system with job dispatching
**Rationale**: Built-in queue system supports multiple drivers and provides reliable background processing with retries and failure handling.

**Use Cases**:
- Report generation
- Email notifications
- Data imports/exports
- Scheduled inspection reminders

### Development & Testing

**Problem**: Need consistent code quality and testing infrastructure
**Solution**: Laravel Pint + PHPUnit + Faker
**Rationale**: 
- Pint enforces Laravel coding standards automatically
- PHPUnit provides comprehensive testing framework
- Faker generates realistic test data

**Development Tools**:
- Laravel Sail for Docker-based development environment
- Laravel Pail for log tailing in development
- Laravel Tinker for interactive REPL debugging
- PHPUnit for unit and feature testing
- Mockery for test doubles

### Error Handling & Debugging

**Problem**: Need informative error pages during development
**Solution**: Whoops error handler
**Rationale**: Provides beautiful, detailed error pages with stack traces, code context, and environment information during development.

## External Dependencies

### Package Management
- **Composer**: PHP dependency management
- **npm/Vite**: Frontend asset management and bundling

### Core Framework
- **Laravel Framework** (^12.0): Web application framework
- **Laravel Tinker** (^2.10): REPL for debugging
- **Laravel Pail** (^1.2): Log viewer
- **Laravel Sail** (^1.41): Docker development environment
- **Laravel Pint** (^1.24): Code style fixer
- **Laravel Prompts** (^0.3): CLI user input library
- **Laravel Serializable Closure** (^1.3|^2.0): Closure serialization

### HTTP & Networking
- **Guzzle HTTP** (^7.8): HTTP client library
- **Guzzle Promises** (^2.0): Promise implementation
- **Guzzle PSR-7** (^2.0): PSR-7 HTTP messages
- **Guzzle URI Template** (^1.0): URI template expansion

### CORS Support
- **fruitcake/php-cors** (^1.3): Cross-origin resource sharing

### Data & Validation
- **egulias/email-validator** (^3.2|^4.0): Email validation
- **Doctrine Inflector** (^2.0): String inflection
- **Doctrine Lexer** (^2.0|^3.0): Lexical analysis
- **brick/math** (^0.11-0.14): Arbitrary precision arithmetic

### Date/Time Handling
- **Carbon** (via nesbot/carbon ^3.8): Date/time manipulation
- **dragonmantank/cron-expression** (^3.4): CRON expression parsing

### Utilities
- **Ramsey UUID** (^4.7): UUID generation
- **League CommonMark** (^2.7): Markdown parsing
- **League Flysystem** (^3.25): Filesystem abstraction
- **League URI** (^7.5): URI manipulation
- **Monolog** (^3.0): Logging library
- **Symfony components**: Various Symfony packages for console, HTTP foundation, error handling, etc.

### Testing & Development
- **PHPUnit** (^11.5): Testing framework
- **Mockery** (^1.6): Mocking library
- **Faker** (^1.23): Fake data generation
- **Hamcrest** (^2.0): Matcher library for tests
- **Whoops** (^2.0): Error handler
- **Collision** (^8.6): CLI error reporting

### Frontend
- **Tailwind CSS** (^4.0): Utility-first CSS framework
- **Vite** (^7.0): Frontend build tool
- **Axios** (^1.11): Promise-based HTTP client for JavaScript
- **Concurrently** (^9.0): Run multiple npm scripts

### Expected Future Integrations
Based on the application's purpose, these integrations may be added:
- Database system (PostgreSQL, MySQL, or SQLite)
- Email service (SMTP, Mailgun, SendGrid, etc.)
- File storage (S3, DigitalOcean Spaces, etc.)
- Payment processing (Stripe, PayPal) for subscriptions
- Calendar integration for scheduling
- PDF generation library for reports
- Image processing for property photos