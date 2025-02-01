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

        Option::create([
            'question_id' => 6,
            'option_text' => 'Sebuah perangkat keras yang digunakan untuk menghubungkan jaringan',
            'is_correct' => false,
        ]);
        
        Option::create([
            'question_id' => 6,
            'option_text' => 'Sebuah endpoint komunikasi dalam jaringan',
            'is_correct' => true,
        ]);
        
        Option::create([
            'question_id' => 6,
            'option_text' => 'Protokol komunikasi di internet',
            'is_correct' => false,
        ]);
        
        Option::create([
            'question_id' => 7,
            'option_text' => 'TCP lebih cepat daripada UDP',
            'is_correct' => false,
        ]);
        
        Option::create([
            'question_id' => 7,
            'option_text' => 'UDP lebih cocok untuk aplikasi yang membutuhkan kecepatan tinggi dan toleransi terhadap kehilangan data',
            'is_correct' => true,
        ]);
        
        Option::create([
            'question_id' => 7,
            'option_text' => 'TCP lebih banyak digunakan untuk aplikasi streaming video',
            'is_correct' => false,
        ]);
        
        Option::create([
            'question_id' => 8,
            'option_text' => 'IP address digunakan untuk mengidentifikasi perangkat dalam jaringan komputer',
            'is_correct' => true,
        ]);
        
        Option::create([
            'question_id' => 8,
            'option_text' => 'IP address digunakan untuk mengenkripsi data dalam jaringan',
            'is_correct' => false,
        ]);
        
        Option::create([
            'question_id' => 8,
            'option_text' => 'IP address hanya digunakan untuk perangkat yang terhubung ke internet',
            'is_correct' => false,
        ]);
        
        Option::create([
            'question_id' => 9,
            'option_text' => 'Client mengirim permintaan ke server, dan server mengirimkan data atau respon balik ke client',
            'is_correct' => true,
        ]);
        
        Option::create([
            'question_id' => 9,
            'option_text' => 'Server mengirimkan data tanpa permintaan dari client',
            'is_correct' => false,
        ]);
        
        Option::create([
            'question_id' => 9,
            'option_text' => 'Client dan server saling berkomunikasi melalui jaringan lokal tanpa menggunakan internet',
            'is_correct' => false,
        ]);
        
        Option::create([
            'question_id' => 10,
            'option_text' => 'Port adalah alamat fisik yang digunakan untuk menghubungkan perangkat dalam jaringan',
            'is_correct' => false,
        ]);
        
        Option::create([
            'question_id' => 10,
            'option_text' => 'Port adalah angka yang digunakan untuk mengidentifikasi aplikasi dalam komunikasi jaringan',
            'is_correct' => true,
        ]);
        
        Option::create([
            'question_id' => 10,
            'option_text' => 'Port hanya digunakan dalam komunikasi wireless',
            'is_correct' => false,
        ]);
        
    }
}
