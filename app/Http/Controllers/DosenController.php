<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
        return view ('dosen.dosdash');
    }

    public function quiz(){
        return view ('dosen.quiz');
    }

    public function materi(){
        return view ('dosen.materi');
    }

    public function review(){
        return view ('dosen.preview');
    }
}
