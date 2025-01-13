<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Quiz;
use App\Models\User;
use App\Models\QuizResult;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $user = User::create([
            'username' => 'testuser',
            'first_name' => 'Test',
            'last_name' => 'User ',
            'slug' => 'test-user',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
        ]);

        $this->assertDatabaseHas('users', [
            'username' => 'testuser',
        ]);
    }

    /** @test */
    public function it_can_get_posts()
    {
        $user = User::factory()->create();
        $post = $user->posts()->create([
            'subject' => 'Test Subject',
            'title' => 'Test Title',
            'description' => 'Test Description',
            'slug' => 'test-title',
            'level' => 'basic',
        ]);

        $this->assertCount(1, $user->posts);
    }

    /** @test */
    public function testCanGetQuizResults()
{
    // Create a user
    $user = User::factory()->create();

    // Create a quiz
    $quiz = Quiz::factory()->create();

    // Now you can insert a quiz result
    $quizResult = QuizResult::create([
        'quiz_id' => $quiz->id,
        'user_id' => $user->id,
        'score' => 85,
    ]);

    // Assert that the quiz result was created successfully
    $this->assertDatabaseHas('quiz_results', [
        'quiz_id' => $quiz->id,
        'user_id' => $user->id,
        'score' => 85,
    ]);
}

    // Add more tests for other methods and scenarios
}