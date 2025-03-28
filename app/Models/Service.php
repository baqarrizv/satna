<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'charges',
    ];

    /**
     * Get the department that owns the service.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
