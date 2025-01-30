<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdministratorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $response = $this->get(route('admin.index'));
        $response->assertStatus(200);
        $response->assertViewIs('administrator.home');
    }

    public function test_regisIndex()
{
    // Create a user with role 'administrator'
    $user = User::factory()->create([
        'role' => 'administrator', // Set the role to 'administrator'
        'username' => 'adminuser', // Ensure username is set
        'first_name' => 'Admin', // Ensure first name is set
        'last_name' => 'User ', // Ensure last name is set
        'email' => 'admin@example.com', // Ensure email is set
        'password' => Hash::make('password'), // Ensure password is set
    ]);
    
    // Act as the created user
    $this->actingAs($user);

    // Call the regisIndex method
    $response = $this->get(route('admin.regis'));

    // Assert the response
    $response->assertStatus(200);
    $response->assertViewIs('administrator.regis');
}

    public function test_dataIndex()
    {
        User::factory()->create(['role' => 'student']);
        User::factory()->create(['role' => 'lecturer']);
        User::factory()->create(['role' => 'Administrator']);

        $response = $this->get(route('admin.data'));
        $response->assertStatus(200);
        $response->assertViewIs('administrator.data');
        $response->assertViewHas('users');
    }

    public function test_edit()
    {
        $user = User::factory()->create();

        $response = $this->get(route('admin.edit', $user->id));
        $response->assertStatus(200);
        $response->assertViewIs('administrator.edit');
        $response->assertViewHas('user', $user);
    }

    public function test_store()
    {
        $data = [
            'username' => 'testuser',
            'first_name' => 'Test',
            'last_name' => 'User  ',
            'degree' => 'BSc',
            'email' => 'test@example.com',
            'password' => 'password',
            'role' => 'student',
        ];

        $response = $this->post(route('admin.store'), $data);
        $response->assertRedirect(route('admin.regis'));
        $this->assertDatabaseHas('users', [
            'username' => 'testuser',
            'email' => 'test@example.com',
        ]);
    }

    public function test_update_profile()
{
    // Create a user and act as that user
    $user = User::factory()->create([
        'password' => Hash::make('oldpassword'), // Set the initial password
    ]);

    $this->actingAs($user);

    // Prepare the data for the update
    $data = [
        'username' => 'newusername',
        'current_password' => 'oldpassword', // Provide the current password
        'new_password' => 'newpassword', // New password
        'profile_picture' => null, // Or provide a file if testing file upload
    ];

    // Call the update profile method
    $response = $this->post(route('student.updateProfile'), $data);

    // Assert the response
    $response->assertRedirect(route('student.profile'));
    $this->assertDatabaseHas('users', [
        'username' => 'newusername',
        // Check if the password is updated (you may need to hash it)
    ]);
}

    public function test_destroy()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('admin.destroy', $user->id));
        $response->assertRedirect(route('Dataview'));

        // Check that the user no longer exists in the database
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    public function test_update_user()
{
    // Create a user and act as that user
    $user = User::factory()->create([
        'password' => Hash::make('oldpassword'), // Set the initial password
        'role' => 'student', // Set initial role
    ]);

    $this->actingAs($user);

    // Prepare the data for the update
    $data = [
        'username' => 'newusername',
        'first_name' => 'NewFirstName',
        'last_name' => 'NewLastName',
        'email' => 'newemail@example.com',
        'current_password' => 'oldpassword', // Provide the current password
        'new_password' => 'newpassword', // New password
        'role' => 'lecturer', // Change role to lecturer
        'degree' => 'MSc', // Provide degree since role is lecturer
    ];

    // Call the update method
    $response = $this->put(route('admin.update', $user->id), $data);

    // Assert the response
    $response->assertRedirect(route('Dataview'));
    $response->assertSessionHas('success', 'Data berhasil diperbarui!');

    // Assert the user data has been updated in the database
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'username' => 'newusername',
        'first_name' => 'NewFirstName',
        'last_name' => 'NewLastName',
        'email' => 'newemail@example.com',
        'role' => 'lecturer',
        'degree' => 'MSc',
    ]);
}

public function test_update_user_with_invalid_current_password()
{
    // Create a user and act as that user
    $user = User::factory()->create([
        'password' => Hash::make('oldpassword'), // Set the initial password
    ]);

    $this->actingAs($user);

    // Prepare the data for the update with an incorrect current password
    $data = [
        'username' => 'newusername',
        'first_name' => 'NewFirstName',
        'last_name' => 'NewLastName',
        'email' => 'newemail@example.com',
        'current_password' => 'wrongpassword', // Incorrect current password
        'new_password' => 'newpassword', // New password
        'role' => 'student', // Change role to student
    ];

    // Call the update method
    $response = $this->put(route('admin.update', $user->id), $data);

    // Assert the response
    $response->assertRedirect()->withErrors(['current_password' => 'Password lama tidak cocok!']);
}

public function test_update_user_validation()
{
    // Create a user and act as that user
    $user = User::factory()->create();

    $this->actingAs($user);

    // Prepare invalid data for the update (missing required fields)
    $data = [
        'username' => '', // Invalid: required
        'first_name' => '', // Invalid: required
        'last_name' => '', // Invalid: required
        'email' => 'not-an-email', // Invalid: must be a valid email
        'role' => 'invalid_role', // Invalid: must be in the specified roles
    ];

    // Call the update method
    $response = $this->put(route('admin.update', $user->id), $data);

    // Assert the response
    $response->assertSessionHasErrors(['username', 'first_name', 'last_name', 'email', 'role']);
    }
}