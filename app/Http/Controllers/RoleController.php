<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Services\EventNotificationService;

class RoleController extends Controller
{
    /**
     * Display a listing of all roles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all roles from the database
        $roles = Role::all();
        
        // Return the roles.index view with the list of roles
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Fetch all available permissions to be displayed in the form
        $permissions = Permission::all();
        
        // Return the roles.create view with the list of permissions
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created role in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request, ensuring the role name is unique and permissions are provided
        $request->validate([
            'name' => 'required|unique:roles|max:255', // Role name must be unique and not exceed 255 characters
            'permissions' => 'required|array',         // Permissions must be an array and are required
        ]);

        // Create the new role with the name from the request
        $role = Role::create(['name' => $request->name]);
        
        // Fetch the permission names based on the provided permission IDs
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');

        // Sync the selected permissions with the role
        $role->syncPermissions($permissions);
        
        // Trigger notification for the "New Role Created" event
        EventNotificationService::notifyEventByName('New Role Created');

        // Redirect to the roles index with a success message
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\View\View
     */
    public function edit(Role $role)
    {
        // Fetch all available permissions
        $permissions = Permission::all();

        // Get the current permissions assigned to the role (pluck their IDs)
        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        // Return the roles.edit view with the role data and available permissions
        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified role in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        // Validate the request, ensuring the role name is unique except for the current role
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id . '|max:255', // Exclude the current role from uniqueness check
            'permissions' => 'required|array',                                // Permissions are required and must be an array
        ]);

        // Update the role name with the new value from the request
        $role->update(['name' => $request->name]);
        
        // Fetch the permission names based on the provided permission IDs
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');

        // Sync the selected permissions with the role, replacing any existing permissions
        $role->syncPermissions($permissions);

        // Trigger notification for the "Role Modified" event
        EventNotificationService::notifyEventByName('Role Modified');
        
        // Redirect to the roles index with a success message
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified role from the database.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        // Delete the role from the database
        $role->delete();

        // Redirect to the roles index with a success message
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
