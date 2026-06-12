<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){ return view('login.index'); }
    public function store(Request $request){
        $data = $request->validate(['name'=>'nullable|string|max:100','email'=>'required|string|max:120','password'=>'required|string','role'=>'required|in:siswa,guru']);
        session(['user_name'=>$data['name'] ?: explode('@',$data['email'])[0], 'user_email'=>$data['email'], 'user_role'=>$data['role'], 'user_class'=>$request->input('class','X IPA 1')]);
        return $data['role'] === 'guru' ? redirect()->route('admin.dashboard') : redirect()->route('dashboard.siswa');
    }
    public function logout(Request $request){ $request->session()->flush(); return redirect()->route('home'); }
}
