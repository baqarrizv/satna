<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'patient_id', 'fc_number', 'file_number', 'patient_type', 'doctor_id', 'doctor_name',
        'doctor_department_name', 'doctor_charges', 'doctor_portion',
        'clinic_portion', 'sub_total', 'discount', 'tax', 'total', 'payment_mode',
        'receiver_name', 'remarks', 'refunded', 'closed'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function services()
    {
        return $this->hasMany(PaymentService::class);
    }
}
