<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // This will serve as the unique identifier for patients
            $table->string('patient_name');
            $table->string('patient_dob', 10)->nullable();
            $table->string('patient_cnic')->unique(); // Unique CNIC with masking
            $table->string('patient_contact')->nullable(); // Contact with masking
            $table->string('patient_occupation')->nullable();
            $table->text('patient_address')->nullable();

            $table->string('spouse_name')->nullable();
            $table->string('spouse_dob', 10)->nullable();
            $table->string('spouse_cnic')->nullable();
            $table->string('spouse_contact')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->text('spouse_address')->nullable();

            $table->string('how_did_you_know')->nullable();
            $table->text('note')->nullable();

            $table->string('emergency_contact_person')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->string('emergency_contact_number')->nullable();

            $table->enum('type', ['Free Consultancy', 'Regular Patient', 'Gyne','I/F'])->default('Free Consultancy');

            $table->string('fc_number')->unique();
            $table->foreignId('doctor_coordinator_id')->nullable()->constrained('doctors')->nullOnDelete();

            $table->string('file_number')->nullable()->unique();
            $table->foreignId('doctor_id')->nullable()->constrained('doctors')->nullOnDelete();


            $table->timestamps();
            
            $table->softDeletes();
        });

        DB::statement('ALTER TABLE patients AUTO_INCREMENT = 1001');
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
