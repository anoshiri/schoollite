<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    /**
     * Interact with the user's first name.
     *
     * @return Attribute
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['first_name'].' '.$attributes['last_name'],
        );
    }

    /**
     * Interact with the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function birthDay(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => date('d M', $attributes['date_of_birth']),
        );
    }
}

