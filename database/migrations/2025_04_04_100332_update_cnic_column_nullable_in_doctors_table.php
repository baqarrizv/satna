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
        
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('cnic')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First, update any NULL cnic values to an empty string to avoid data truncation
        DB::table('doctors')->whereNull('cnic')->update(['cnic' => '']);
        
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('cnic')->nullable(false)->change();
        });
    }
};
