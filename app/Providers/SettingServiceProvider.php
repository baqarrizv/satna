<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Models\Setting;

class SettingServiceProvider extends ServiceProvider
{
    public function register()
    {    
        //
    }

    public function boot()
    {            
        if (app()->runningInConsole()) {
            return;
        }
        
        $settings = Cache::remember('app_settings', 60, function () {
            return Setting::first();
        });

        if ($settings) {
            // Make each setting available in the global configuration
            $settingsArray = $settings->toArray();

            // Check if logo_light, logo_dark, fav_icon exist and use the new path format
            $settingsArray['logo_light'] = isset($settingsArray['logo_light']) ? asset($settingsArray['logo_light']) : null;
            $settingsArray['logo_dark'] = isset($settingsArray['logo_dark']) ? asset($settingsArray['logo_dark']) : null;
            $settingsArray['fav_icon'] = isset($settingsArray['fav_icon']) ? asset($settingsArray['fav_icon']) : null;

            // Now set the config
            Config::set('settings', $settingsArray);
            Config::set('mail.mailers.smtp.host', $settings->smtp_host);
            Config::set('mail.mailers.smtp.port', $settings->smtp_port);
            Config::set('mail.mailers.smtp.encryption', $settings->encryption);
            Config::set('mail.mailers.smtp.username', $settings->smtp_email);
            
            try {
                Config::set('mail.mailers.smtp.password', Crypt::decryptString($settings->smtp_password));
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                // If decryption fails, set a default or empty password
                Config::set('mail.mailers.smtp.password', '');
            }
            
            Config::set('mail.from.address', $settings->smtp_email);
            Config::set('mail.from.name', $settings->smtp_name);  
            
            Config::set('services.onesignal.app_id', $settings->onesignal_app_id);
            Config::set('services.onesignal.rest_api_key', $settings->onesignal_api_key);
            Config::set('services.onesignal.guzzle_client_timeout', 0);

            Config::set('laravelpwa.name', $settings->title);     
            Config::set('laravelpwa.manifest.name', $settings->title);
            Config::set('laravelpwa.manifest.short_name', $settings->title);                         
        }
    }
}
