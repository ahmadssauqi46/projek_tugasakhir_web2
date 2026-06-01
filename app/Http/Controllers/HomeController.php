<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Module;
use App\Models\Question;
use App\Models\AssessmentResult;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try { DB::table('visits')->insert(['ip_address'=>$request->ip(),'created_at'=>now(),'updated_at'=>now()]); } catch (\Exception $e) {}
        return view('home.index', [
            'totalModul' => Module::count(),
            'totalSoal' => Question::count(),
            'totalKunjungan' => DB::table('visits')->count(),
            'totalHasil' => AssessmentResult::count(),
            'modules' => Module::where('is_active', true)->orderBy('order')->get(),
        ]);
    }
}
