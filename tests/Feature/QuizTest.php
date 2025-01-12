<?php

namespace Tests\Feature;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Post;
use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_have_multiple_users()
    {
        // Create a quiz
        $quiz = Quiz::factory()->create();

        // Create multiple users
        $users = User::factory()->count(3)->create();

        // Attach users to the quiz
        $quiz->users()->attach($users->pluck('id'));

        // Assert that the quiz has the correct number of users
        $this->assertCount(3, $quiz->users);
    }

    /** @test */
    public function it_belongs_to_a_post()
    {
        // Create a post
        $post = Post::factory()->create();

        // Create a quiz that belongs to the post
        $quiz = Quiz::factory()->create(['post_id' => $post->id]);

        // Assert that the quiz belongs to the post
        $this->assertInstanceOf(Post::class, $quiz->post);
        $this->assertEquals($post->id, $quiz->post->id);
    }

    /** @test */
    public function it_can_have_multiple_questions()
    {
        // Create a quiz
        $quiz = Quiz::factory()->create();

        // Create multiple questions for the quiz
        $questions = Question::factory()->count(3)->create(['quiz_id' => $quiz->id]);

        // Assert that the quiz has the correct number of questions
        $this->assertCount(3, $quiz->questions);
        $this->assertEquals($questions->pluck('id')->toArray(), $quiz->questions->pluck('id')->toArray());
    }
}