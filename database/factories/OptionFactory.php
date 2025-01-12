<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Membuat atau mengambil instansi Question
        $question = Question::factory()->create(); // Membuat Question baru, atau bisa menggunakan Question::first() untuk mengambil yang sudah ada

        return [
            'question_id' => $question->id,  // Relasi ke question yang sudah ada
            'option_text' => $this->faker->sentence(5),  // Teks opsi (kalimat acak dengan 5 kata)
            'is_correct' => $this->faker->boolean(),  // Menentukan apakah opsi ini benar
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
