<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    if (!Schema::hasTable('classes')) {
    Schema::create('classes', function (Blueprint $table) {
        $table->id();
        $table->string('grade_level', 50);
        $table->string('class_number', 20)->nullable();
        $table->integer('capacity')->nullable();
        $table->timestamps();
    });
}
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
