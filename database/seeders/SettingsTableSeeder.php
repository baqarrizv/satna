<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('settings')->count() == 0) {
            DB::table('settings')->insert([
                'title' => 'My Website',
                'description' => 'This is the default site description.',
                'phone' => '123-456-7890',
                'email' => 'info@mywebsite.com',
                'tax_percentage' => 0,
                'tax_threshold' => 0.00,
                'smtp_email' => 'noreply@projectview.live',
                'smtp_password' => Crypt::encryptString('+,lhVaqnMAd]'),
                'smtp_host' => 'projectview.live',
                'smtp_port' => 465,
                'encryption' => 'SSL',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
