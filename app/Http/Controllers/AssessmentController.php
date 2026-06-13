<?php

namespace App\Http\Controllers;

use App\Models\AssessmentResult;
use App\Models\Module;
use App\Models\ModuleProgress;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    private int $minimumQuizScore = 70;

    public function submitLatihan(Request $request, Module $module)
    {
        $this->ensureModuleAccessible($module);

        $questions = $module->questions()->where('type', 'latihan')->get();
        [$score, $correct, $answers] = $this->score($questions, $request->input('answers', []));
        $minimumCorrect = max(1, ceil($questions->count() * 0.6));

        if ($correct >= $minimumCorrect) {
            ModuleProgress::updateOrCreate(
                ['user_id' => Auth::id(), 'module_id' => $module->id],
                [
                    'session_id' => session()->getId(),
                    'latihan_completed' => true,
                    'completed_at' => now(),
                ]
            );
        }

        return back()
            ->with('latihan_result', compact('score', 'correct', 'answers'))
            ->with('total', $questions->count())
            ->with('minimum_correct', $minimumCorrect);
    }

    public function quizIndex()
    {
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        $results = AssessmentResult::where('user_id', Auth::id())->where('type', 'quiz')->pluck('score', 'module_id');
        $progress = ModuleProgress::where('user_id', Auth::id())->pluck('latihan_completed', 'module_id');
        $minimumQuizScore = $this->minimumQuizScore;

        return view('quiz.index', compact('modules', 'results', 'progress', 'minimumQuizScore'));
    }

    public function quizShow(Module $module)
    {
        $this->ensureModuleAccessible($module);
        $this->ensureLatihanCompleted($module);

        $done = AssessmentResult::where('user_id', Auth::id())
            ->where('module_id', $module->id)
            ->where('type', 'quiz')
            ->first();

        if ($done && $done->score >= $this->minimumQuizScore) {
            return redirect()
                ->route('quiz.index')
                ->with('warning', 'Quiz modul ini sudah lulus. Nilai tersimpan: ' . $done->score);
        }

        $questions = $module->questions()->where('type', 'quiz')->get();

        return view('assessment.form', [
            'mode' => 'quiz',
            'module' => $module,
            'questions' => $questions,
            'showScore' => true,
        ]);
    }

    public function quizSubmit(Request $request, Module $module)
    {
        $this->ensureModuleAccessible($module);
        $this->ensureLatihanCompleted($module);

        $existingResult = AssessmentResult::where('user_id', Auth::id())
            ->where('module_id', $module->id)
            ->where('type', 'quiz')
            ->first();

        if ($existingResult && $existingResult->score >= $this->minimumQuizScore) {
            return redirect()
                ->route('quiz.index')
                ->with('warning', 'Quiz modul ini sudah lulus dan tidak perlu diulang.');
        }

        $questions = $module->questions()->where('type', 'quiz')->get();
        [$score, $correct, $answers] = $this->score($questions, $request->input('answers', []));
        $user = Auth::user();

        AssessmentResult::updateOrCreate(
            ['user_id' => $user->id, 'module_id' => $module->id, 'type' => 'quiz'],
            [
                'session_id' => session()->getId(),
                'student_name' => $user->name,
                'score' => $score,
                'correct_count' => $correct,
                'total_questions' => $questions->count(),
                'answers' => $answers,
            ]
        );

        return view('assessment.result', compact('score', 'correct', 'questions', 'module'));
    }

    public function evaluasiShow()
    {
        $modules = Module::where('is_active', true)->orderBy('order')->get();

        foreach ($modules as $module) {
            if (! $this->moduleCompleted($module)) {
                return redirect()
                    ->route('materi.index')
                    ->with('warning', 'Evaluasi akhir baru terbuka setelah semua materi, latihan, dan quiz selesai dengan nilai minimal ' . $this->minimumQuizScore . '.');
            }
        }

        $alreadyDone = AssessmentResult::where('user_id', Auth::id())
            ->whereNull('module_id')
            ->where('type', 'evaluasi')
            ->exists();

        if ($alreadyDone) {
            return back()->with('warning', 'Evaluasi akhir sudah pernah dikirim. Nilai tersimpan di database.');
        }

        $questions = Question::where('type', 'evaluasi')->with('module')->get();

        return view('assessment.form', [
            'mode' => 'evaluasi',
            'module' => null,
            'questions' => $questions,
            'showScore' => false,
        ]);
    }

    public function evaluasiSubmit(Request $request)
    {
        $alreadyDone = AssessmentResult::where('user_id', Auth::id())
            ->whereNull('module_id')
            ->where('type', 'evaluasi')
            ->exists();

        if ($alreadyDone) {
            return redirect()->route('home')->with('warning', 'Evaluasi hanya dapat dikirim satu kali.');
        }

        $questions = Question::where('type', 'evaluasi')->get();
        [$score, $correct, $answers] = $this->score($questions, $request->input('answers', []));
        $user = Auth::user();

        AssessmentResult::create([
            'user_id' => $user->id,
            'session_id' => session()->getId(),
            'student_name' => $user->name,
            'module_id' => null,
            'type' => 'evaluasi',
            'score' => $score,
            'correct_count' => $correct,
            'total_questions' => $questions->count(),
            'answers' => $answers,
        ]);

        return view('assessment.evaluasi_done');
    }

    private function score($questions, $userAnswers)
    {
        $correct = 0;
        $answers = [];

        foreach ($questions as $question) {
            $answer = $userAnswers[$question->id] ?? null;
            if ($answer === $question->correct_answer) {
                $correct++;
            }

            $answers[$question->id] = ['answer' => $answer, 'correct' => $question->correct_answer];
        }

        $total = max(1, $questions->count());
        return [round($correct / $total * 100), $correct, $answers];
    }

    private function ensureModuleAccessible(Module $module): void
    {
        $previousModule = Module::where('is_active', true)
            ->where('order', '<', $module->order)
            ->orderByDesc('order')
            ->first();

        if ($previousModule && ! $this->moduleCompleted($previousModule)) {
            abort(403, 'Modul terkunci. Selesaikan latihan dan quiz materi sebelumnya terlebih dahulu.');
        }
    }

    private function ensureLatihanCompleted(Module $module): void
    {
        $completed = ModuleProgress::where('user_id', Auth::id())
            ->where('module_id', $module->id)
            ->where('latihan_completed', true)
            ->exists();

        if (! $completed) {
            abort(403, 'Selesaikan latihan materi ini terlebih dahulu sebelum mengerjakan quiz.');
        }
    }

    private function moduleCompleted(Module $module): bool
    {
        $latihanCompleted = ModuleProgress::where('user_id', Auth::id())
            ->where('module_id', $module->id)
            ->where('latihan_completed', true)
            ->exists();

        $quizPassed = AssessmentResult::where('user_id', Auth::id())
            ->where('module_id', $module->id)
            ->where('type', 'quiz')
            ->where('score', '>=', $this->minimumQuizScore)
            ->exists();

        return $latihanCompleted && $quizPassed;
    }
}