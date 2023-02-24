<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arm extends Pivot
{
    use HasFactory;

    protected $table = 'arms';

    
    protected $fillable = [
        'name', 'description', 'grade_id',
    ];


    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'arm_student', 'arm_id', 'student_id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
