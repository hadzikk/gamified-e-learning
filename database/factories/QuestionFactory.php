<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quiz = Quiz::factory()->create();  // Membuat Quiz terlebih dahulu

        return [
            'quiz_id' => $quiz->id,  // Relasi ke quiz yang sudah ada
            'question_text' => fake()->sentence(10),  // Isi soal (kalimat acak dengan 10 kata)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
