<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSession extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'end_date'];

    public function sessionTerms()
    {
        return $this->hasMany(SessionTerm::class, 'school_session_id');
    }
}
