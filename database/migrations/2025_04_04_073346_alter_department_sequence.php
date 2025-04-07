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
        //
        if (!Type::hasType('enum')) {
            Type::addType('enum', StringType::class);
        }

        Schema::table('departments', function (Blueprint $table) {
            // File Numbers and Doctor Relationships
            if (!Schema::hasColumn('departments', 'sequence')) {
                $table->integer('sequence')->after('name')->unique()->autoIncrement();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('departments', function (Blueprint $table) {
            // Remove columns we added (if any)
                
            // Note: We're not changing back the nullable/required status to avoid data loss
        });
    }
};
