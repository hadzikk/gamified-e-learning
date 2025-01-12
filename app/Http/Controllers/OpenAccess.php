<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpenAccess extends Controller
{
    public function index() {
        return view('login');
    }
}
