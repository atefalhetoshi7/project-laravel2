<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicYear extends Model
{
    protected $table = 'academic_years';

    protected $fillable = ['uuid', 'name'];

    public function studentRegistrations(): HasMany
    {
        return $this->hasMany(StudentRegistration::class);
    }
}