<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create(
            [
                'quiz_id' => 1,
                'question_text' => 'Apa itu bubble sort algorithm'
            ]
        );
        
        Question::create(
            [
                'quiz_id' => 1,
                'question_text' => 'Berapakah kompleksitas waktu algoritma bubble sort dalam kasus terburuk?'
            ]
        );

        Question::create(
            [
                'quiz_id' => 1,
                'question_text' => 'Mana dari pernyataan berikut yang merupakan optimisasi umum untuk algoritma bubble sort?'
            ]
        );

        Question::create(
            [
                'quiz_id' => 1,
                'question_text' => 'Salah satu kelebihan bubble sort dibandingkan dengan algoritma sorting lainnya adalah'
            ]
        );
    }
}
