<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin.Dashadmin');
    }

    public function viewData()
    {
        return view('admin.Dataview');
    }

    public function showUsers()
    {
    // Ambil data user dengan role 'Mahasiswa' atau 'Dosen'
        $users = User::whereIn('role', ['Mahasiswa', 'Dosen'])->get();

    // Kirim data ke view
        return view('admin.Dataview', compact('users'));
    }
}
