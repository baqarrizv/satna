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
        if (!Type::hasType('enum')) {
            Type::addType('enum', StringType::class);
        }
        
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('cnic')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First drop the unique constraint so we can modify data
        try {
            Schema::table('doctors', function (Blueprint $table) {
                $table->dropUnique('doctors_cnic_unique');
            });
        } catch (\Exception $e) {
            // Constraint might not exist, continue
        }
        
        // Update NULL cnic values to unique placeholders
        $nullCnicDoctors = DB::table('doctors')->whereNull('cnic')->get();
        foreach ($nullCnicDoctors as $index => $doctor) {
            $placeholder = 'TEMP_CNIC_' . $doctor->id . '_' . uniqid();
            DB::table('doctors')
                ->where('id', $doctor->id)
                ->update(['cnic' => $placeholder]);
        }
        
        // Make the column non-nullable
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('cnic')->nullable(false)->change();
        });
        
        // Re-add the unique constraint
        Schema::table('doctors', function (Blueprint $table) {
            $table->unique('cnic');
        });
    }
};
