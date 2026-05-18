<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/quiz', [QuizController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);

Route::get('/materi', [MateriController::class, 'index']);

Route::get('/materi/hardware', [MateriController::class, 'hardware']);
Route::get('/materi/software', [MateriController::class, 'software']);
Route::get('/materi/jaringan', [MateriController::class, 'jaringan']);