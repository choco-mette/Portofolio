<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id(); // bigserial (bigint auto-increment) — matches DBML bigserial pk
            $table->string('name')->unique();
            $table->string('bg_color', 7)->default('#1A1A1A');
            $table->string('text_color', 7)->default('#FFFFFF');
            $table->boolean('is_highlighted')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
