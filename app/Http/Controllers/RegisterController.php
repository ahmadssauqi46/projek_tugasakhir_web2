<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){ return view('register.index'); }
    public function store(Request $request){
        $data = $request->validate(['name'=>'required|string|max:100','email'=>'required|string|max:120','password'=>'required|string|min:3','role'=>'required|in:siswa,guru','class'=>'nullable|string|max:50']);
        session(['user_name'=>$data['name'], 'user_email'=>$data['email'], 'user_role'=>$data['role'], 'user_class'=>$data['class'] ?? 'X IPA 1']);
        return $data['role'] === 'guru' ? redirect()->route('admin.dashboard') : redirect()->route('dashboard.siswa');
    }
}
