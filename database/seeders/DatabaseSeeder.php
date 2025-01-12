<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Quiz;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);   
        $this->call(PostSeeder::class);   
        $this->call(QuizSeeder::class);   
        $this->call(QuestionSeeder::class);   
        $this->call(OptionSeeder::class);   
    }
}
