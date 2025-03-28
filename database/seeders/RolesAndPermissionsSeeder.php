<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define a list of permissions
        $permissions = [
            'View Settings',
            'Modify Settings',
            'View Roles',
            'Modify Roles',
            'View Users',
            'Modify Users',
            'Modify User Status',
            'All User Activity Logs',
            'Create Department',
            'Edit Department',
            'Delete Department',
            'View Department',
            'View Service',
            'Create Service',
            'Edit Service',
            'Delete Service',
            'View Doctor',
            'Create Doctor',
            'Edit Doctor',
            'Delete Doctor',
            'Modify Doctor Status',            
            'View Patients',
            'Create Patients',
            'Edit Patients',
            'Delete Patients',                      
            'View Payments',
            'Add Charges',
            'Daily Closing',
            'Refund Payments',
            'View Reports',
            'View Doctor Daily Report'
        ];

        // Create and update permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create admin role and assign all permissions
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->syncPermissions(Permission::all());
    }
}
