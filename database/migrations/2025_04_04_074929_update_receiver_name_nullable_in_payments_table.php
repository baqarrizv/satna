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
        if (!Type::hasType('enum')) {
            Type::addType('enum', StringType::class);
        }
        
        Schema::table('payments', function (Blueprint $table) {
            // Make receiver_name nullable
            $table->string('receiver_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First, update any NULL receiver_name values to an empty string to avoid data truncation
        DB::table('payments')->whereNull('receiver_name')->update(['receiver_name' => '']);
        
        Schema::table('payments', function (Blueprint $table) {
            // Change back to non-nullable
            $table->string('receiver_name')->nullable(false)->change();
        });
    }
};
