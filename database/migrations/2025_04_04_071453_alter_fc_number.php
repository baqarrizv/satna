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

        Schema::table('patients', function (Blueprint $table) {
            // File Numbers and Doctor Relationships
            if (Schema::hasColumn('patients', 'fc_number')) {
                $table->string('fc_number')->nullable()->change(); // Keep un-required for now
            } else {
                $table->string('fc_number')->after('type')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('patients', function (Blueprint $table) {
            // Remove columns we added (if any)
            if (Schema::hasColumn('patients', 'alternative_contact')) {
                $table->dropColumn('alternative_contact');
            }
            
            // Note: We're not changing back the nullable/required status to avoid data loss
        });
    }
};
