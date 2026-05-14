<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // bigserial pk
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('summary', 255);
            $table->text('content')->nullable();        // Markdown content, rendered via Str::markdown()
            $table->string('cover_image')->nullable();  // R2 public URL
            $table->string('repo_url')->nullable();
            $table->string('live_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
