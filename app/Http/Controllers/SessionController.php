<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view("login");
    }

    // Proses login
    public function login(Request $request)
    {
        // Ambil email dan password dari request
        $data = $request->only('email', 'password');

        // Coba autentikasi dengan guard yang sesuai (misalnya 'admin')
        if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'], 'role' => 'admin'])) {
            // Regenerasi session untuk mencegah session fixation
            $request->session()->regenerate();
            return redirect()->route('AdminDashboard');
        }elseif (Auth::guard('mahasiswa')->attempt(['email'=>$data['email'],'password'=>$data['password'], 'role' => 'mahasiswa'])) {
            // Regenerasi session untuk mencegah session fixation
            $request->session()->regenerate();
            return redirect()->route('#');
        }elseif (Auth::guard('dosen')->attempt(['email'=>$data['email'],'password'=>$data['password'], 'role' => 'dosen'])) {
            // Regenerasi session untuk mencegah session fixation
            $request->session()->regenerate();
            return redirect()->route('dosdash');
        }
        // Jika autentikasi gagal
        return redirect()->back()->with('failed', 'Email or password is incorrect');
        }

        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect()->route('login');
        }
}
