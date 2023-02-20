<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $casts = [
        'date_of_birth' => 'date'
    ];


    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'arm_student');
    }


    public function arms()
    {
        return $this->hasManyThrough(Arm::class, Grade::class);
    }

    
    public function currentArm()
    {
        return $this->belongsTo(Arm::class, 'current_arm_id');
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

    /**
     * Interact with the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function age(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Carbon::parse($attributes['date_of_birth'])->diffInYears(),
        );
    }
}

