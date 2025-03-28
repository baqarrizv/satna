<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'degree', 'majors', 'institution'];

    // Qualification belongs to a doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
