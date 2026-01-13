<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    // form input email
    public function form()
    {
        return view('auth.passwords.email');
    }

    // cek email di DB
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak terdaftar'
            ]);
        }

        return redirect()->route('password.reset', $user->email);
    }

    // form reset password
    public function resetForm($email)
    {
        return view('auth.passwords.reset', compact('email'));
    }

    // update password
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        return redirect('/login')->with('status', 'Password berhasil direset');
    }
}
