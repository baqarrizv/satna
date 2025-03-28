<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEventSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('user_event_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to users
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade'); // Link to events
            $table->boolean('notify_via_mail')->default(false);
            $table->boolean('notify_via_one_signal')->default(false);
            $table->boolean('notify_via_database')->default(false);
            $table->timestamps();
            
            $table->unique(['user_id', 'event_id']); 
         
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_event_subscriptions');
    }
}
