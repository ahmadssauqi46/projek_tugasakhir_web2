<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Module;
use App\Models\Question;
use App\Models\AssessmentResult;
use App\Models\ModuleProgress;

class HomeController extends Controller
{
    public function index(Request $request){
        try { DB::table('visits')->insert(['ip_address'=>$request->ip(),'created_at'=>now(),'updated_at'=>now()]); } catch (\Exception $e) {}
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        return view('home.index', compact('modules'));
    }
    public function dashboardSiswa(){
        $session = session()->getId();
        $modules = Module::where('is_active', true)->orderBy('order')->get();
        $done = ModuleProgress::where('session_id',$session)->where('latihan_completed',true)->count();
        $total = max(1, $modules->count());
        $quiz = AssessmentResult::where('session_id',$session)->where('type','quiz')->latest()->first();
        $eval = AssessmentResult::where('session_id',$session)->where('type','evaluasi')->exists();
        $leaderboard = $this->leaderboardData();
        $rank = collect($leaderboard)->search(fn($r) => ($r['session_id'] ?? '') === $session);
        return view('dashboard.siswa', [
            'name'=>session('user_name','Ahmad Sauqi'), 'class'=>session('user_class','X IPA 1'),
            'progress'=>round($done/$total*100), 'done'=>$done, 'locked'=>max(0,$total-$done-1),
            'quizScore'=>$quiz?->score ?? 86, 'evaluasi'=>$eval ? 'Sudah dikirim' : 'Belum',
            'points'=>1200 + ($quiz?->score ?? 40) + ($done*100), 'rank'=>$rank === false ? 3 : $rank+1,
            'next'=>$modules->firstWhere('id', optional($modules->get($done))->id) ?? $modules->last(),
        ]);
    }
    public function leaderboard(){ return view('leaderboard.index', ['rows'=>$this->leaderboardData()]); }
    private function leaderboardData(){
        $results = AssessmentResult::where('type','quiz')->orderByDesc('score')->take(10)->get();
        $rows = [];
        foreach ($results as $r) $rows[] = ['session_id'=>$r->session_id,'name'=>$r->student_name ?: 'Siswa','class'=>'X IPA 1','quiz'=>$r->score,'progress'=>100,'points'=>1000+$r->score*5,'badge'=>$r->score>=90?'Master Hardware':'Software Expert'];
        if (count($rows) < 4) {
            $rows = array_merge($rows, [
                ['session_id'=>'demo1','name'=>'Bima Pratama','class'=>'XI IPA 1','quiz'=>94,'progress'=>100,'points'=>1580,'badge'=>'Master Hardware'],
                ['session_id'=>'demo2','name'=>'Citra Lestari','class'=>'X-2','quiz'=>90,'progress'=>86,'points'=>1420,'badge'=>'Software Expert'],
                ['session_id'=>'demo3','name'=>'Aulia Rahma','class'=>'XI IPA 1','quiz'=>86,'progress'=>68,'points'=>1240,'badge'=>'Rising Learner'],
                ['session_id'=>'demo4','name'=>'Dimas Arya','class'=>'X-1','quiz'=>82,'progress'=>64,'points'=>1100,'badge'=>'Consistent Learner'],
            ]);
        }
        return collect($rows)->sortByDesc('points')->values()->all();
    }
}
