<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => ['required', 'email', 'max:120', Rule::unique('users', 'email')->ignore($user->id)],
            'class' => 'nullable|string|max:50',
            'current_password' => 'nullable|required_with:password|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if (! empty($data['password'])) {
            if (! Hash::check($data['current_password'] ?? '', $user->password)) {
                return back()
                    ->withErrors(['current_password' => 'Password lama tidak sesuai.'])
                    ->withInput();
            }

            $user->password = $data['password'];
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->class = $data['class'] ?? null;
        $user->save();

        session([
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_class' => $user->class ?? 'Belum diisi',
            'user_role' => $user->role,
        ]);

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}