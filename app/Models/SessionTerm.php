<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionTerm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'school_session_id', 'start_date', 'end_date'];

    public function schoolSession()
    {
        return $this->belongsTo(SchoolSession::class, 'school_session_id');
    }
}
