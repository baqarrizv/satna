<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sequence'];

    /**
     * Get the services for the department.
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Get the doctors for the department.
     */
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
