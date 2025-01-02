<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan form untuk membuat akun
    public function create()
    {
        return view('admin.Datacreate');
    }

    // Menyimpan data akun ke database
    public function store(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('AdminDashboard')->with('success', 'User created successfully!');
    }

}
