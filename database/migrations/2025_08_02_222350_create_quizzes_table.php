<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('quizzes')) {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->dateTime('scheduled_at');
            $table->foreignId('class_id')->constrained('classes');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('academic_year_id')->constrained('academic_years');
            $table->text('content')->nullable();
            $table->integer('max_score')->nullable();
            $table->foreignId('teacher_id')->constrained('users');
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};