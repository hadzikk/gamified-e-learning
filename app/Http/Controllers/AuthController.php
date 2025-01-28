<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() 
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek role pengguna
            $user = Auth::user();
            switch ($user->role) {
                case 'administrator':
                    return redirect()->route('DashAdmin');
                case 'lecturer':
                    return redirect()->intended('/lecturer/dashboard');
                case 'student':
                    return redirect()->intended('/student/post');
                default:
                    Auth::logout();
                    return back()->withErrors([
                        'isInvalid' => 'Role tidak dikenali!'
                    ]);
            }
        }

        return back()->withErrors([
            'isInvalid' => 'Login gagal! Periksa email dan kata sandi Anda.'
        ]);
    }

    public function logout() 
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
