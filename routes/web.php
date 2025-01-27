<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\AdministratorController;

// Controller User
Route::get('/', [UserController::class, 'index']); // Welcome
Route::get('/oa/account-security/login', [AuthController::class, 'index']); // Login User
Route::post('/oa/account-security/login', [AuthController::class, 'authenticate']);
Route::post('/oa/account-security/logout', [AuthController::class, 'logout']);

// Controller Administartor
Route::prefix('administrator')->group(function () {
    Route::get('/dashboard/home', [AdministratorController::class, 'index'])->name('administrator.home');
    Route::get('/dashboard/registrating/student', [AdministratorController::class, 'studentIndex']);
    Route::post('dashboard/registrating/student', [AdministratorController::class, 'store']);
    Route::get('/dashboard/registrating/lecturer', [AdministratorController::class, 'lecturerIndex']);
    Route::post('dashboard/registrating/lecturer', [AdministratorController::class, 'store']);
});

// Controller Lecturer
Route::prefix('lecturer')->group(function () {
    Route::get('/dashboard', [LecturerController::class, 'index']);
    Route::get('/dashboard/create', [LecturerController::class, 'create']);
    Route::post('/dashboard/create', [PostController::class, 'store']); // Automatically maps CRUD
});

// Controller Student
Route::prefix('student')->group(function () {
    Route::get('/post', [PostController::class, 'show']); // Postingan Kuis
    Route::get('/review/{post:slug}', [PostController::class, 'review']); // Review Kuis
});


Route::post('/quizzes/{quiz}/enroll', [QuizController::class, 'enroll'])->name('quizzes.enroll');
Route::post('/quizzes/{quiz}/submit', [QuizController::class, 'submitQuiz'])->name('quizzes.submit');