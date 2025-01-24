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
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'degree' => 'nullable|string|max:255',
            'score' => 'nullable|integer|min:0',
        ]);

        User::create([
            'username' => $validatedData['username'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'degree' => $validatedData['degree'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),  // Menggunakan bcrypt untuk hashing password
            'role' => 'student',
            'score' => $validatedData['score'] ?? 0,
            'remember_token' => Str::random(10),
            'slug' => Str::slug($validatedData['first_name'] . ' ' . $validatedData['last_name']),
        ]);

        return redirect()->route('admistrator.home')->with('success', 'Student registered successfully!');
    }
}
