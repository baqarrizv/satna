<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'patient_name',
        'patient_dob',
        'patient_cnic',
        'patient_contact',
        'patient_occupation',
        'patient_address',
        'spouse_name',
        'spouse_dob',
        'spouse_cnic',
        'spouse_contact',
        'spouse_occupation',
        'spouse_address',
        'how_did_you_know',
        'note',
        'emergency_contact_person',
        'emergency_contact_relation',
        'emergency_contact_number',
        'type',
        'filetype',
        'fc_number',
        'doctor_coordinator_id',
        'file_number',
        'doctor_id',
    ];

    /**
     * Define relationships for foreign keys.
     */
    
    // Relationship to the coordinator doctor
    public function doctorCoordinator()
    {
        return $this->belongsTo(Doctor::class, 'doctor_coordinator_id');
    }

    // Relationship to the main doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}

