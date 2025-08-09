<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('evaluations')) {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes');
            $table->foreignId('student_id')->constrained('users');
            $table->string('semester', 20);
            $table->foreignId('subject_id')->constrained('subjects');
            $table->text('evaluation')->nullable();
            $table->integer('student_score')->nullable();
            $table->integer('max_score')->nullable();
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};