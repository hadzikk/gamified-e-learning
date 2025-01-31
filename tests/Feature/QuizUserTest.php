<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Quiz;
use App\Models\User;
use App\Models\QuizUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_quiz_user()
{
    $user = User::factory()->create();
    $quiz = Quiz::factory()->create(); // Buat quiz baru

    $quizUser = QuizUser::create([
        'quiz_id' => $quiz->id, // Gunakan ID quiz yang baru dibuat
        'user_id' => $user->id,
        'enrolled_at' => now(),
        'completed_at' => null,
        'time_given' => 30,
        'time_taken' => null,
        'score' => 0,
    ]);

    $this->assertDatabaseHas('quiz_user', [
        'user_id' => $user->id,
        'quiz_id' => $quiz->id, // Gunakan ID quiz yang baru dibuat
    ]);
}


    /** @test */
    public function it_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $quizUser = QuizUser::factory()->create(['user_id' => $user->id]);
        
        $this->assertInstanceOf(User::class, $quizUser->user);
        $this->assertEquals($user->id, $quizUser->user->id);
    }
}
