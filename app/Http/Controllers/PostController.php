<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Menampilkan semua post di halaman mahasiswa
    public function show() 
    {    
        $posts = Post::with('user')->latest()->paginate(10);
        return view('student.post', ['posts' => $posts]);
    }

    // Menampilkan pratinjau post di halaman mahasiswa
    public function review(Post $post) {
        $post = $post->load('user');

        // Ambil data kuis terkait dengan post
        $quiz = Quiz::with(['questions.options'])->where('post_id', $post->id)->get();

        // Ambil user yang sedang login
        $user = Auth::user();

        // Buat array untuk menandai kuis yang sudah di-enroll
        $enrolledQuizIds = $user->quizzes->pluck('id')->toArray();

        return view('student.review', [
            'post' => $post,
            'quiz' => $quiz,
            'enrolledQuizIds' => $enrolledQuizIds, // Kirim ID kuis yang sudah di-enroll
        ]);
    }


    // Menyimpan postingan kuis
    public function store(Request $request)
{
    DB::beginTransaction(); // Mulai transaksi

    try {
        // Validasi input
        $request->validate([
            'subject' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'level' => 'required|in:basic,advance,proficient',
            'description' => 'nullable|string|max:230',
            'deadline' => 'nullable|date',
            'questions.*.question_text' => 'required|string',
            'questions.*.options.*.option_text' => 'required|string',
            'questions.*.options.*.is_correct' => 'boolean',
        ]);

        // Tentukan penalty berdasarkan level
        $penalty = match ($request->level) {
            'basic' => 30,
            'advance' => 20,
            'proficient' => 10,
            default => 0,
        };

        // Simpan post
        $post = Post::create([
            'user_id' => $request->user_id, // Ambil user_id dari pengguna yang sedang login
            'subject' => $request->subject,
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title, '-'),
            'level' => $request->level,
        ]);

        // Simpan kuis terkait post
        $quiz = Quiz::create([
            'post_id' => $post->id,
            'penalty' => $penalty,
            'deadline' => $request->deadline,
        ]);

        // Simpan pertanyaan dan opsi
        if ($request->has('questions')) {
            foreach ($request->questions as $questionData) {
                $question = Question::create([
                    'quiz_id' => $quiz->id,
                    'question_text' => $questionData['question_text'],
                ]);

                foreach ($questionData['options'] as $optionData) {
                    Option::create([
                        'question_id' => $question->id,
                        'option_text' => $optionData['option_text'],
                        'is_correct' => $optionData['is_correct'] ?? false,
                    ]);
                }
            }
        }

        DB::commit(); // Simpan transaksi
        return redirect()->back()->with('success', 'Postingan kuis berhasil dibuat!');
    } catch (\Exception $e) {
        DB::rollBack(); // Batalkan transaksi jika ada error
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}
}
