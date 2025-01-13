<?php
namespace Tests\Feature;

use App\Models\QuizResult;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizResultTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_quiz_result()
    {
        // Membuat User dan Quiz menggunakan factory
        $user = User::factory()->create();
        $quiz = Quiz::factory()->create();

        // Membuat QuizResult menggunakan factory
        $quizResult = QuizResult::factory()->create([
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
        ]);

        // Assert that the quiz result belongs to the user
        $this->assertInstanceOf(User::class, $quizResult->user);
        $this->assertEquals($user->id, $quizResult->user->id);
    }

    /** @test */
    public function it_belongs_to_a_user()
    {
        // Membuat User dan Quiz menggunakan factory
        $user = User::factory()->create();
        $quiz = Quiz::factory()->create();

        // Membuat QuizResult menggunakan factory
        $quizResult = QuizResult::factory()->create([
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
            'score' => 85
        ]);

        // Assert that the quiz result belongs to the user
        $this->assertInstanceOf(User::class, $quizResult->user);
        $this->assertEquals($user->id, $quizResult->user->id);
    }

    /** @test */
    public function it_belongs_to_a_quiz()
    {
        // Membuat User dan Quiz menggunakan factory
        $user = User::factory()->create();
        $quiz = Quiz::factory()->create();

        // Membuat QuizResult menggunakan factory
        $quizResult = QuizResult::factory()->create([
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
            'score' => 85
        ]);

        // Assert that the quiz result belongs to the quiz
        $this->assertInstanceOf(Quiz::class, $quizResult->quiz);
        $this->assertEquals($quiz->id, $quizResult->quiz->id);
    }

    /** @test */
    public function it_has_a_score()
    {
        // Membuat User dan Quiz menggunakan factory
        $user = User::factory()->create();
        $quiz = Quiz::factory()->create();

        // Membuat QuizResult menggunakan factory
        $quizResult = QuizResult::factory()->create([
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
            'score' => 85
        ]);

        // Assert that the score is set correctly
        $this->assertEquals(85, $quizResult->score);
    }
}
