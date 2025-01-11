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
        $post = Post::factory()->create();

        return [
            'post_id' => $post->id,  // Relasi ke post yang sudah ada
            'title' => $post->title,  // Mengambil title dari Post (optional jika ingin berbeda)
            'level' => $post->level,  // Mengambil level dari Post
            'deadline' => now()->addDays(fake()->numberBetween(1, 7)),  // Deadline dalam rentang 1-7 hari ke depan
            'penalty' => fake()->numberBetween(1, 10),  // Pengurangan skor (opsional, bisa diubah sesuai kebijakan)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
