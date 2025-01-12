<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::create(
            [
                'post_id' => 1,
                'title' => 'Bubble Sort Algorithm',
                'level' => 'proficient',
                'deadline' => '2025-01-13 17:29:44',
                'penalty' => 40
            ]
        );
    }
}
