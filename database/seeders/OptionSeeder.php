<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Option::create([
            'question_id' => 1,
            'option_text' => '16',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 1,
            'option_text' => '11',
            'is_correct' => true,
        ]);

        Option::create([
            'question_id' => 1,
            'option_text' => '13',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 2,
            'option_text' => 'Hello World',
            'is_correct' => true,
        ]);

        Option::create([
            'question_id' => 2,
            'option_text' => '"Hello" + "World"',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 2,
            'option_text' => 'HelloWorld',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 3,
            'option_text' => 'Yes',
            'is_correct' => true,
        ]);

        Option::create([
            'question_id' => 3,
            'option_text' => 'No',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 3,
            'option_text' => 'Error',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 4,
            'option_text' => '1',
            'is_correct' => true,
        ]);

        Option::create([
            'question_id' => 4,
            'option_text' => '2',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 4,
            'option_text' => '3',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 5,
            'option_text' => 'Program error',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 5,
            'option_text' => 'Program mencetak 0',
            'is_correct' => true,
        ]);

        Option::create([
            'question_id' => 5,
            'option_text' => 'Program mencetak null',
            'is_correct' => false,
        ]);
    }
}
