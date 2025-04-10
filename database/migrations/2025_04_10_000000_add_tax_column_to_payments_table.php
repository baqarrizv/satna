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
        Schema::table('payments', function (Blueprint $table) {
            $table->decimal('tax_percentage', 5, 1)->default(0.0)->after('discount');
            $table->decimal('tax', 10, 2)->default(0.00)->after('tax_percentage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            if (Schema::hasColumn('payments', 'tax_percentage')) {  
                $table->dropColumn('tax_percentage');
            }
            if (Schema::hasColumn('payments', 'tax')) {
                $table->dropColumn('tax');
            }
        });
    }
}; 