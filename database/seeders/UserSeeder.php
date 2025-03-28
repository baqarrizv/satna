<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if the user exists by email
        $user = User::where('email', 'admin@themesbrand.com')->first();
        
        if (!$user) {
            // Insert new user if not exists
            $user = DB::table('users')->insertGetId([
                'name' => 'Admin',
                'email' => 'admin@themesbrand.com',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
            ]);

            // Find the inserted user by its ID
            $user = User::find($user);
        }

        // Check if the admin role exists, if not create it
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Assign the admin role to the user
        $user->assignRole('admin');

        // Output success message
        $this->command->info('Admin user and role have been assigned.');
    }

}
