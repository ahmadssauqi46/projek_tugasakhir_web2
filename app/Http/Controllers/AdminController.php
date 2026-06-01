<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Module;
use App\Models\Question;
use App\Models\AssessmentResult;

class AdminController extends Controller
{
    public function dashboard(){ return view('admin.dashboard', ['modules'=>Module::count(),'questions'=>Question::count(),'results'=>AssessmentResult::latest()->limit(10)->get()]); }
    public function index(){ return view('admin.modules.index', ['modules'=>Module::orderBy('order')->get()]); }
    public function create(){ return view('admin.modules.form', ['module'=>new Module]); }
    public function show(Module $module){ return redirect()->route('admin.modules.edit', $module); }
    public function store(Request $r){ Module::create($this->moduleData($r)); return redirect()->route('admin.modules.index')->with('success','Modul berhasil ditambahkan.'); }
    public function edit(Module $module){ return view('admin.modules.form', compact('module')); }
    public function update(Request $r, Module $module){ $module->update($this->moduleData($r)); return redirect()->route('admin.modules.index')->with('success','Modul berhasil diperbarui.'); }
    public function destroy(Module $module){ $module->delete(); return back()->with('success','Modul berhasil dihapus.'); }
    private function moduleData(Request $r){ $d=$r->validate(['title'=>'required','slug'=>'nullable','summary'=>'nullable','content'=>'nullable','image'=>'nullable','order'=>'required|integer','is_active'=>'nullable']); $d['slug']=$d['slug'] ?: Str::slug($d['title']); $d['is_active']=$r->boolean('is_active'); return $d; }
    public function questions(){ return view('admin.questions.index', ['questions'=>Question::with('module')->latest()->get()]); }
    public function questionCreate(){ return view('admin.questions.form', ['question'=>new Question,'modules'=>Module::orderBy('order')->get()]); }
    public function questionStore(Request $r){ Question::create($this->questionData($r)); return redirect()->route('admin.questions.index')->with('success','Soal berhasil ditambahkan.'); }
    public function questionEdit(Question $question){ return view('admin.questions.form', ['question'=>$question,'modules'=>Module::orderBy('order')->get()]); }
    public function questionUpdate(Request $r, Question $question){ $question->update($this->questionData($r)); return redirect()->route('admin.questions.index')->with('success','Soal berhasil diperbarui.'); }
    public function questionDestroy(Question $question){ $question->delete(); return back()->with('success','Soal berhasil dihapus.'); }
    private function questionData(Request $r){ return $r->validate(['module_id'=>'nullable|exists:modules,id','type'=>'required|in:latihan,quiz,evaluasi','question'=>'required','option_a'=>'required','option_b'=>'required','option_c'=>'required','option_d'=>'required','correct_answer'=>'required|in:A,B,C,D','explanation'=>'nullable']); }
    public function results(){ return view('admin.results.index', ['results'=>AssessmentResult::with('module')->latest()->get()]); }
}
