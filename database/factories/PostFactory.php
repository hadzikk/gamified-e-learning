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
            'user_id' => User::factory()->create(['role' => 'dosen'])->id,  // Menetapkan user dosen yang akan mengirim post
            'subject' => fake()->word(),  // Subjek atau topik post
            'title' => fake()->sentence(),  // Judul post
            'slug' => fake()->slug(),  // Slug otomatis
            'level' => fake()->randomElement(['basic', 'advance', 'proficient']),  // Level kuis
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
