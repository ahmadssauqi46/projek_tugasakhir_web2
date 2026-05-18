<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index');
    }

    public function hardwareQuiz()
    {
        try {
            $questions = DB::table('quizzes')->where('category', 'hardware')->get();
        } catch (\Exception $e) {
            $questions = collect();
        }

        return view('quiz.isi', [
            'category' => 'Hardware',
            'questions' => $questions
        ]);
    }

    public function softwareQuiz()
    {
        try {
            $questions = DB::table('quizzes')->where('category', 'software')->get();
        } catch (\Exception $e) {
            $questions = collect();
        }

        return view('quiz.isi', [
            'category' => 'Software',
            'questions' => $questions
        ]);
    }

    public function jaringanQuiz()
    {
        try {
            $questions = DB::table('quizzes')->where('category', 'jaringan')->get();
        } catch (\Exception $e) {
            $questions = collect();
        }

        return view('quiz.isi', [
            'category' => 'Jaringan',
            'questions' => $questions
        ]);
    }

    public function gameArena()
    {
        return view('quiz.game_arena');
    }

    public function submitQuiz(Request $request)
    {
        $category = $request->input('category');
        $userAnswers = $request->input('answers', []);

        $correctCount = 0;
        $totalQuestions = count($userAnswers) > 0 ? count($userAnswers) : 1;

        foreach ($userAnswers as $questionId => $answer) {
            if ($answer === 'A' || $answer === 'C') {
                $correctCount++;
            }
        }

        $score = round(($correctCount / $totalQuestions) * 100);

        return response("
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Hasil Kuis Teori - EduGame</title>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap' rel='stylesheet'>
                <style>
                    body {
                        font-family: 'Poppins', sans-serif;
                        background: #f4f6f9;
                        min-height: 100vh;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    .result-card {
                        background: white;
                        border-radius: 24px;
                        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
                        padding: 40px;
                        max-width: 550px;
                        width: 100%;
                        text-align: center;
                    }
                    .score-badge {
                        font-size: 72px;
                        font-weight: 700;
                        color: #4f46e5;
                        margin: 20px 0;
                    }
                    .btn-back {
                        background: #4f46e5;
                        color: white;
                        font-weight: 600;
                        padding: 12px 30px;
                        border-radius: 12px;
                        text-decoration: none;
                        transition: 0.2s;
                        display: inline-block;
                    }
                    .btn-back:hover {
                        background: #3730a3;
                        color: white;
                    }
                </style>
            </head>
            <body>
                <div class='container d-flex justify-content-center'>
                    <div class='card result-card border-0'>
                        <div class='fs-1'>🎉</div>
                        <h2 class='fw-bold text-dark mt-2'>Kuis {$category} Selesai!</h2>
                        <p class='text-muted'>Kerja bagus! Kamu telah menyelesaikan evaluasi materi teori dengan baik.</p>
                        
                        <div class='score-badge'>{$score}</div>
                        
                        <div class='bg-light rounded-3 py-3 px-4 mb-4 d-flex justify-content-around'>
                            <div>
                                <span class='text-muted small d-block'>Benar</span>
                                <strong class='text-success fs-5'>{$correctCount}</strong>
                            </div>
                            <div style='border-left: 2px solid #e2e8f0;'></div>
                            <div>
                                <span class='text-muted small d-block'>Total Soal</span>
                                <strong class='text-dark fs-5'>{$totalQuestions}</strong>
                            </div>
                        </div>

                        <a href='" . url('/quiz') . "' class='btn btn-back shadow-sm'>Kembali ke Menu Kuis</a>
                    </div>
                </div>
            </body>
            </html>
        ");
    }
        public function hardwareGame()
    {
        return view('quiz.game_arena', [
            'category' => 'Hardware'
        ]);
    }

    public function softwareGame()
    {
        return view('quiz.game_arena', [
            'category' => 'Software'
        ]);
    }

    public function jaringanGame()
    {
        return view('quiz.game_arena', [
            'category' => 'Jaringan'
        ]);
    }
}