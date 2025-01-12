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
            'option_text' => 'Algoritma untuk mengurutkan elemen dengan cara membandingkan elemen berdekatan dan menukarnya jika perlu',
            'is_correct' => true, // Opsi benar
        ]);

        Option::create([
            'question_id' => 1,
            'option_text' => 'Algoritma yang menggunakan pohon biner untuk mengurutkan elemen',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 1,
            'option_text' => 'Algoritma untuk menghitung frekuensi elemen dalam array',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 1,
            'option_text' => 'Algoritma untuk mengurutkan elemen dengan cara membandingkan elemen pertama dengan elemen terakhir',
            'is_correct' => false,
        ]);

        // Opsi untuk pertanyaan "Berapakah kompleksitas waktu algoritma bubble sort dalam kasus terburuk?"
        Option::create([
            'question_id' => 2,
            'option_text' => 'O(n log n)',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 2,
            'option_text' => 'O(n)',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 2,
            'option_text' => 'O(n^2)',
            'is_correct' => true, // Opsi benar
        ]);

        Option::create([
            'question_id' => 2,
            'option_text' => 'O(log n)',
            'is_correct' => false,
        ]);

        // Opsi untuk pertanyaan "Mana dari pernyataan berikut yang merupakan optimisasi umum untuk algoritma bubble sort?"
        Option::create([
            'question_id' => 3,
            'option_text' => 'Menggunakan algoritma quicksort untuk menggantikan bubble sort',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 3,
            'option_text' => 'Menambahkan penanda untuk menghentikan iterasi jika tidak ada pertukaran yang terjadi',
            'is_correct' => true, // Opsi benar
        ]);

        Option::create([
            'question_id' => 3,
            'option_text' => 'Membagi array menjadi dua bagian dan menyortirnya secara paralel',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 3,
            'option_text' => 'Menggunakan lebih banyak memori dengan array tambahan',
            'is_correct' => false,
        ]);

        // Opsi untuk pertanyaan "Salah satu kelebihan bubble sort dibandingkan dengan algoritma sorting lainnya adalah"
        Option::create([
            'question_id' => 4,
            'option_text' => 'Bubble sort lebih cepat dalam mengurutkan data yang sangat besar',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 4,
            'option_text' => 'Bubble sort lebih efisien dalam hal penggunaan memori dibandingkan algoritma lain',
            'is_correct' => true, // Opsi benar
        ]);

        Option::create([
            'question_id' => 4,
            'option_text' => 'Bubble sort memiliki waktu eksekusi yang lebih rendah untuk array yang sudah terurut',
            'is_correct' => false,
        ]);

        Option::create([
            'question_id' => 4,
            'option_text' => 'Bubble sort lebih cocok untuk data yang sangat besar dan membutuhkan lebih sedikit perbandingan',
            'is_correct' => false,
        ]);
    }
}
