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
        Schema::table('payment_services', function (Blueprint $table) {
            $table->integer('service_doctor_id')->nullable()->after('payment_id');
            $table->string('service_doctor_name')->nullable()->after('service_doctor_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_services', function (Blueprint $table) {
            $table->dropColumn('service_doctor_id');
        });
    }
}; 