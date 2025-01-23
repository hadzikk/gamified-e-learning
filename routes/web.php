<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Controller User
Route::get('/', [UserController::class, 'index']); // Welcome
Route::get('/oa/account-security/login', [AuthController::class, 'index']); // Login User
Route::post('/oa/account-security/login', [AuthController::class, 'authenticate']);
Route::post('/oa/account-security/logout', [AuthController::class, 'logout']);

// Controller Lecturer
Route::prefix('lecturer')->group(function () {
    Route::get('/dashboard/create', [LecturerController::class, 'create']);
    Route::post('/dashboard/create', [PostController::class, 'store']); // Automatically maps CRUD
});

// Controller Student
Route::prefix('student')->group(function () {
    Route::get('/post', [PostController::class, 'show']); // Postingan Kuis
    Route::get('/review/{post:slug}', [PostController::class, 'review']); // Review Kuis
});
