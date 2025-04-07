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
        // First update any existing null values to a default value
        DB::table('payments')
            ->whereNull('receiver_name')
            ->update(['receiver_name' => 'Unknown']);

        // Then make the column non-nullable
        Schema::table('payments', function (Blueprint $table) {
            $table->string('receiver_name')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('receiver_name')->nullable()->change();
        });
    }
};
