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
        return $this->hasMany(Student::class);
    }



    public function arms()
    {
        return $this->hasMany(Arm::class);
    }


    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}

