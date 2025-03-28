<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Department;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase; 

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Ensure permissions exist
        Permission::firstOrCreate(['name' => 'View Department']);
        Permission::firstOrCreate(['name' => 'Create Department']);
        Permission::firstOrCreate(['name' => 'Edit Department']);
        Permission::firstOrCreate(['name' => 'Delete Department']);
    }

    /** @test */
    public function it_can_create_a_department()
    {
        // Simulate authenticated user
        $user = User::factory()->create();
        $user->givePermissionTo('Create Department');
        $this->actingAs($user);

        // Simulate department data
        $data = [
            'name' => 'HR Department',
            'sequence' => 1,
        ];

        // Send POST request
        $response = $this->post(route('departments.store'), $data);

        // Assert the department exists in the database
        $this->assertDatabaseHas('departments', ['name' => 'HR Department']);
        $response->assertRedirect(route('departments.index'));
        
    }

    /** @test */
    public function it_can_update_a_department()
    {
        // Create a user and assign 'Edit Department' permission
        $user = User::factory()->create();
        $user->givePermissionTo('Edit Department');

        // Authenticate the user
        $this->actingAs($user);

        // Create a department instance using a factory
        $department = Department::factory()->create();

        // Updated data
        $updatedData = [
            'name' => 'Updated Department',
            'sequence' => 2,
        ];

        // Send a PUT request to update the department
        $response = $this->put(route('departments.update', $department->id), $updatedData);

        // Assert the department's name is updated in the database
        $this->assertDatabaseHas('departments', ['name' => 'Updated Department']);

        // Assert the user is redirected after successful update
        $response->assertRedirect(route('departments.index'));
    }

    /** @test */
    public function it_can_delete_a_department()
    {
        // Create a user and assign 'Delete Department' permission
        $user = User::factory()->create();
        $user->givePermissionTo('Delete Department');

        // Authenticate the user
        $this->actingAs($user);

        // Create a department instance using a factory
        $department = Department::factory()->create();

        // Send a DELETE request to delete the department
        $response = $this->delete(route('departments.destroy', $department->id));

        // Assert the department no longer exists in the database
        $this->assertDatabaseMissing('departments', ['id' => $department->id]);

        // Assert the user is redirected after successful deletion
        $response->assertRedirect(route('departments.index'));
    }

    /** @test */
    public function it_can_show_a_department()
    {
        // Create a user and assign 'View Department' permission
        $user = User::factory()->create();
        $user->givePermissionTo('View Department');

        // Authenticate the user
        $this->actingAs($user);

        // Create a department instance using a factory
        $department = Department::factory()->create();

        // Send a GET request to show the department
        $response = $this->get(route('departments.show', $department->id));

        // Assert that the response contains the department's name
        $response->assertSee($department->name);
    }

    /** @test */
    public function it_validates_required_fields_when_creating_a_department()
    {
        $user = User::factory()->create();
        $user->givePermissionTo('Create Department');
        $this->actingAs($user);

        // Send a POST request with empty data
        $response = $this->post(route('departments.store'), []);

        // Assert validation errors for 'name' and 'sequence'
        $response->assertSessionHasErrors(['name', 'sequence']);
    }

    /** @test */
    public function it_validates_unique_name_field_when_creating_a_department()
    {
        $user = User::factory()->create();
        $user->givePermissionTo('Create Department');
        $this->actingAs($user);

        // Create an existing department
        $department = Department::factory()->create(['name' => 'HR Department']);

        // Send a POST request to create a new department with the same name
        $response = $this->post(route('departments.store'), [
            'name' => 'HR Department',
            'sequence' => 2,
        ]);

        // Assert a validation error for the unique name field
        $response->assertSessionHasErrors(['name']);
    }
}
