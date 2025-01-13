<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Option;
use App\Models\Question;
use App\Models\QuizUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_user()
    {
        // Create a user
        $user = User::factory()->create();

        // Create a QuizUser  and associate it with the user
        $quizUser  = QuizUser ::factory()->create(['user_id' => $user->id]);

        // Assert that the quizUser  belongs to the user
        $this->assertInstanceOf(User::class, $quizUser ->user);
        $this->assertEquals($user->id, $quizUser ->user->id);
    }

    public function it_belongs_to_a_quiz()
    {
        // Create a quiz
        $quiz = Quiz::factory()->create();

        // Create a user
        $user = User::factory()->create();

        // Create a QuizUser  and associate it with the user and quiz
        $quizUser  = QuizUser ::factory()->create(['user_id' => $user->id, 'quiz_id' => $quiz->id]);

        // Assert that the quizUser  belongs to the quiz
        $this->assertInstanceOf(Quiz::class, $quizUser ->quiz);
        $this->assertEquals($quiz->id, $quizUser ->quiz->id);
    }

    /** @test */
    public function a_user_can_have_multiple_quiz_users()
    {
        // Create a user
        $user = User::factory()->create();

        // Create multiple QuizUsers for the same user
        $quizUser1 = QuizUser ::factory()->create(['user_id' => $user->id]);

        // Assert that the user has multiple QuizUsers
        $this->assertCount(2, $user->quizUsers);
    }

    /** @test */
    public function it_can_retrieve_the_associated_quiz()
    {
        // Create a quiz
        $quiz = Quiz::factory()->create();

        // Create a user
        $user = User::factory()->create();

        // Create a QuizUser  and associate it with the user and quiz
        $quizUser  = QuizUser ::factory()->create(['user_id' => $user->id, 'quiz_id' => $quiz->id]);

        // Assert that the quiz can be retrieved from the quizUser 
        $this->assertEquals($quiz->id, $quizUser ->quiz->id);
    }

    /** @test */
    public function quiz_user_table_structure()
    {
        // Create a user and a quiz
        $user = User::factory()->create();
        $quiz = Quiz::factory()->create();

        // Create a QuizUser 
        $quizUser  = QuizUser ::factory()->create(['user_id' => $user->id, 'quiz_id' => $quiz->id]);

        // Assert that the quiz_user table has the correct columns
        $this->assertDatabaseHas('quiz_user', [
            'id' => $quizUser ->id,
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
        ]);
    }
}