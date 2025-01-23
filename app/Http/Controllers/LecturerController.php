<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function create() 
    {
        return view('lecturer.create');
    }
}
