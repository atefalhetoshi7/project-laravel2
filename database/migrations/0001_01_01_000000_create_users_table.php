<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // لا تنفذ أي شيء - الجدول موجود مسبقاً
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('father_name')->nullable();
                $table->string('last_name');
                $table->enum('role', ['manager','admin','teacher','student','parent'])->default('student');
                $table->string('phone')->nullable();
                $table->string('registration_number');
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // لا تحذف الجدول - احتفظ بالبيانات
        // Schema::dropIfExists('users');
    }
};