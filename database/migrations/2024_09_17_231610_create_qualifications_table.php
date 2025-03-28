<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade'); // Foreign key to doctors table
            $table->string('degree');
            $table->string('majors');
            $table->string('institution');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
}
