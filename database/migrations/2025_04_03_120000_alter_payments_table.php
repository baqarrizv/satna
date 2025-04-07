<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\StringType;
use Illuminate\Support\Facades\Log;

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

        Schema::table('payments', function (Blueprint $table) {
            // Basic payment info
            if (!Schema::hasColumn('payments', 'patient_id')) {
                $table->unsignedBigInteger('patient_id');
                $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            }
            
            if (!Schema::hasColumn('payments', 'fc_number')) {
                $table->string('fc_number')->nullable();
            } else {
                $table->string('fc_number')->nullable()->change();
            }
            
            if (!Schema::hasColumn('payments', 'file_number')) {
                $table->string('file_number')->nullable();
            } else {
                $table->string('file_number')->nullable()->change();
            }
            
            // Patient type with all possible values
            if (Schema::hasColumn('payments', 'patient_type')) {
                // Update patient_type to include all types
                DB::statement("ALTER TABLE payments MODIFY COLUMN patient_type ENUM('Free Consultancy', 'Regular Patient', 'Gyne', 'Ultrasound') DEFAULT 'Free Consultancy'");
            } else {
                $table->enum('patient_type', [
                    'Free Consultancy', 
                    'Regular Patient', 
                    'Gyne', 
                    'Ultrasound'
                ])->default('Free Consultancy');
            }

            // Doctor details
            if (!Schema::hasColumn('payments', 'doctor_name')) {
                $table->string('doctor_name')->nullable();
            } else {
                $table->string('doctor_name')->nullable()->change();
            }
            
            if (!Schema::hasColumn('payments', 'doctor_department_name')) {
                $table->string('doctor_department_name')->nullable();
            } else {
                $table->string('doctor_department_name')->nullable()->change();
            }
            
            if (!Schema::hasColumn('payments', 'doctor_charges')) {
                $table->decimal('doctor_charges', 10, 2)->default(0);
            } else {
                $table->decimal('doctor_charges', 10, 2)->default(0)->change();
            }
            
            if (!Schema::hasColumn('payments', 'doctor_portion')) {
                $table->decimal('doctor_portion', 10, 2)->default(0);
            } else {
                $table->decimal('doctor_portion', 10, 2)->default(0)->change();
            }
            
            if (!Schema::hasColumn('payments', 'clinic_portion')) {
                $table->decimal('clinic_portion', 10, 2)->default(0);
            } else {
                $table->decimal('clinic_portion', 10, 2)->default(0)->change();
            }

            // Payment details
            if (!Schema::hasColumn('payments', 'sub_total')) {
                $table->decimal('sub_total', 10, 2)->default(0);
            } else {
                $table->decimal('sub_total', 10, 2)->default(0)->change();
            }
            
            if (!Schema::hasColumn('payments', 'discount')) {
                $table->decimal('discount', 10, 2)->default(0);
            } else {
                $table->decimal('discount', 10, 2)->default(0)->change();
            }
            
            if (!Schema::hasColumn('payments', 'total')) {
                $table->decimal('total', 10, 2)->default(0);
            } else {
                $table->decimal('total', 10, 2)->default(0)->change();
            }
            
            if (!Schema::hasColumn('payments', 'payment_mode')) {
                $table->string('payment_mode')->nullable();
            } else {
                $table->string('payment_mode')->nullable()->change();
            }
            
            // Receiver name (required field)
            if (!Schema::hasColumn('payments', 'receiver_name')) {
                $table->string('receiver_name')->after('payment_mode')->nullable();
            } else {
                $table->string('receiver_name')->nullable()->change();
            }
            
            // After ensuring all receiver_name fields have values, make it non-nullable if needed
            try {
                // Check if there are any NULL values first
                $hasNullValues = DB::table('payments')->whereNull('receiver_name')->exists();
                
                if (!$hasNullValues) {
                    // Only make it required if there are no NULL values
                    Schema::table('payments', function (Blueprint $table) {
                        $table->string('receiver_name')->nullable(false)->change();
                    });
                } else {
                    // Update NULL values to a default value
                    DB::table('payments')
                        ->whereNull('receiver_name')
                        ->update(['receiver_name' => 'Unknown']);
                    
                    // Then make it required
                    Schema::table('payments', function (Blueprint $table) {
                        $table->string('receiver_name')->nullable(false)->change();
                    });
                }
            } catch (\Exception $e) {
                // If anything goes wrong, keep it nullable for safety
                // and log the error
                Log::error('Failed to make receiver_name non-nullable: ' . $e->getMessage());
            }
            
            if (!Schema::hasColumn('payments', 'remarks')) {
                $table->text('remarks')->nullable();
            } else {
                $table->text('remarks')->nullable()->change();
            }
            
            // Status flags
            if (!Schema::hasColumn('payments', 'refunded')) {
                $table->boolean('refunded')->default(false);
            } else {
                $table->boolean('refunded')->default(false)->change();
            }
            
            if (!Schema::hasColumn('payments', 'closed')) {
                $table->boolean('closed')->default(false);
            } else {
                $table->boolean('closed')->default(false)->change();
            }
        });

        // Make sure auto-increment starts from 1001
        DB::statement('ALTER TABLE payments AUTO_INCREMENT = 1001');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We don't want to drop the table or make major changes that would lose data
        // So we'll only reverse specific changes that are safe
        
        Schema::table('payments', function (Blueprint $table) {
            // Make receiver_name nullable again if needed
            if (Schema::hasColumn('payments', 'receiver_name')) {
                $table->string('receiver_name')->nullable()->change();
            }
        });
    }
}; 