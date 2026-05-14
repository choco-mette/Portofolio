---
trigger: manual
---

# System Architecture & Development Guidelines
**Project Name:** Choco Mette Portfolio (Neo-Brutalism)
**Methodology:** Spec-Driven Development
**Target Event:** Antigravity Hackathon

## 1. AI Agent Role & Directives
You are acting as a Senior Backend Architect and Laravel Expert. Your goal is to build a high-performance, scalable, and secure portfolio web application.
- **NEVER** guess the database structure. Always refer to the agreed-upon DBML structure.
- **NEVER** write raw SQL unless explicitly required for complex analytics. Always use Eloquent ORM.
- **ALWAYS** write clean, typed PHP 8.4+ code.
- **STRICTLY** follow the Tech Stack versions defined below.

## 2. Tech Stack & Infrastructure
- **Framework:** Laravel 12
- **CMS / Admin Panel:** Filament v3 (Built-in TALL stack)
- **Database:** Supabase (PostgreSQL)
- **Object Storage:** Cloudflare R2 (S3-Compatible API)
- **Frontend Template:** Laravel Blade (with Tailwind CSS + Vanilla JS, refer to `design.md`)

## 3. Database Architecture (Supabase / PostgreSQL)
- **Connection:** Use the PostgreSQL driver. Ensure connection pooling (Transaction pooling via PgBouncer / Supavisor) is configured in `.env` if required by Supabase.
- **Migrations:** Read the provided DBML schema carefully. Create Laravel migrations that strictly match the DBML (using `jsonb` for JSON data, `bigserial` for `id`, etc.).
- **Relationships:**
  - Implement **Polymorphic Relationships** for the `media` table (`model_type`, `model_id`).
  - Implement **Many-to-Many Relationships** using pivot tables (`project_skill`, `experience_skill`).
- **Optimization:** Always use Eager Loading (`with(['skills', 'media'])`) in controllers/Livewire components to prevent N+1 query problems.

## 4. Object Storage Integration (Cloudflare R2)
Cloudflare R2 is the single source of truth for all media (images, PDFs, project screenshots).
- **Driver:** Use Laravel's default `s3` driver in `config/filesystems.php`, but configured with Cloudflare R2 credentials (Endpoint, Access Key, Secret Key).
- **Disk Name:** Name the disk `r2` to avoid confusion with actual AWS S3.
- **Visibility:** Uploads must be set to `public` visibility to ensure they can be served directly via the R2 public/custom domain URL.

## 5. CMS Implementation (Filament v3)
Filament is used exclusively for the backend admin area (`/admin`).
- **Media Management:**
  - For the Polymorphic Media table: Use Filament's `SpatieMediaLibraryPlugin` OR build a custom relationship manager that uploads directly to the `r2` disk.
- **Content Editor (Markdown):**
  - The `content` field in `projects` and `posts` MUST use Filament's `MarkdownEditor`.
  - Configure the `MarkdownEditor` to allow drag-and-drop file attachments.
  - Set `->fileAttachmentsDisk('r2')` and `->fileAttachmentsDirectory('content-images')` so inline markdown images are automatically sent to Cloudflare R2.
- **Relationships in UI:**
  - Use `Select::make('skills')->multiple()->relationship('skills', 'name')` to handle many-to-many tag selections easily.

## 6. Frontend Rendering Strategy (Laravel Blade)
The frontend must perfectly match the Neo-Brutalism aesthetic (refer to `design.md`).
- **Data Fetching:** Keep controllers thin. Pass data to Blade views.
- **Markdown Rendering:** - Backend: Use Laravel's `Str::markdown($project->content)` to convert markdown to raw HTML.
  - Frontend: Output the raw HTML safely `{!! Str::markdown(...) !!}` inside a container `<article id="markdown-content">`.
  - Styling: DO NOT try to style the raw HTML via backend markdown parsers. Let the Vanilla JS script defined in `design.md` dynamically wrap the `<img>` and `<pre>` tags to apply the Neo-Brutalism design.
- **Static Assets:** CSS (Tailwind) and JS scripts must be kept minimal to ensure fast LCP (Largest Contentful Paint).

## 7. Spec-Driven Workflow (Order of Operations)
When the user requests to build a feature, the AI Agent must follow this exact sequence:
1. **Schema Check:** Review the DBML. Create/Update Laravel Migrations.
2. **Model Definition:** Create Eloquent Models, define `$fillable`, and establish relationships (`belongsToMany`, `morphMany`).
3. **Filament Resource:** Generate the Filament Resource (`php artisan make:filament-resource`). Configure the Form and Table schemas.
4. **Storage Check:** Ensure file uploads point to the `r2` disk.
5. **Frontend View:** Pass the data to the Blade view and apply the strict Neo-Brutalism classes defined in `design.md`.