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
        // Post::create(
        //     [
        //         'user_id' => 3,
        //         'subject' => 'java',
        //         'title' => 'syntax dan logika dasar',
        //         'description' => 'Kuis ini menguji pemahaman Anda tentang dasar-dasar Java dalam konteks kode singkat. Cocok untuk pemula yang ingin menguji kemampuan mereka dalam memahami sintaks dan logika dasar Java.',
        //         'slug' => 'syntax-dan-logika-dasar',
        //         'level' => 'basic'
        //     ]
        // );

        // Post::create(
        //     [
        //         'user_id' => 4,
        //         'subject' => 'network programming',
        //         'title' => 'network programming dasar',
        //         'description' => 'Kuis ini menguji pemahaman Anda tentang dasar-dasar Network Programming dalam konteks IP Address dsb. Cocok untuk pemula yang ingin menguji kemampuan mereka dalam memahami Network Programming.',
        //         'slug' => 'network programming',
        //         'level' => 'basic'
        //     ]
        // );
    }
}
