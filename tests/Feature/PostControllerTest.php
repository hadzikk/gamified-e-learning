<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_posted()
    {
        // Create a user with role 'dosen'
        $user = User::factory()->create(['role' => 'dosen', 'slug' => 'dosen-slug']);
        
        // Act as the created user
        $this->actingAs($user);

        // Create posts for the user
        $posts = Post::factory()->count(3)->create(['user_id' => $user->id]);

        // Call the posted method
        $response = $this->get('/lecturer/dosen-slug/posted');

        // Assert the response
        $response->assertStatus(200);
        $response->assertViewIs('lecturer.posted');
        $response->assertViewHas('user', $user);
        $response->assertViewHas('posts', $posts);
    }

    public function test_all()
    {
        // Create a user
        $user = User::factory()->create();
        
        // Act as the created user
        $this->actingAs($user);

        // Create some posts
        $posts = Post::factory()->count(5)->create();

        // Call the all method
        $response = $this->get('/student/post');

        // Assert the response
        $response->assertStatus(200);
        $response->assertViewIs('student.post');
        $response->assertViewHas('posts', $posts);
    }

    public function test_review()
    {
        // Create a user
        $user = User::factory()->create();
        
        // Act as the created user
        $this->actingAs($user);

        // Create a post and a quiz
        $post = Post::factory()->create();
        $quiz = Quiz::factory()->create(['post_id' => $post->id]);

        // Create questions and options for the quiz
        // Assuming you have factories for questions and options
        $questions = \App\Models\Question::factory()->count(2)->create(['quiz_id' => $quiz->id]);
        foreach ($questions as $question) {
            \App\Models\Option::factory()->count(3)->create(['question_id' => $question->id]);
        }

        // Call the review method
        $response = $this->get('/student/review/' . $post->slug);

        // Assert the response
        $response->assertStatus(200);
        $response->assertViewIs('student.review');
        $response->assertViewHas('post', $post);
        $response->assertViewHas('quiz', $quiz);
    }
}