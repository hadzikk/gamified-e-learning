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

    public function regisIndex() {
        return view('administrator.regis');
    }

    public function dataIndex() {
        $users = User::all();
        return view('administrator.data', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Ambil data user berdasarkan ID
        return view('administrator.edit', compact('user')); // Kirim data ke view
    }

    public function store(Request $request) {
        // Validasi data yang diterima dari form
         // Proses penyimpanan data ke database tanpa validasi
        $user = new User();
        $user->username = $request->input('username');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->degree = $request->input('degree');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Hashing password
        $user->role = $request->input('role');
 
         // Simpan data ke database
        $user->remember_token = Str::random(10); // Token remember me
        $user->save();
 
         // Redirect ke halaman admin home dengan pesan sukses
        return redirect()->route('Regisaccount')->with('success', 'User registered successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:8', // Password opsional
            'role' => 'required|in:student,lecturer',
            'degree' => 'nullable|string|max:255', // Degree hanya untuk dosen
        ]);

        $user = User::findOrFail($id);

        // Update data user
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Enkripsi password jika diisi
        }

        $user->role = $request->role;
        $user->degree = $request->role === 'lecturer' ? $request->degree : null; // Hanya simpan degree jika role adalah dosen
        $user->save();

        return redirect()->route('Dataview')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
    $user = User::findOrFail($id); // Cari user berdasarkan ID
    $user->delete(); // Hapus user

    return redirect()->route('Dataview')->with('success', 'Pengguna berhasil dihapus!');
    }
}
