<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'username'=>'Admin',
                'first_name'=>'afif',
                'last_name' =>'Muflih',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123')
            ],
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
