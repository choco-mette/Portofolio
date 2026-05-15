---
description: 
---

Workflow Khusus: Pembangunan CMS / Admin Panel (Filament v3)
Tujuan: Membangun antarmuka admin yang elegan untuk mengelola data Skill, Project, dan Experience, terintegrasi penuh dengan Cloudflare R2 untuk penyimpanan media.
Catatan Penting untuk AI: Jangan membuat Resource untuk tabel posts (data diambil via RSS). Pastikan file system.md dan schema.dbml sudah dibaca.

1. Persiapan Filament & Akun Admin
Instruksi untuk AI:

Pastikan Filament Panel Provider sudah terinstal (php artisan filament:install --panels).

Jika belum ada akun admin, instruksikan pengguna untuk menjalankan php artisan make:filament-user di terminal mereka secara manual.

2. Pembuatan Resource: Skill
Instruksi untuk AI:

Jalankan php artisan make:filament-resource Skill.

Buka app/Filament/Resources/SkillResource.php.

Pada metode form(), tambahkan komponen berikut:

TextInput::make('name')->required()->maxLength(255)

ColorPicker::make('bg_color')->default('#1A1A1A')->required()

ColorPicker::make('text_color')->default('#FFFFFF')->required()

Toggle::make('is_highlighted')->default(true)

TextInput::make('sort_order')->numeric()->default(0)

Konfigurasi metode table() untuk menampilkan kolom name, bg_color (sebagai color indicator jika memungkinkan), dan is_highlighted.

3. Pembuatan Resource: Project
Instruksi untuk AI:

Jalankan php artisan make:filament-resource Project.

Buka app/Filament/Resources/ProjectResource.php.

Pada metode form(), gunakan struktur berikut:

TextInput::make('title')->required()->live(onBlur: true)->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))

TextInput::make('slug')->required()->unique(ignoreRecord: true)

Textarea::make('summary')->required()->maxLength(255)

PENTING (R2 Storage): FileUpload::make('cover_image')->disk('r2')->directory('projects/covers')->image()->imageEditor()

PENTING (R2 Storage & Markdown): MarkdownEditor::make('content')->fileAttachmentsDisk('r2')->fileAttachmentsDirectory('projects/content')->fileAttachmentsVisibility('public')->columnSpanFull()

PENTING (Relasi Many-to-Many): Select::make('skills')->multiple()->relationship('skills', 'name')->preload()

TextInput::make('repo_url')->url()

TextInput::make('live_url')->url()

Toggle::make('is_featured')->default(false)

Pada metode table(), tampilkan title, gambar cover_image, dan toggle is_featured.

4. Pembuatan Resource: Experience
Instruksi untuk AI:

Jalankan php artisan make:filament-resource Experience.

Buka app/Filament/Resources/ExperienceResource.php.

Pada metode form(), susun komponen berikut:

TextInput::make('company')->required()

TextInput::make('title')->required()

TextInput::make('start_year')->numeric()->required()->length(4)

TextInput::make('end_year')->maxLength(10)->placeholder('Biarkan kosong jika masih bekerja di sini')

MarkdownEditor::make('description')->required()->columnSpanFull()

PENTING (Relasi Many-to-Many): Select::make('skills')->multiple()->relationship('skills', 'name')->preload()

Toggle::make('is_active')->default(true)

Pada metode table(), tampilkan company, title, start_year, dan end_year.

5. Penyesuaian Navigasi & Ikon (Opsional UI/UX)
Instruksi untuk AI:

Tambahkan properti $navigationIcon pada masing-masing Resource agar panel admin terlihat rapi.

Skill: heroicon-o-cpu-chip atau heroicon-o-code-bracket

Project: heroicon-o-briefcase atau heroicon-o-folder

Experience: heroicon-o-building-office-2 atau heroicon-o-academic-cap