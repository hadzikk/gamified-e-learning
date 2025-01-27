<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class AdministratorController extends Controller
{
    public function index() {
        return view('administrator.home');
    }

    public function studentIndex() {
        return view('administrator.student');
    }

    public function lecturerIndex() {
        return view('administrator.lecturer');
    }
    
    public function store(Request $request) {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'degree' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validasi untuk gambar (opsional)
            'role' => 'required|in:administrator,lecturer,student', // Validasi role agar hanya menerima nilai yang sesuai
            'score' => 'nullable|integer|min:0', // Validasi score (opsional)
        ]);

        // Proses penyimpanan data ke database
        $user = new User();
        $user->username = $validatedData['username'];
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->degree = $validatedData['degree'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']); // Hashing password
        $user->role = $validatedData['role'];
        $user->score = $validatedData['score'] ?? 0;

        // Jika ada profile_picture, simpan filenya
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filePath = $file->store('profile_pictures', 'public'); // Simpan file ke folder public/profile_pictures
            $user->profile_picture = $filePath;
        }

        $user->remember_token = Str::random(10); // Token remember me
        $user->save(); // Simpan data ke database

        // Redirect ke halaman tertentu dengan pesan sukses
        return redirect()->route('administrator.home')->with('success', 'User registered successfully!');
    }
}
