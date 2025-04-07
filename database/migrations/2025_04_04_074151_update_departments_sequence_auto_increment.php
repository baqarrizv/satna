<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, add the sequence column if it doesn't exist yet
        if (!Schema::hasColumn('departments', 'sequence')) {
            Schema::table('departments', function (Blueprint $table) {
                $table->unsignedInteger('sequence')->nullable();
            });
        }

        // Update existing records without sequence values
        DB::statement('UPDATE departments SET sequence = id WHERE sequence IS NULL');

        // Make the sequence column not nullable
        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedInteger('sequence')->nullable(false)->change();
        });

        // Create a trigger to auto-increment sequence values for new departments
        DB::unprepared("
            CREATE TRIGGER IF NOT EXISTS auto_increment_department_sequence
            BEFORE INSERT ON departments
            FOR EACH ROW
            BEGIN
                DECLARE max_sequence INT;
                SELECT IFNULL(MAX(sequence), 0) + 1 INTO max_sequence FROM departments;
                SET NEW.sequence = max_sequence;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the trigger
        DB::unprepared('DROP TRIGGER IF EXISTS auto_increment_department_sequence');
    }
};
