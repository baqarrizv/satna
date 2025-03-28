<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name')->unique(); // Name, must be unique
            $table->integer('sequence')->unsigned(); // Sequence, required, unsigned integer
            $table->timestamps(); // Created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
