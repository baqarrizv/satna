<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob');
            $table->enum('sex', ['Male', 'Female']);
            $table->string('religion')->nullable();
            $table->string('doctor_id')->unique(); // Manually provided unique ID
            $table->string('cnic')->unique();
            $table->string('contact_number');
            $table->text('address');
            $table->date('date_of_appointment');
            $table->enum('marital_status', ['Single', 'Married', 'Divorced']);
            $table->string('specialist');            
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
            // Emergency contact
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_relation');
            $table->string('emergency_contact_number');

            // Payment Information
            $table->enum('payment_mode', ['Bank Transfer', 'Cash']);
            $table->string('account_title')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->decimal('doctor_charges', 10, 2);
            $table->decimal('doctor_portion', 5, 2); // Percentage
            $table->decimal('clinic_portion', 5, 2); // Percentage

            // File Upload (Image)
            $table->string('image')->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
