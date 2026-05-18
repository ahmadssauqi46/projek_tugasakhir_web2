<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        DB::table('visits')->insert([
            'ip_address' => $request->ip(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $totalSiswa      = DB::table('users')->count(); 
        $totalModul      = 3; 
        $totalSoal       = 15; 
        $totalKunjungan  = DB::table('visits')->count();

        return view('home.index', compact('totalSiswa', 'totalModul', 'totalSoal', 'totalKunjungan'));
    }
}