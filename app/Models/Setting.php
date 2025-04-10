<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    
    // Define the table (if it's different from plural form)
    protected $table = 'settings';

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'description',
        'logo_light',
        'logo_dark',
        'fav_icon',
        'phone',
        'email',
        'tax_percentage',
        'tax_threshold',
        'smtp_email',
        'smtp_password',  // Remember: This should be encrypted when stored
        'smtp_host',
        'smtp_port',
        'encryption',
        'enable_push_notifications',
        'onesignal_app_id',
        'onesignal_api_key',
        'enable_email_notifications',
        'enable_2fa',  // New field to store whether 2FA is enabled
        'require_2fa_for_users',  // New field to store if 2FA is required or optional
    ];
}
