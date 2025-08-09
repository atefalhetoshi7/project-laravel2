<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('grades')) {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->string('semester', 20);
            $table->foreignId('class_id')->constrained('classes');
            $table->foreignId('teacher_subject_id')->constrained('teacher_subjects');
            $table->integer('coursework_score')->nullable();
            $table->integer('final_score')->nullable();
            $table->integer('total_score')->nullable();
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};