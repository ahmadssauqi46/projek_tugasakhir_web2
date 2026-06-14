<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/leaderboard', [HomeController::class, 'leaderboard'])->name('leaderboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard-siswa', [HomeController::class, 'dashboardSiswa'])->name('dashboard.siswa');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/{module:slug}', [MateriController::class, 'show'])->name('materi.show');
    Route::post('/materi/{module:slug}/latihan', [AssessmentController::class, 'submitLatihan'])->name('latihan.submit');

    Route::view('/simulasi-interaktif', 'quiz.game_arena')->name('simulasi.interaktif');

    Route::get('/quiz', [AssessmentController::class, 'quizIndex'])->name('quiz.index');
    Route::get('/quiz/{module:slug}', [AssessmentController::class, 'quizShow'])->name('quiz.show');
    Route::post('/quiz/{module:slug}', [AssessmentController::class, 'quizSubmit'])->name('quiz.submit');

    Route::get('/evaluasi', [AssessmentController::class, 'evaluasiShow'])->name('evaluasi.show');
    Route::post('/evaluasi', [AssessmentController::class, 'evaluasiSubmit'])->name('evaluasi.submit');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'guru'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('modules', AdminController::class)->parameters([
        'modules' => 'module',
    ]);

    Route::get('/students', [AdminController::class, 'students'])->name('students.index');

    Route::get('/questions', [AdminController::class, 'questions'])->name('questions.index');
    Route::get('/questions/create', [AdminController::class, 'questionCreate'])->name('questions.create');
    Route::post('/questions', [AdminController::class, 'questionStore'])->name('questions.store');
    Route::get('/questions/{question}/edit', [AdminController::class, 'questionEdit'])->name('questions.edit');
    Route::put('/questions/{question}', [AdminController::class, 'questionUpdate'])->name('questions.update');
    Route::delete('/questions/{question}', [AdminController::class, 'questionDestroy'])->name('questions.destroy');

    Route::get('/results/export', [AdminController::class, 'exportResults'])->name('results.export');
    Route::get('/results', [AdminController::class, 'results'])->name('results.index');
});
