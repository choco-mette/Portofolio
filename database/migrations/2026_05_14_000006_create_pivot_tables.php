<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pivot: Experience <-> Skills (Many-to-Many)
        Schema::create('experience_skill', function (Blueprint $table) {
            $table->foreignId('experience_id')->constrained('experiences')->cascadeOnDelete();
            $table->foreignId('skill_id')->constrained('skills')->cascadeOnDelete();
            $table->primary(['experience_id', 'skill_id']); // Composite PK — prevents duplicates
        });

        // Pivot: Project <-> Skills (Many-to-Many)
        Schema::create('project_skill', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->foreignId('skill_id')->constrained('skills')->cascadeOnDelete();
            $table->primary(['project_id', 'skill_id']); // Composite PK — prevents duplicates
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_skill');
        Schema::dropIfExists('experience_skill');
    }
};
