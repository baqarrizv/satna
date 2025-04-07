<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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

        // Alter the existing doctors table
        Schema::table('doctors', function (Blueprint $table) {
            // Modify existing columns to ensure they have the correct properties
            $table->date('dob')->nullable()->change();
            $table->string('sex')->nullable()->change();
            $table->string('religion')->nullable()->change();
           
            // Make sure cnic is unique
            $table->string('contact_number')->nullable()->change();
            $table->text('address')->nullable()->change();
            
            // Keep date_of_appointment as is if it exists
            if (!Schema::hasColumn('doctors', 'date_of_appointment')) {
                $table->date('date_of_appointment');
            }
            
            $table->string('marital_status')->nullable()->change();
            
            // Keep specialist as is if it exists
            if (!Schema::hasColumn('doctors', 'specialist')) {
                $table->string('specialist');
            }
            
            // Ensure department_id has the correct foreign key
            if (!Schema::hasColumn('doctors', 'department_id')) {
                $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
            }
            
            // Emergency contact fields
            $table->string('emergency_contact_name')->nullable()->change();
            $table->string('emergency_contact_relation')->nullable()->change();
            $table->string('emergency_contact_number')->nullable()->change();

            // Payment Information fields
            $table->string('payment_mode')->nullable()->change();
            $table->string('account_title')->nullable()->change();
            $table->string('account_number')->nullable()->change();
            $table->string('bank_name')->nullable()->change();
            
            // Keep doctor_charges as is if it exists
            if (!Schema::hasColumn('doctors', 'doctor_charges')) {
                $table->decimal('doctor_charges', 10, 2);
            }
            
            // Change percentage fields to unsigned integers
            $table->unsignedInteger('doctor_portion')->nullable()->change();
            $table->unsignedInteger('clinic_portion')->nullable()->change();

            // Image field - keep as is if it exists
            if (!Schema::hasColumn('doctors', 'image')) {
                $table->string('image')->nullable();
            }

            // Status field - keep as is if it exists
            if (!Schema::hasColumn('doctors', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }

            // Add soft deletes if not already present
            if (!Schema::hasColumn('doctors', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We don't want to drop the table in the down migration since that would lose data
        // Instead, we'll revert specific changes that we can safely revert
        Schema::table('doctors', function (Blueprint $table) {
            // Remove soft deletes if we added it
            if (Schema::hasColumn('doctors', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
            
            // Note: Other changes like making columns non-nullable would require
            // data validation that is beyond the scope of a simple migration
        });
    }
};
