<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create(
            [
                'user_id' => 3,
                'subject' => 'java',
                'title' => 'bubble sort algorithm',
                'description' => 'lorem ipsum dolor sit amet adispiscing elit.',
                'slug' => 'bubble-sort-algorithm',
                'level' => 'proficient'
            ]
        );

        Post::create(
            [
                'user_id' => 4,
                'subject' => 'metodologi penelitian',
                'title' => 'systmatic literature review',
                'description' => 'lorem ipsum dolor sit amet adispiscing elit.',
                'slug' => 'metodologi-penelitian',
                'level' => 'advance'
            ]
        );

        Post::create(
            [
                'user_id' => 5,
                'subject' => 'bahasa inggris',
                'title' => 'comparative adjective',
                'description' => 'lorem ipsum dolor sit amet adispiscing elit.',
                'slug' => 'comparative-adjective',
                'level' => 'basic'
            ]
        );
    }
}
