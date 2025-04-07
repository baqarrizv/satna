<I></I>
<F></F><?php

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
        // Update the enum type by modifying the column definition
        DB::statement("ALTER TABLE patients MODIFY COLUMN type ENUM('Free Consultancy', 'Regular Patient', 'Gyne', 'I/F') NOT NULL DEFAULT 'Free Consultancy'");
        
        // Convert any existing 'Ultrasound' values to 'I/F'
        DB::statement("UPDATE patients SET type = 'I/F' WHERE type = 'Ultrasound'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First, convert 'I/F' values back to 'Ultrasound'
        DB::statement("UPDATE patients SET type = 'Ultrasound' WHERE type = 'I/F'");
        
        // Then revert the enum type definition
        DB::statement("ALTER TABLE patients MODIFY COLUMN type ENUM('Free Consultancy', 'Regular Patient', 'Gyne', 'Ultrasound') NOT NULL DEFAULT 'Free Consultancy'");
    }
};
