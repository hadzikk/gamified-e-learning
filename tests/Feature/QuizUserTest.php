<?php

namespace Tests\Unit;

use App\Models\QuizUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_quiz_user()
    {
        $user = User::factory()->create();
        
        $quizUser = QuizUser::create([
            'quiz_id' => 1, // Pastikan ada quiz dengan ID 1 di database jika diperlukan
            'user_id' => $user->id,
            'enrolled_at' => now(),
            'completed_at' => null,
            'time_given' => 30,
            'time_taken' => null,
            'score' => null,
        ]);
        
        $this->assertDatabaseHas('quiz_user', [
            'user_id' => $user->id,
            'quiz_id' => 1,
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
