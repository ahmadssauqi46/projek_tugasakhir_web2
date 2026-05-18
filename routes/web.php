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

Route::get('/quiz', [QuizController::class, 'index']);

Route::post('/quiz/submit', [App\Http\Controllers\QuizController::class, 'submitQuiz']);

Route::get('/quiz/hardware', [App\Http\Controllers\QuizController::class, 'hardwareQuiz']);
Route::get('/quiz/software', [App\Http\Controllers\QuizController::class, 'softwareQuiz']);
Route::get('/quiz/jaringan', [App\Http\Controllers\QuizController::class, 'jaringanQuiz']);

Route::get('/game/hardware', [App\Http\Controllers\QuizController::class, 'hardwareGame']);
Route::get('/game/software', [App\Http\Controllers\QuizController::class, 'softwareGame']);
Route::get('/game/jaringan', [App\Http\Controllers\QuizController::class, 'jaringanGame']);