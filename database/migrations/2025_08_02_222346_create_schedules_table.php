<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('schedules')) {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->enum('day', ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday']);
            $table->foreignId('subject_id')->constrained('subjects');
            $table->string('period', 50); // مثل "08:00-09:00"
            $table->foreignId('academic_year_id')->constrained('academic_years');
            $table->foreignId('class_id')->constrained('classes');
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};