<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Support\Facades\Route;

Route::get('/profile', function () {
    return view('profile', 
    [
        'title' => 'E-Learning - Profile',
        'full_name' => 'Hadzik Mochamad Sofyan', 
        'username' => '@hadzikkk', 
        'level' => 'basic',
        'profile_picture' => 'images/hadzik.jpeg',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim?'
    ]);
});

// mengalihkan ke halaman post mahasiswa
Route::get('/post', function () {
    return view('post', ['posts' => Post::all()]); // mengambil semua data menggunakan method all dari class Post
});

Route::get('/review', function () {
    return view('review');
});

// mengalihkan ke halaman review
// data ditampilkan berdasarkan id pada link post yang dikirim ke route
Route::get('/review/{post:slug}', function (Post $post) {
    return view('review', [
        'post' => $post,
        'questions' => Question::all(),
        'options' => Option::all()
    ]);
});

Route::get('/home/{id}', function ($id) {
    dd($id);
});

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Welcome'
    ]);
});

Route::get('administrator/dashboard-mahasiswa', function () {
    return view('administrator.dashboard_mahasiswa', ['users' => User::all()]);
});