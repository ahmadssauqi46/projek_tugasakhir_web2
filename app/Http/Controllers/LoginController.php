<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|max:120',
            'password' => 'required|string',
        ]);

        if (! Auth::attempt($credentials)) {
            return back()
                ->withErrors(['email' => 'Email atau password tidak sesuai.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();
        $user = Auth::user();

        session([
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'user_class' => $user->class ?? 'X IPA 1',
        ]);

        return $user->role === 'guru'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('dashboard.siswa');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
