<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ScoreHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() 
    {
        return view('welcome');
    }

    public function getScoreHistory()
    {
        $user = Auth::user();
        $history = ScoreHistory::where('user_id', $user->id)
            ->orderBy('changed_at', 'desc')
            ->get();

        return response()->json($history);
    }

}
