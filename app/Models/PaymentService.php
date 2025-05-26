<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentService extends Model
{
    protected $fillable = [
        'payment_id', 'service_doctor_id', 'service_doctor_name', 'service_name', 'department_name', 'charges'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
