<?php
namespace App\Http\Controllers;

use App\Models\AssessmentResult;
use App\Models\Module;
use App\Models\ModuleProgress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {
            DB::table('visits')->insert(['ip_address' => $request->ip(), 'created_at' => now(), 'updated_at' => now()]);
        } catch (\Exception $e) {
            // Statistik kunjungan tidak boleh menghentikan halaman utama.
        }

        $modules = Module::where('is_active', true)->orderBy('order')->get();
        return view('home.index', compact('modules'));
    }

    public function dashboardSiswa()
    {
        $user = Auth::user();
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        $total = max(1, $modules->count());
        $done = ModuleProgress::where('user_id', $user->id)->where('latihan_completed', true)->count();
        $quizAverage = AssessmentResult::where('user_id', $user->id)->where('type', 'quiz')->avg('score');
        $eval = AssessmentResult::where('user_id', $user->id)->where('type', 'evaluasi')->exists();
        $leaderboard = collect($this->leaderboardData());
        $rank = $leaderboard->search(fn ($row) => (int) ($row['user_id'] ?? 0) === (int) $user->id);

        $moduleStatuses = $modules->map(function (Module $module) use ($user) {
            $latihanDone = ModuleProgress::where('user_id', $user->id)->where('module_id', $module->id)->where('latihan_completed', true)->exists();
            $quizScore = AssessmentResult::where('user_id', $user->id)->where('module_id', $module->id)->where('type', 'quiz')->value('score');
            $status = 'Belum mulai';
            if ($latihanDone || $quizScore !== null) {
                $status = 'Sedang belajar';
            }
            if ($latihanDone && $quizScore !== null && $quizScore >= 70) {
                $status = 'Lulus';
            }
            return ['module' => $module, 'latihanDone' => $latihanDone, 'quizScore' => $quizScore, 'status' => $status];
        });

        $progress = round($done / $total * 100);
        $points = $this->studentPoints($user);
        $next = $modules->first(function ($module) use ($user) {
            return ! ModuleProgress::where('user_id', $user->id)->where('module_id', $module->id)->where('latihan_completed', true)->exists();
        }) ?? $modules->last();

        return view('dashboard.siswa', [
            'name' => $user->name,
            'class' => $user->class ?? 'Belum diisi',
            'progress' => $progress,
            'done' => $done,
            'totalModules' => $modules->count(),
            'locked' => max(0, $modules->count() - $done),
            'quizScore' => $quizAverage ? round($quizAverage) : 0,
            'evaluasi' => $eval ? 'Sudah dikirim' : 'Belum',
            'points' => $points,
            'rank' => $rank === false ? '-' : $rank + 1,
            'next' => $next,
            'moduleStatuses' => $moduleStatuses,
        ]);
    }

    public function leaderboard()
    {
        return view('leaderboard.index', ['rows' => $this->leaderboardData()]);
    }

    private function leaderboardData(): array
    {
        $totalModules = max(1, Module::where('is_active', true)->count());
        return User::where('role', 'siswa')->get()->map(function (User $user) use ($totalModules) {
            $quizAverage = AssessmentResult::where('user_id', $user->id)->where('type', 'quiz')->avg('score');
            $done = ModuleProgress::where('user_id', $user->id)->where('latihan_completed', true)->count();
            $progress = round($done / $totalModules * 100);
            $quiz = $quizAverage ? round($quizAverage) : 0;
            $points = ($done * 100) + ($quiz * 5);
            return ['user_id' => $user->id, 'name' => $user->name, 'class' => $user->class ?? '-', 'quiz' => $quiz, 'progress' => $progress, 'points' => $points, 'badge' => $this->badgeFor($quiz, $progress)];
        })->sortByDesc('points')->values()->all();
    }

    private function studentPoints(User $user): int
    {
        $quizAverage = AssessmentResult::where('user_id', $user->id)->where('type', 'quiz')->avg('score');
        $done = ModuleProgress::where('user_id', $user->id)->where('latihan_completed', true)->count();
        return ($done * 100) + (($quizAverage ? round($quizAverage) : 0) * 5);
    }

    private function badgeFor(int $quiz, int $progress): string
    {
        if ($progress >= 100 && $quiz >= 90) return 'Master Komputer';
        if ($progress >= 70) return 'Konsisten Belajar';
        if ($quiz >= 80) return 'Nilai Kuat';
        return 'Mulai Belajar';
    }
}