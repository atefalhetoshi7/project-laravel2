<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('attendance')) {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->date('date');
            $table->enum('status', ['present','absent','late']);
            $table->foreignId('academic_year_id')->constrained('academic_years');
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};