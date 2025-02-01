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
        
        Question::create(
            [
                'quiz_id' => 2,
                'question_text' => 'Apa itu socket dalam konteks Network Programming?'
            ]
        );
        
        Question::create(
            [
                'quiz_id' => 2,
                'question_text' => 'Apa perbedaan antara TCP dan UDP dalam komunikasi jaringan?'
            ]
        );
        
        Question::create(
            [
                'quiz_id' => 2,
                'question_text' => 'Apa yang dimaksud dengan IP address dan fungsi utamanya dalam jaringan komputer?'
            ]
        );
        
        Question::create(
            [
                'quiz_id' => 2,
                'question_text' => 'Jelaskan proses komunikasi client-server dalam model jaringan.'
            ]
        );
        
        Question::create(
            [
                'quiz_id' => 2,
                'question_text' => 'Apa yang dimaksud dengan port dalam komunikasi jaringan dan apa fungsinya?'
            ]
        );
        
    }
}
