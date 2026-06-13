<?php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Question;
use App\Models\ModuleProgress;

class MateriController extends Controller
{
    public function index()
    {
        $modules = Module::where('is_active', true)
            ->orderBy('order')
            ->get();

        $session = session()->getId();

        $progress = ModuleProgress::where('session_id', $session)
            ->pluck('latihan_completed', 'module_id');

        return view('materi.index', compact('modules', 'progress'));
    }

    public function show($slug)
    {
        $module = Module::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $questions = Question::where('module_id', $module->id)
            ->where('type', 'latihan')
            ->orderBy('id', 'asc')
            ->get();

        $nextModule = Module::where('is_active', true)
            ->where('order', '>', $module->order)
            ->orderBy('order', 'asc')
            ->first();

        return view('materi.show', compact('module', 'questions', 'nextModule'));
    }
}