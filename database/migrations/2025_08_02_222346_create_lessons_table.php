<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('lessons')) {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('teacher_id')->constrained('users');
            $table->text('content')->nullable();
            $table->foreignId('class_id')->constrained('classes');
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};