<?php

use App\Http\Controllers\OpenAccess;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Controller User
Route::get('/', [UserController::class, 'index']); // Welcome
Route::get('oa/account-security/login', [OpenAccess::class, 'index']); // Login User
Route::post('/oa/account-security/login', [OpenAccess::class, 'authenticate']);
Route::post('/oa/account-security/logout', [OpenAccess::class, 'logout']);

// Controller Admin
Route::get('/administrator/{id}/data', [UserController::class, 'showAllUsers']);

// Controller Dosen
Route::get('/lecturer/{slug}/posted', [PostController::class, 'posted']); // Melihat Kuis
Route::get('/lecturer/{slug}/build', [PostController::class, 'store']);

// Controller Mahasiswa
Route::get('/student/post', [PostController::class, 'all']); // Postingan Kuis
Route::get('/student/review/{post:slug}', [PostController::class, 'review']); // Review Kuis