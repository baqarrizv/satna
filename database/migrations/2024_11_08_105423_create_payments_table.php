<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('fc_number')->nullable();
            $table->string('file_number')->nullable();
            $table->enum('patient_type', ['Free Consultancy', 'Regular Patient'])->default('Free Consultancy');

            // Doctor details
            $table->string('doctor_name')->nullable();
            $table->string('doctor_department_name')->nullable();
            $table->decimal('doctor_charges', 10, 2)->default(0);
            $table->decimal('doctor_portion', 10, 2)->default(0);
            $table->decimal('clinic_portion', 10, 2)->default(0);

            // Payment details
            $table->decimal('sub_total', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->string('payment_mode')->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('refunded')->default(false);

            // Closed flag and timestamps
            $table->boolean('closed')->default(false);
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
        
        DB::statement('ALTER TABLE payments AUTO_INCREMENT = 1001');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
