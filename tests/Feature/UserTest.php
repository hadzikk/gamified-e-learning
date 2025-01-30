<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Quiz;
use App\Models\User;
use App\Models\QuizUser;
use App\Models\QuizResult;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $user = User::create([
            'username' => 'testuser',
            'first_name' => 'test',
            'last_name' => 'testing',
            'degree' => null,
            'email' => 'testing@gmail.com', 
            'password' => bcrypt('test'),
            'role' => 'student',
            'score' => 70,
            'remember_token' => Str::random(10)
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

    // Add more tests for other methods and scenarios
}