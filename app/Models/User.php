<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',   // أضفنا الحقول الجديدة
        'father_name',
        'last_name',
        'role',
        'phone',
        'registration_number',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // العلاقات الجديدة
    public function studentRegistrations(): HasMany
{
    return $this->hasMany(StudentRegistration::class, 'user_id');
}

    public function teacherSubjects(): HasMany
    {
        return $this->hasMany(TeacherSubject::class);
    }

    public function attendanceRecords(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
    
    // دالة للحصول على الاسم الكامل
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . ($this->father_name ? $this->father_name . ' ' : '') . $this->last_name;
    }
    
    // دالة لتحديد إذا كان المستخدم طالباً
    public function isStudent(): bool
    {
        return $this->role === 'student';
    }
    
    // دالة لتحديد إذا كان المستخدم معلم
    public function isTeacher(): bool
    {
        return $this->role === 'teacher';
    }
}