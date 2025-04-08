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

        Schema::table('patients', function (Blueprint $table) {
            // Personal Information - Make appropriate fields nullable
            $table->string('patient_name')->change(); // Keep required
            $table->date('patient_dob')->nullable()->change();
            
            // Check if the unique index exists before modifying the column
            $indexExists = collect(DB::select("SHOW INDEXES FROM patients WHERE Key_name = 'patients_patient_cnic_unique'"))->isNotEmpty();
            if ($indexExists) {
                $table->dropUnique('patients_patient_cnic_unique');
            }
            $table->string('patient_cnic')->nullable()->change(); // Make nullable but not unique
            
            $table->string('patient_contact')->nullable()->change();
            $table->string('patient_occupation')->nullable()->change();
            $table->text('patient_address')->nullable()->change();
            
            // Add alternative_contact if it doesn't exist
            if (!Schema::hasColumn('patients', 'alternative_contact')) {
                $table->string('alternative_contact')->nullable()->after('patient_contact');
            }

            // Spouse Information
            $table->string('spouse_name')->nullable()->change();
            $table->date('spouse_dob')->nullable()->change();
            $table->string('spouse_cnic')->nullable()->change();
            $table->string('spouse_contact')->nullable()->change();
            $table->string('spouse_occupation')->nullable()->change();
            $table->text('spouse_address')->nullable()->change();

            // Emergency Contact
            $table->string('emergency_contact_person')->nullable()->change();
            $table->string('emergency_contact_relation')->nullable()->change();
            $table->string('emergency_contact_number')->nullable()->change();

            // Patient Type - Update to include all types
            DB::statement("ALTER TABLE patients MODIFY COLUMN type ENUM('Free Consultancy', 'Regular Patient', 'Gyne', 'I/F') DEFAULT 'Free Consultancy'");

            // Make sure filetype exists and is set properly
            if (Schema::hasColumn('patients', 'filetype')) {
                DB::statement("ALTER TABLE patients MODIFY COLUMN filetype ENUM('New', 'Follow Up') NULL");
            } else {
                $table->enum('filetype', ['New', 'Follow Up'])->nullable()->after('type');
            }

            // File Numbers and Doctor Relationships
            if (Schema::hasColumn('patients', 'fc_number')) {
                $table->string('fc_number')->nullable(false)->change(); // Keep required for now
            } else {
                $table->string('fc_number')->after('type');
            }
            
            if (Schema::hasColumn('patients', 'doctor_coordinator_id')) {
                $table->foreignId('doctor_coordinator_id')->nullable()->change();
            } else {
                $table->foreignId('doctor_coordinator_id')->nullable()->constrained('doctors')->nullOnDelete();
            }

            // Check if the unique index exists before modifying the file_number column
            $fileNumberIndexExists = collect(DB::select("SHOW INDEXES FROM patients WHERE Key_name = 'patients_file_number_unique'"))->isNotEmpty();
            if ($fileNumberIndexExists) {
                $table->dropUnique('patients_file_number_unique');
            }
            
            if (Schema::hasColumn('patients', 'file_number')) {
                $table->string('file_number')->nullable()->change();
            } else {
                $table->string('file_number')->nullable()->after('fc_number');
            }
            
            if (Schema::hasColumn('patients', 'doctor_id')) {
                $table->foreignId('doctor_id')->nullable()->change();
            } else {
                $table->foreignId('doctor_id')->nullable()->constrained('doctors')->nullOnDelete();
            }

            // Notes Fields
            if (!Schema::hasColumn('patients', 'how_did_you_know')) {
                $table->string('how_did_you_know')->nullable();
            }
            
            if (!Schema::hasColumn('patients', 'note')) {
                $table->text('note')->nullable();
            }

            // Make sure soft deletes is included
            if (!Schema::hasColumn('patients', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We don't want to drop the table or make significant changes that would lose data
        // So we'll only reverse specific additions made by this migration
        Schema::table('patients', function (Blueprint $table) {
            // Remove columns we added (if any)
            if (Schema::hasColumn('patients', 'alternative_contact')) {
                $table->dropColumn('alternative_contact');
            }
            
            // Note: We're not changing back the nullable/required status to avoid data loss
        });
    }
}; 