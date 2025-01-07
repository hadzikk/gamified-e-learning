<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DosenDashController;


Route::get('/login', [SessionController::class, 'index'])->name('login');// Mengarahkan ke halaman login
Route::post('/login/submit',[SessionController::class,'login'])->name('login.submit');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/AdminDash', [AdminController::class, 'index'])->name('AdminDashboard');
    Route::get('/Datacreate', [UserController::class, 'create'])->name('Admincreate');
    Route::post('/create-data', [UserController::class, 'store'])->name('store-data');
    Route::get('/dataview', [AdminController::class, 'showUsers'])->name('Dataview');
});

Route::group(['middleware' => ['auth:dosen']], function () {
    Route::get('/DosenDashboard', [DosenController::class, 'index'])->name('dosdash');
    Route::get('/QuizDashboard', [DosenController::class, 'quiz'])->name('quizdos');
    Route::get('/MateriDashboard', [DosenController::class, 'materi'])->name('materidos');
    Route::get('/PreviewDashboard', [DosenController::class, 'review'])->name('reviewidos');
});

Route::group(['middleware' => ['auth:mahasiswa']], function(){

});

Route::get('/profile', function () {
    return view('profile', 
    [
        'title' => 'E-Learning - Profile',
        'full_name' => 'Hadzik Mochamad Sofyan', 
        'username' => '@hadzikkk', 
        'level' => 'basic',
        'profile_picture' => 'images/hadzik.jpeg',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim?'
    ])-> name('profile');
});

Route::get('/post', function () {
    return view('post', [
        'tasks' => [
            [
                'id' => 1,
                'lecturer' => 'Cahyo Prianto, S.Pd., M.T., CDSP, SFPC',
                'subject' => 'literasi data',
                'title' => 'array multidimensi',
                'level' => 'basic',
                'link' => ''
            ],
            [
                'id' => 2,
                'lecturer' => 'Syafrial Fachri Pane, ST. MTI, EBDP.CDSP, SFPC',
                'subject' => 'metodologi penelitian',
                'title' => 'systematic literature review - watase uake',
                'level' => 'advance',
                'link' => ''
            ],
            [
                'id' => 3,
                'lecturer' => 'Mohamad Nurkamal Fauzan, S.T., M.T., SFPC',
                'subject' => 'algoritma',
                'title' => 'bubble sort algorithm',
                'level' => 'proficient',
                'link' => ''
            ],
            [
                'id' => 4,
                'lecturer' => 'Syafrial Fachri Pane, ST. MTI, EBDP.CDSP, SFPC',
                'subject' => 'basis data II / database II',
                'title' => 'inner join',
                'level' => 'proficient',
                'link' => ''
            ],
            [
                'id' => 5,
                'lecturer' => 'Rd. Nuraini Siti Fathonah, S.S., M.Hum., SFPC',
                'subject' => 'bahasa inggris',
                'title' => 'comparative adjective',
                'level' => 'advance',
                'link' => ''
            ]
        ]
    ]);
});

Route::get('/review', function () {
    return view('review');
});

Route::get('/review/{id}', function ($id) {
    $tasks = [
        [
            'id' => 1,
            'lecturer' => 'Cahyo Prianto, S.Pd., M.T., CDSP, SFPC',
            'subject' => 'literasi data',
            'title' => 'array multidimensi',
            'level' => 'basic',
            'link' => ''
        ],
        [
            'id' => 2,
            'lecturer' => 'Syafrial Fachri Pane, ST. MTI, EBDP.CDSP, SFPC',
            'subject' => 'metodologi penelitian',
            'title' => 'systematic literature review - watase uake',
            'level' => 'advance',
            'link' => ''
        ],
        [
            'id' => 3,
            'lecturer' => 'Mohamad Nurkamal Fauzan, S.T., M.T., SFPC',
            'subject' => 'algoritma',
            'title' => 'bubble sort algorithm',
            'level' => 'proficient',
            'link' => ''
        ],
        [
            'id' => 4,
            'lecturer' => 'Syafrial Fachri Pane, ST. MTI, EBDP.CDSP, SFPC',
            'subject' => 'basis data II / database II',
            'title' => 'inner join',
            'level' => 'proficient',
            'link' => ''
        ],
        [
            'id' => 5,
            'lecturer' => 'Rd. Nuraini Siti Fathonah, S.S., M.Hum., SFPC',
            'subject' => 'bahasa inggris',
            'title' => 'comparative adjective',
            'level' => 'advance',
            'link' => ''
        ]
    ];

    $task = Arr::first($tasks, function ($task) use ($id) {
        return $task['id'] == $id;
    });

    return view('review', [
        'task' => $task,
        'quizzes' => [
            [
                'id' => 1,
                'question' => 'Apa tujuan utama dari algoritma Bubble Sort?',
            ],
            [
                'id' => 2,
                'question' => 'Bagaimana cara kerja algoritma Bubble Sort?',
            ],
            [
                'id' => 3,
                'question' => 'Berapa jumlah maksimum perbandingan yang dilakukan oleh Bubble Sort untuk mengurutkan array dengan n elemen?',
            ],
            [
                'id' => 4,
                'question' => 'Apa kompleksitas waktu terburuk dari algoritma Bubble Sort?',
            ],
            [
                'id' => 5,
                'question' => 'Bagaimana cara mengoptimalkan Bubble Sort untuk mengurangi jumlah iterasi yang tidak perlu?',
            ],
        ]
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