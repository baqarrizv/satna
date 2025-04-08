<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\StringType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Required for column modifications
        if (!Type::hasType('enum')) {
            Type::addType('enum', StringType::class);
        }

        // First, temporarily rename the unique index to avoid conflicts
        try {
            DB::statement('ALTER TABLE doctors DROP INDEX doctors_doctor_id_unique');
        } catch (\Exception $e) {
            // Index might not exist, so just continue
        }
        
        // Make the column nullable
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('doctor_id')->nullable()->change();
        });
        
        // Find duplicates and append a suffix to make them unique
        $duplicates = DB::select("
            SELECT doctor_id, COUNT(*) as count
            FROM doctors 
            WHERE doctor_id IS NOT NULL
            GROUP BY doctor_id 
            HAVING COUNT(*) > 1
        ");
        
        foreach ($duplicates as $duplicate) {
            $doctorsWithDuplicateId = DB::select("
                SELECT id, doctor_id
                FROM doctors
                WHERE doctor_id = ?
                ORDER BY id
            ", [$duplicate->doctor_id]);
            
            // Skip the first one (keep it as is)
            for ($i = 1; $i < count($doctorsWithDuplicateId); $i++) {
                $newDoctorId = $duplicate->doctor_id . '_' . $i;
                DB::update("
                    UPDATE doctors
                    SET doctor_id = ?
                    WHERE id = ?
                ", [$newDoctorId, $doctorsWithDuplicateId[$i]->id]);
            }
        }
        
        // Re-add the unique constraint
        Schema::table('doctors', function (Blueprint $table) {
            $table->unique('doctor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We can't really reverse this migration safely once it's applied
    }
};
