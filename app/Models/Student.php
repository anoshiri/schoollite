<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'email',
        'street',
        'city',
        'state',
        'status',
    ];

    
    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'student_grade');
    }
}

