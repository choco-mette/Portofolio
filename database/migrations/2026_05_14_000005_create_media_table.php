<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id(); // bigserial pk

            // Polymorphic columns — model_type stores FQCN e.g. App\Models\Project
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->index(['model_type', 'model_id'], 'media_model_index'); // Composite index for polymorphic lookup

            $table->string('collection_name')->default('default'); // e.g. "screenshots", "thumbnail"
            $table->string('file_name');
            $table->string('file_url');        // Full Cloudflare R2 public URL
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->nullable(); // bytes
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
