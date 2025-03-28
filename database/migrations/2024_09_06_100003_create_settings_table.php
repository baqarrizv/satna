<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            
            // Site Settings
            $table->string('title')->nullable();                 // Site Title
            $table->text('description')->nullable();             // Site Description
            $table->string('logo_light')->nullable();            // Light Logo URL
            $table->string('logo_dark')->nullable();             // Dark Logo URL
            $table->string('fav_icon')->nullable();              // Favicon URL
            $table->string('phone')->nullable();                 // Phone Number
            $table->string('email')->nullable();                 // Site Email

            // Email Settings
            $table->string('smtp_email')->nullable();            // SMTP Email
            $table->text('smtp_password')->nullable();         // SMTP Password (should be encrypted)
            $table->string('smtp_host')->nullable();             // SMTP Host
            $table->integer('smtp_port')->nullable();            // SMTP Port
            $table->enum('encryption', ['None', 'SSL', 'TLS'])->default('None');  // Encryption type

            $table->boolean('enable_push_notifications')->default(false); // Enable/disable push notifications
            $table->string('onesignal_app_id')->nullable()->default(Null);
            $table->string('onesignal_api_key')->nullable()->default(Null);
            $table->boolean('enable_email_notifications')->default(false); // Enable/disable email notifications
        
            $table->boolean('enable_2fa')->default(false);  // Whether 2FA is enabled
            $table->boolean('require_2fa_for_users')->default(false);  // Whether 2FA is required

            $table->timestamps(); // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
