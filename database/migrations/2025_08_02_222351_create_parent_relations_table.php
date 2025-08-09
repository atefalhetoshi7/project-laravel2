<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('parent_relations')) {
        Schema::create('parent_relations', function (Blueprint $table) {
            $table->foreignId('parent_id')->constrained('users');
            $table->foreignId('student_id')->constrained('users');
            $table->string('relation', 50)->nullable();
            $table->primary(['parent_id', 'student_id']);
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('parent_relations');
    }
};