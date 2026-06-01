<?php
namespace App\Http\Controllers;
use App\Models\Module;
use App\Models\ModuleProgress;

class MateriController extends Controller
{
    public function index(){
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        $session = session()->getId();
        $progress = ModuleProgress::where('session_id',$session)->pluck('latihan_completed','module_id');
        return view('materi.index', compact('modules','progress'));
    }
    public function show(Module $module){
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        $session = session()->getId();
        $prev = Module::where('order','<',$module->order)->orderByDesc('order')->first();
        if ($prev && !ModuleProgress::where('session_id',$session)->where('module_id',$prev->id)->where('latihan_completed',true)->exists()) {
            return redirect()->route('materi.index')->with('warning','Selesaikan latihan modul sebelumnya terlebih dahulu agar bisa lanjut.');
        }
        $questions = $module->questions()->where('type','latihan')->get();
        return view('materi.show', compact('module','modules','questions'));
    }
}
