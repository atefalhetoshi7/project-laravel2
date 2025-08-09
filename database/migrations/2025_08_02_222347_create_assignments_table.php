<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('assignments')) {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->integer('max_score')->nullable();
            $table->foreignId('class_id')->constrained('classes');
            $table->foreignId('academic_year_id')->constrained('academic_years');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->text('content')->nullable();
            $table->date('due_date')->nullable();
            $table->foreignId('teacher_id')->constrained('users');
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};