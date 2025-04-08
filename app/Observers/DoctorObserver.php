<?php

namespace App\Observers;

use App\Models\Doctor;

class DoctorObserver
{
    /**
     * Handle the Doctor "creating" event.
     * This runs before the record is saved to the database
     */
    public function creating(Doctor $doctor): void
    {
        // Only generate doctor_id if it's not already set
        if (empty($doctor->doctor_id)) {
            $doctor->doctor_id = $this->generateDoctorId();
        }
    }

    /**
     * Generate a unique doctor ID with format DR0001, DR0002, etc.
     */
    private function generateDoctorId(): string
    {
        // Find the highest existing doctor_id
        $lastDoctor = Doctor::where('doctor_id', 'LIKE', 'DR%')
            ->orderBy('doctor_id', 'desc')
            ->first();

        $nextId = 1;
        
        if ($lastDoctor) {
            // Extract the number part and increment
            $matches = [];
            if (preg_match('/DR(\d+)/', $lastDoctor->doctor_id, $matches)) {
                $nextId = (int)$matches[1] + 1;
            }
        }
        
        // Format with leading zeros (e.g., DR0001)
        return 'DR' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Handle the Doctor "created" event.
     */
    public function created(Doctor $doctor): void
    {
        //
    }

    /**
     * Handle the Doctor "updated" event.
     */
    public function updated(Doctor $doctor): void
    {
        //
    }

    /**
     * Handle the Doctor "deleted" event.
     */
    public function deleted(Doctor $doctor): void
    {
        //
    }

    /**
     * Handle the Doctor "restored" event.
     */
    public function restored(Doctor $doctor): void
    {
        //
    }

    /**
     * Handle the Doctor "force deleted" event.
     */
    public function forceDeleted(Doctor $doctor): void
    {
        //
    }
}
