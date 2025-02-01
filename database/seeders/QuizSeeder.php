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
                'duration' => 120,
                'penalty' => 30
            ]
        );

        Quiz::create(
            [
                'post_id' => 2,
                'duration' => 20,
                'penalty' => 30
            ]
        );
    }
}
