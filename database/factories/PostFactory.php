<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'subject' => $this->faker->sentence,
            'title' => $this->faker->sentence,
            'description' => $this->faker->text(230),
            'slug' => $this->faker->unique()->slug,
            'level' => $this->faker->randomElement(['basic', 'advance', 'proficient']),
        ];
    }
}
