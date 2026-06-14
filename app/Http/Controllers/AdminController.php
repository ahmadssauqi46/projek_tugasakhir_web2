<?php
namespace App\Http\Controllers;

use App\Models\AssessmentResult;
use App\Models\Module;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $quizResults = AssessmentResult::where('type', 'quiz');

        return view('admin.dashboard', [
            'totalSiswa' => User::where('role', 'siswa')->count(),
            'totalModul' => Module::count(),
            'totalSoal' => Question::count(),
            'quizSelesai' => (clone $quizResults)->count(),
            'evaluasiMasuk' => AssessmentResult::where('type', 'evaluasi')->count(),
            'rataQuiz' => round((clone $quizResults)->avg('score') ?? 0),
            'leaderboardAktif' => User::where('role', 'siswa')->exists(),
            'results' => AssessmentResult::with(['module', 'user'])->latest()->limit(8)->get(),
        ]);
    }

    public function index()
    {
        return view('admin.modules.index', ['modules' => Module::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.modules.form', ['module' => new Module]);
    }

    public function show(Module $module)
    {
        return redirect()->route('admin.modules.edit', $module);
    }

    public function store(Request $request)
    {
        Module::create($this->moduleData($request));
        return redirect()->route('admin.modules.index')->with('success', 'Modul berhasil ditambahkan.');
    }

    public function edit(Module $module)
    {
        return view('admin.modules.form', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $module->update($this->moduleData($request));
        return redirect()->route('admin.modules.index')->with('success', 'Modul berhasil diperbarui.');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return back()->with('success', 'Modul berhasil dihapus.');
    }

    private function moduleData(Request $request): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'video_url' => 'nullable|url|max:255',
            'order' => 'required|integer',
            'is_active' => 'nullable',
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }

    public function students()
    {
        return view('admin.placeholder', [
            'title' => 'Data Siswa',
            'students' => User::where('role', 'siswa')->latest()->get(),
        ]);
    }

    public function questions(Request $request)
    {
        $type = $request->query('type');
        $query = Question::with('module')->latest();

        if (in_array($type, ['latihan', 'quiz', 'evaluasi'])) {
            $query->where('type', $type);
        }

        return view('admin.questions.index', ['questions' => $query->get(), 'type' => $type]);
    }

    public function questionCreate(Request $request)
    {
        return view('admin.questions.form', [
            'question' => new Question(['type' => $request->query('type', 'latihan')]),
            'modules' => Module::orderBy('order')->get(),
        ]);
    }

    public function questionStore(Request $request)
    {
        Question::create($this->questionData($request));
        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil ditambahkan.');
    }

    public function questionEdit(Question $question)
    {
        return view('admin.questions.form', ['question' => $question, 'modules' => Module::orderBy('order')->get()]);
    }

    public function questionUpdate(Request $request, Question $question)
    {
        $question->update($this->questionData($request));
        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil diperbarui.');
    }

    public function questionDestroy(Question $question)
    {
        $question->delete();
        return back()->with('success', 'Soal berhasil dihapus.');
    }

    private function questionData(Request $request): array
    {
        return $request->validate([
            'module_id' => 'nullable|exists:modules,id',
            'type' => 'required|in:latihan,quiz,evaluasi',
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:A,B,C,D',
            'explanation' => 'nullable|string',
        ]);
    }

    public function results(Request $request)
    {
        $results = $this->resultsQuery($request)->latest()->get();
        $modules = Module::orderBy('order')->get();
        $summary = $results->groupBy(fn ($result) => $result->module?->title ?? 'Evaluasi Akhir')
            ->map(function ($items, $moduleName) {
                return [
                    'module' => $moduleName,
                    'count' => $items->count(),
                    'average' => round($items->avg('score') ?? 0),
                    'highest' => $items->max('score') ?? 0,
                ];
            })
            ->values();

        return view('admin.results.index', compact('results', 'modules', 'summary'));
    }

    public function exportResults(Request $request)
    {
        $results = $this->resultsQuery($request)->oldest()->get();
        $filename = 'riwayat-nilai-siswa-' . now()->format('Ymd-His') . '.xls';
        $content = view('admin.results.export', compact('results'))->render();

        return response($content, 200, [
            'Content-Type' => 'application/vnd.ms-excel; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }

    private function resultsQuery(Request $request)
    {
        $query = AssessmentResult::with(['module', 'user']);

        if ($request->filled('module_id')) {
            if ($request->module_id === 'evaluasi') {
                $query->whereNull('module_id');
            } else {
                $query->where('module_id', $request->module_id);
            }
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('student')) {
            $student = $request->student;
            $query->where(function ($q) use ($student) {
                $q->where('student_name', 'like', "%{$student}%")
                    ->orWhereHas('user', function ($userQuery) use ($student) {
                        $userQuery->where('name', 'like', "%{$student}%")->orWhere('email', 'like', "%{$student}%");
                    });
            });
        }

        return $query;
    }
}
