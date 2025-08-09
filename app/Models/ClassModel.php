<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassModel extends Model
{
    protected $table = 'classes';
    
    // هذا مهم لتجنب المشاكل
    protected $primaryKey = 'id';
    
    public function studentRegistrations(): HasMany
    {
        return $this->hasMany(StudentRegistration::class, 'class_id');
    }
}