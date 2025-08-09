<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('quiz_grades')) {
        Schema::create('quiz_grades', function (Blueprint $table) {
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('score')->nullable();
            $table->primary(['quiz_id', 'user_id']);
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('quiz_grades');
    }
};