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
        // First add the filecreated column
        Schema::table('patients', function (Blueprint $table) {
            // Add filecreated column (nullable, default 'no')
            $table->enum('filecreated', ['yes', 'no'])->nullable()->default('no');
        });
        
        // We'll keep file_number as a string since we're changing the format to include year and padding
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove the filecreated column
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('filecreated');
        });
    }
};
