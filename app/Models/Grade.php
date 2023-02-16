<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'description', 'teacher_id',
    ];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    
    public function students()
    {
        return $this->belongsToMany(Student::class, 'arm_student');
    }

    public function arms()
    {
        return $this->hasMany(Arm::class);
    }
}

