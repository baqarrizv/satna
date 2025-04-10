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
            $table->decimal('tax_percentage', 5, 1)->default(0.0)->after('email');
            $table->decimal('tax_threshold', 10, 2)->default(0.00)->after('tax_percentage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //drop the column tax_percentage
            if (Schema::hasColumn('settings', 'tax_percentage')) {
                $table->dropColumn('tax_percentage');
            }
            //drop the column tax_threshold
            if (Schema::hasColumn('settings', 'tax_threshold')) {
                $table->dropColumn('tax_threshold');
            }
        });
    }
};
