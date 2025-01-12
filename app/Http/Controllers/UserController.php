<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('welcome');
    }
    // public function login() {
    //     return view('account.login');
    // }

    // public function showAllUsers($id)
    // {
    //     $user = User::find();
    //     $users = User::all();
    //     return view('administrator.index', ['users' => $users]);
    // }

    
}
