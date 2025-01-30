<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(), // Create a post for the quiz
            'duration' => $this->faker->numberBetween(30, 120), // Example duration in minutes
            'penalty' => $this->faker->numberBetween(0, 10), // Penalty for exceeding deadline
        ];
    }
}