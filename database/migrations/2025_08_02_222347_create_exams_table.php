<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('exams')) {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained('subjects');
            $table->date('date');
            $table->string('period', 50)->nullable(); // مثل "صباح"
            $table->foreignId('academic_year_id')->constrained('academic_years');
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};