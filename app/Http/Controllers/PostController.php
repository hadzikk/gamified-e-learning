<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Menampilkan semua post di halaman mahasiswa
    public function show() 
    {    
        $posts = Post::with('user')->latest()->paginate(10);
        return view('student.post', ['posts' => $posts]);
    }

    // Menampilkan pratinjau post di halaman mahasiswa
    public function review(Post $post) 
    {
        $post = $post->load('user');
        $quiz = Quiz::with(['questions.options'])->where('post_id', $post->id)->get();

        return view('student.review', [
            'post' => $post,
            'quiz' => $quiz
        ]);
    }

    // Menyimpan postingan kuis
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'subject' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'level' => 'required|in:basic,advance,proficient',
            'description' => 'nullable|string|max:230',
            'deadline' => 'nullable|date',
            'questions.*.question_text' => 'required|string',
            'questions.*.options.*.option_text' => 'required|string',
            'questions.*.options.*.is_correct' => 'required|boolean',
        ]);

        // Tentukan penalty berdasarkan level
        $penalty = 0;
        if ($request->level === 'basic') {
            $penalty = 30;
        } elseif ($request->level === 'advance') {
            $penalty = 20;
        } elseif ($request->level === 'proficient') {
            $penalty = 10;
        }

        // Simpan post
        $post = Post::create([
            'user_id' => auth()->id(), // Ambil user_id dari pengguna yang sedang login
            'subject' => $request->subject,
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title, '-'),
            'level' => $request->level,
        ]);

        // Simpan kuis terkait post
        $quiz = Quiz::create([
            'post_id' => $post->id, // Relasi ke post yang sudah ada
            'title' => $request->title, // Judul kuis sama dengan judul post
            'level' => $request->level,
            'penalty' => $penalty, // Set penalty sesuai level
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
                        'is_correct' => $optionData['is_correct'],
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Postingan kuis berhasil dibuat!');
    }



}
