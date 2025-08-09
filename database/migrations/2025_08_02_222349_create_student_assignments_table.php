<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('student_assignments')) {
        Schema::create('student_assignments', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('assignment_id')->constrained('assignments');
            $table->text('content')->nullable();
            $table->integer('score')->nullable();
            $table->string('attachment', 255)->nullable();
            $table->primary(['user_id', 'assignment_id']);
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('student_assignments');
    }
};