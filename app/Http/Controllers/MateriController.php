<?php
namespace App\Http\Controllers;

use App\Models\AssessmentResult;
use App\Models\Module;
use App\Models\ModuleProgress;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    private int $minimumQuizScore = 70;

    public function index()
    {
        $modules = Module::where('is_active', true)
            ->orderBy('order')
            ->get();

        $progress = ModuleProgress::where('user_id', Auth::id())
            ->pluck('latihan_completed', 'module_id');

        $quizScores = AssessmentResult::where('user_id', Auth::id())
            ->where('type', 'quiz')
            ->pluck('score', 'module_id');

        $minimumQuizScore = $this->minimumQuizScore;

        return view('materi.index', compact('modules', 'progress', 'quizScores', 'minimumQuizScore'));
    }

    public function show(Module $module)
    {
        if (! $module->is_active) {
            abort(404);
        }

        $previousModule = $this->previousModule($module);
        if ($previousModule && ! $this->moduleCompleted($previousModule)) {
            return redirect()
                ->route('materi.index')
                ->with('warning', 'Materi ini masih terkunci. Selesaikan latihan dan capai nilai quiz minimal ' . $this->minimumQuizScore . ' pada materi sebelumnya terlebih dahulu.');
        }

        $questions = Question::where('module_id', $module->id)
            ->where('type', 'latihan')
            ->orderBy('id', 'asc')
            ->get();

        $nextModule = Module::where('is_active', true)
            ->where('order', '>', $module->order)
            ->orderBy('order', 'asc')
            ->first();

        $latihanCompleted = ModuleProgress::where('user_id', Auth::id())
            ->where('module_id', $module->id)
            ->where('latihan_completed', true)
            ->exists();

        $quizScore = AssessmentResult::where('user_id', Auth::id())
            ->where('module_id', $module->id)
            ->where('type', 'quiz')
            ->value('score');

        $moduleCompleted = $this->moduleCompleted($module);
        $minimumQuizScore = $this->minimumQuizScore;

        return view('materi.show', compact(
            'module',
            'questions',
            'nextModule',
            'latihanCompleted',
            'quizScore',
            'moduleCompleted',
            'minimumQuizScore'
        ));
    }

    private function previousModule(Module $module): ?Module
    {
        return Module::where('is_active', true)
            ->where('order', '<', $module->order)
            ->orderByDesc('order')
            ->first();
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