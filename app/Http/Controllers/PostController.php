<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // menampilkan semua post yang  telah di posting dosen di halamanya
    public function posted($slug)
    {
        $user = User::where('slug', $slug)->where('role', 'dosen')->firstOrFail();
        $posts = Post::where('user_id', $user->id)->get();
        return view('lecturer.posted', ['user' => $user, 'posts' => $posts]);
    }

    // menampilkan semua post di halaman mahasiswa
    public function all() {    
        $posts = Post::with('user')->latest()->paginate(10);
        return view('student.post', ['posts' => $posts]);
    }

    // menampilkan pratinjau post di halaman mahasiswa
    public function review(Post $post) {
        $post = $post->load('user');
        $quiz = Quiz::with(['questions.options'])->where('post_id', $post->id)->get();

        return view('student.review', [
            'post' => $post,
            'quiz' => $quiz
        ]);
    }

    // CRUD
    // create
    public function store() {
        return view('lecturer.build');
    }

}
