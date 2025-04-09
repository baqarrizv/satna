<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            // Make the date of birth nullable (if it's not already)
            $table->date('patient_dob')->nullable()->change();
            
            // These fields should already be nullable from the original migration
            // but we're including them here for clarity
            $table->text('patient_address')->nullable()->change();
            $table->string('spouse_name')->nullable()->change();
            $table->string('spouse_contact')->nullable()->change();
            $table->date('spouse_dob')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            // Keep patient_dob nullable since there's existing data
            // Don't try to revert it to non-nullable as it will cause data truncation errors
            
            // No changes needed for the other fields as they were already nullable
        });
    }
}; 