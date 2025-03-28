<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'last_employer', 'designation', 'start_date', 'end_date'];

    // Experience belongs to a doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
