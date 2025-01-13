<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuizUser>
 */
class QuizUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quiz_id' => Quiz::factory(),
            'user_id' => User::factory(),
            'enrolled_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'completed_at' => $this->faker->dateTimeBetween('now', '+1 month'),
            'score' => $this->faker->numberBetween(0, 100),
        ];
    }
}
