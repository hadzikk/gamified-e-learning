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
        $subject = fake()->randomElement(
            [
                'Matematika Diskrit',
                'Algoritma',
                'Metodologi Penelitian'
            ]
        );

        return [
            'user_id' => User::factory()->create(['role' => 'dosen'])->id,  // Menetapkan user dosen yang akan mengirim post
            'subject' => $subject,  // Subjek atau topik post
            'title' => fake()->sentence(),  // Judul post
            'description' => fake()->sentence(),
            'slug' => fake()->slug(),  // Slug otomatis
            'level' => fake()->randomElement(['basic', 'advance', 'proficient']),  // Level kuis
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
