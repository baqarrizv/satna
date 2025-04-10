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
        // Add the "Laboratory" type to the patients table
        if (!Type::hasType('enum')) {
            Type::addType('enum', StringType::class);
        }

        // Update patients table
        DB::statement("ALTER TABLE patients MODIFY COLUMN type ENUM('Free Consultancy', 'Regular Patient', 'Gyne', 'I/F', 'Laboratory') DEFAULT 'Free Consultancy'");

        // Update payments table
        DB::statement("ALTER TABLE payments MODIFY COLUMN patient_type ENUM('Free Consultancy', 'Regular Patient', 'Gyne', 'I/F', 'Laboratory') DEFAULT 'Free Consultancy'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert changes by removing the "Laboratory" type
        DB::statement("ALTER TABLE patients MODIFY COLUMN type ENUM('Free Consultancy', 'Regular Patient', 'Gyne', 'I/F') DEFAULT 'Free Consultancy'");
        
        DB::statement("ALTER TABLE payments MODIFY COLUMN patient_type ENUM('Free Consultancy', 'Regular Patient', 'Gyne', 'I/F') DEFAULT 'Free Consultancy'");
    }
};
