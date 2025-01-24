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
            'post_id' => Post::factory(),
            'level' => $this->faker->randomElement(['basic', 'intermediate', 'proficient']),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 month'),
            'penalty' => $this->faker->numberBetween(0, 10),
        ];
    }
}
