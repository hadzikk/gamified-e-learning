<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_posts()
    {
        $user = User::factory()->create();
        Post::factory()->count(3)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('student.post'));
        $response->assertStatus(200);
        $response->assertViewHas('posts');
    }

    public function test_profile_page()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get(route('student.profile'));
        $response->assertStatus(200);
        $response->assertViewHas('student', $user);
    }

    public function test_update_profile()
    {
        $user = User::factory()->create([
            'password' => Hash::make('oldpassword')
        ]);

        Storage::fake('public');
        $file = UploadedFile::fake()->image('profile.jpg');

        $response = $this->actingAs($user)->post(route('student.updateprofile'), [
            'username' => 'newusername',
            'current_password' => 'oldpassword',
            'new_password' => 'newpassword',
            'new_password_confirmation' => 'newpassword',
            'profile_picture' => $file
        ]);

        $response->assertRedirect(route('student.profile'));
        $this->assertEquals('newusername', $user->fresh()->username);
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
        Storage::disk('public')->assertExists($user->fresh()->profile_picture);
    }

    public function test_store_quiz_post()
    {
        $user = User::factory()->create();
        
        $postData = [
            'user_id' => $user->id,
            'subject' => 'Math',
            'title' => 'Basic Algebra',
            'level' => 'basic',
            'description' => 'Test description',
            'duration' => 30,
            'questions' => [
                [
                    'question_text' => 'What is 2+2?',
                    'options' => [
                        ['option_text' => '3', 'is_correct' => false],
                        ['option_text' => '4', 'is_correct' => true],
                    ]
                ]
            ]
        ];

        $response = $this->actingAs($user)->post(route('student.storePost'), $postData);
        
        $response->assertRedirect();
        $this->assertDatabaseHas('posts', ['title' => 'Basic Algebra']);
        $this->assertDatabaseHas('quizzes', ['duration' => 30]);
        $this->assertDatabaseHas('questions', ['question_text' => 'What is 2+2?']);
    }
}
