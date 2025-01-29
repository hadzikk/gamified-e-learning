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
                'question_text' => 'Apa output dari System.out.println(5 + 3 * 2);'
            ]
        );
        
        Question::create(
            [
                'quiz_id' => 1,
                'question_text' => 'Apa yang akan dicetak oleh System.out.println("Hello" + " World");'
            ]
        );
        
        Question::create(
            [
                'quiz_id' => 1,
                'question_text' => 'Apa hasil dari kode int x = 10; System.out.println(x > 5 ? "Yes" : "No");'
            ]
        );
        
        Question::create(
            [
                'quiz_id' => 1,
                'question_text' => 'Apa output dari System.out.println(10 % 3);'
            ]
        );
        
        Question::create(
            [
                'quiz_id' => 1,
                'question_text' => 'Apa yang terjadi dengan kode int[] arr = new int[5]; System.out.println(arr[0]);'
            ]
        );        
    }
}
