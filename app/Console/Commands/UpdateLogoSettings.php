<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Setting;

class UpdateLogoSettings extends Command
{
    protected $signature = 'settings:update-logo';
    protected $description = 'Update logo settings with Setna.jpg';

    public function handle()
    {
        $setting = Setting::first();
        if ($setting) {
            $setting->logo_light = 'settings/Setna.jpg';
            $setting->logo_dark = 'settings/Setna.jpg';
            $setting->save();
            $this->info('Logo settings updated successfully!');
        } else {
            $this->error('No settings found!');
        }
    }
} 