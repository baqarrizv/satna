<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'dob', 'sex', 'religion', 'doctor_id', 'cnic', 'contact_number', 'address', 'date_of_appointment',
        'marital_status', 'specialist', 'department_id', 'emergency_contact_name', 'emergency_contact_relation',
        'emergency_contact_number', 'payment_mode', 'account_title', 'account_number', 'bank_name',
        'doctor_charges', 'doctor_portion', 'clinic_portion', 'image', 'is_active'
    ];

    // Relationships
    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
