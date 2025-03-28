<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Event::firstOrCreate([
            'name' => 'New Role Created', 
            'description' => 'A new role was created',
            'url' => 'roles'
        ]);

        Event::firstOrCreate([
            'name' => 'Role Modified', 
            'description' => 'A role was modified',
            'url' => 'roles'
        ]);

        Event::firstOrCreate([
            'name' => 'New User Created', 
            'description' => 'A new user was created',
            'url' => 'users'
        ]);

        Event::firstOrCreate([
            'name' => 'User Modified', 
            'description' => 'User account was modified',
            'url' => 'users'
        ]);

        Event::firstOrCreate([
            'name' => 'Department Created', 
            'description' => 'A new department was created',
            'url' => 'departments'
        ]);
        
        Event::firstOrCreate([
            'name' => 'Department Modified', 
            'description' => 'A department was modified',
            'url' => 'departments'
        ]);
        
        Event::firstOrCreate([
            'name' => 'Department Deleted', 
            'description' => 'A department was deleted',
            'url' => 'departments'
        ]);

        Event::firstOrCreate([
            'name' => 'Service Created', 
            'description' => 'A new service was created',
            'url' => 'services'
        ]);
        
        Event::firstOrCreate([
            'name' => 'Service Modified', 
            'description' => 'A service was modified',
            'url' => 'services'
        ]);
        
        Event::firstOrCreate([
            'name' => 'Service Deleted', 
            'description' => 'A service was deleted',
            'url' => 'services'
        ]);

        Event::firstOrCreate([
            'name' => 'Doctor Created', 
            'description' => 'A new doctor was created',
            'url' => 'doctors'
        ]);

        Event::firstOrCreate([
            'name' => 'Doctor Updated', 
            'description' => 'Doctor information was updated',
            'url' => 'doctors'
        ]);

        Event::firstOrCreate([
            'name' => 'Doctor Deleted', 
            'description' => 'Doctor was deleted',
            'url' => 'doctors'
        ]);

        
        Event::firstOrCreate([
            'name' => 'Doctor Status Updated', 
            'description' => 'Doctor status was updated',
            'url' => 'doctors'
        ]);
    }
}
