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
        Schema::table('services', function (Blueprint $table) {
            // Modify charges column to decimal with 10 digits total, 2 decimal places
            // This allows for 8 digits before the decimal point
            $table->decimal('charges', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Reverting back to original column definition
            // Assuming original was integer or smaller decimal
            $table->integer('charges')->change();
        });
    }
};
