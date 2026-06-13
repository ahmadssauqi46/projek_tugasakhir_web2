<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:120|unique:users,email',
            'password' => 'required|string|min:6',
            'class' => 'nullable|string|max:50',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => 'siswa',
            'class' => $data['class'] ?? null,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        session([
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'user_class' => $user->class ?? 'Belum diisi',
        ]);

        return redirect()->route('dashboard.siswa');
    }
}