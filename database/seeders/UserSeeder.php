<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'hadzikmochammad',
            'first_name' => 'hadzik',
            'last_name' => 'mochamad sofyan',
            'degree' => null,
            'email' => 'hadzikmochammad@gmail.com', 
            'password' => bcrypt('rahasiahadzik'),
            'role' => 'student',
            'score' => 0,
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'username' => 'muflihafif',
            'first_name' => 'muflih',
            'last_name' => 'afif mukhtalif',
            'degree' => null,
            'email' => 'muflihafif@gmail.com', 
            'password' => bcrypt('rahasiaafif'),
            'role' => 'administrator',
            'score' => 0,
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'username' => 'mnurkamal',
            'first_name' => 'mohamad',
            'last_name' => 'nurkamal fauzan',
            'degree' => ', S.T., M.T., SFPC',
            'email' => 'm.nurkamal.f@ulbi.ac.id', 
            'password' => bcrypt('rahasiapakkamal'),
            'role' => 'lecturer',
            'score' => 0,
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'username' => 'yusrilhelmi',
            'first_name' => 'M. Yusril',
            'last_name' => 'Helmi Setyawan',
            'degree' => ', S.Kom., M.Kom.,SFPC.',
            'email' => ' yusrilhelmi@ulbi.ac.id', 
            'password' => bcrypt('rahasiapakkamal'),
            'role' => 'lecturer',
            'score' => 0,
            'remember_token' => Str::random(10)
        ]);
    }
}
