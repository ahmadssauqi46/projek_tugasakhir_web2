<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Question;
use App\Models\AssessmentResult;
use App\Models\ModuleProgress;

class AssessmentController extends Controller
{
    public function submitLatihan(Request $request, Module $module){
        $questions = $module->questions()->where('type','latihan')->get();
        [$score,$correct,$answers] = $this->score($questions, $request->input('answers', []));
        if ($correct >= max(1, ceil($questions->count()*0.6))) {
            ModuleProgress::updateOrCreate(['session_id'=>session()->getId(),'module_id'=>$module->id], ['latihan_completed'=>true,'completed_at'=>now()]);
        }
        return back()->with('latihan_result', compact('score','correct','answers'))->with('total',$questions->count());
    }
    public function quizIndex(){
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        $results = AssessmentResult::where('session_id',session()->getId())->where('type','quiz')->pluck('score','module_id');
        return view('quiz.index', compact('modules','results'));
    }
    public function quizShow(Module $module){
        $this->ensureUnlocked($module);
        $done = AssessmentResult::where('session_id',session()->getId())->where('module_id',$module->id)->where('type','quiz')->first();
        if ($done) return redirect()->route('quiz.index')->with('warning','Quiz modul ini sudah pernah dikerjakan. Nilai tersimpan: '.$done->score);
        $questions = $module->questions()->where('type','quiz')->get();
        return view('assessment.form', ['mode'=>'quiz','module'=>$module,'questions'=>$questions,'showScore'=>true]);
    }
    public function quizSubmit(Request $request, Module $module){
        $this->ensureUnlocked($module);
        if (AssessmentResult::where('session_id',session()->getId())->where('module_id',$module->id)->where('type','quiz')->exists()) return redirect()->route('quiz.index')->with('warning','Quiz hanya dapat dikerjakan satu kali.');
        $questions = $module->questions()->where('type','quiz')->get();
        [$score,$correct,$answers] = $this->score($questions, $request->input('answers', []));
        AssessmentResult::create(['session_id'=>session()->getId(),'student_name'=>$request->student_name,'module_id'=>$module->id,'type'=>'quiz','score'=>$score,'correct_count'=>$correct,'total_questions'=>$questions->count(),'answers'=>$answers]);
        return view('assessment.result', compact('score','correct','questions','module'));
    }
    public function evaluasiShow(){
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        foreach ($modules as $m) $this->ensureUnlocked($m);
        if (AssessmentResult::where('session_id',session()->getId())->whereNull('module_id')->where('type','evaluasi')->exists()) return back()->with('warning','Evaluasi akhir sudah pernah dikirim. Nilai tidak ditampilkan dan tersimpan di database.');
        $questions = Question::where('type','evaluasi')->with('module')->get();
        return view('assessment.form', ['mode'=>'evaluasi','module'=>null,'questions'=>$questions,'showScore'=>false]);
    }
    public function evaluasiSubmit(Request $request){
        if (AssessmentResult::where('session_id',session()->getId())->whereNull('module_id')->where('type','evaluasi')->exists()) return redirect()->route('home')->with('warning','Evaluasi hanya dapat dikirim satu kali.');
        $questions = Question::where('type','evaluasi')->get();
        [$score,$correct,$answers] = $this->score($questions, $request->input('answers', []));
        AssessmentResult::create(['session_id'=>session()->getId(),'student_name'=>$request->student_name,'module_id'=>null,'type'=>'evaluasi','score'=>$score,'correct_count'=>$correct,'total_questions'=>$questions->count(),'answers'=>$answers]);
        return view('assessment.evaluasi_done');
    }
    private function score($questions, $userAnswers){
        $correct=0; $answers=[];
        foreach($questions as $q){ $ans=$userAnswers[$q->id] ?? null; if($ans===$q->correct_answer) $correct++; $answers[$q->id]=['answer'=>$ans,'correct'=>$q->correct_answer]; }
        $total=max(1,$questions->count()); return [round($correct/$total*100), $correct, $answers];
    }
    private function ensureUnlocked(Module $module){
        $prev = Module::where('order','<',$module->order)->orderByDesc('order')->first();
        if ($prev && !ModuleProgress::where('session_id',session()->getId())->where('module_id',$prev->id)->where('latihan_completed',true)->exists()) abort(403,'Modul terkunci. Selesaikan latihan modul sebelumnya.');
    }
}
