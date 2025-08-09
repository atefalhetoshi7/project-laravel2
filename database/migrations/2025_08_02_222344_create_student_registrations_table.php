<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('student_registrations')) {
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('academic_year_id')->constrained('academic_years');
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('student_registrations');
    }
};