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
        Schema::table('settings', function (Blueprint $table) {
            //create a new column called tax_percentage
            $table->decimal('tax_percentage', 5)->nullable()->after('email');
            $table->decimal('tax_threshold', 10, 2)->nullable()->after('tax_percentage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //drop the column tax_percentage
            $table->dropColumn('tax_percentage');
        });
    }
};
