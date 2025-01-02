<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenDashController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    Route::get('/DosenDashboard', [DosenController::class, 'index'])->name('dosDash');
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
    ]);
});

Route::get('/home', function () {
    return view('home', [
        'title' => 'E-Learning - Home',
        'profile_picture' => 'images/hadzik.jpeg',
        'posts' => [
            [
                'id' => 1,
                'title' => 'Object Oriented Programming',
                'lecturer' => 'Mohamad Nurkamal Fauzan, S.T., M.T., SFPC',
                'post_date' => '27 Desember 2024',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, nisi? Quos dolores ratione fuga, commodi maiores iure debitis cum tenetur tempore consectetur architecto atque eum dignissimos adipisci perspiciatis at saepe.',
                'link' => ''
            ],
            [
                'id' => 2,
                'title' => 'Comparative Adjective',
                'lecturer' => 'Rd. Nuraini Siti Fathonah, S.S., M.Hum., SFPC',
                'post_date' => '20 Desember 2024',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, nisi? Quos dolores ratione fuga, commodi maiores iure debitis cum tenetur tempore consectetur architecto atque eum dignissimos adipisci perspiciatis at saepe.Minus sunt maiores amet sapiente provident quaerat praesentium exercitationem quis temporibus minima consectetur assumenda odit',
                'link' => ''
            ],
            [
                'id' => 3,
                'title' => 'Systematic Literature Review',
                'lecturer' => 'Syafrial Fachri Pane,ST. MTI,EBDP.CDSP,SFPC',
                'post_date' => '1 Desember 2024',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi aut ullam natus, quia nobis vitae. Doloremque in dolorem nesciunt fugiat asperiores molestias exercitationem, dolor, optio qui dignissimos, iste earum dolorum.Molestias beatae velit exercitationem quae quasi odio assumenda corrupti? Numquam consectetur sapiente beatae qui similique reiciendis dignissimos id eveniet assumenda ducimus. Pariatur, iure consequuntur doloremque quas harum itaque nemo est.',
                'link' => ''
            ]
        ]
    ]);
});

Route::get('/home/{id}', function ($id) {
    dd($id);
});

Route::get('/post', function () {
    return view('post', [
        'title' => 'E-Learning - Post Detail',
        'profile_picture' => 'images/hadzik.jpeg',
    ]);
});