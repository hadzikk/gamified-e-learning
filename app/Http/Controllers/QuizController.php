<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quiz;
use App\Models\User;
use App\Models\QuizUser;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function enroll(Request $request, $quizId)
{
    $quiz = Quiz::findOrFail($quizId);
    $user = Auth::user();

    // Cek apakah pengguna sudah terdaftar
    if ($user->quizzes->contains($quiz)) {
        return back()->with('error', 'Anda sudah terdaftar untuk kuis ini.');
    }

    // Simpan ke database
    $quizUser = new QuizUser();
    $quizUser->user_id = $user->id;
    $quizUser->quiz_id = $quiz->id;
    $quizUser->enrolled_at = now();
    $quizUser->duration = $quiz->duration * 60;
    $quizUser->status = "ongoing";
    $quizUser->save();

    // Ambil slug berdasarkan post terkait quiz
    $post = Post::find($quiz->post_id); // Pastikan ada post terkait
    if (!$post) {
        return back()->with('error', 'Post terkait kuis tidak ditemukan.');
    }

    return redirect()->route('review', ['post' => $post->slug])
        ->with('success', 'Anda berhasil mendaftar untuk kuis ini!');
}


public function submitQuiz(Request $request, $quizId)
{
    $quiz = Quiz::with('questions.options')->findOrFail($quizId);
    $user = Auth::user();
    $questions = $quiz->questions;

    // Pastikan kuis memiliki post terkait
    if (!$quiz->post_id) {
        return redirect()->back()->with('error', 'Kuis tidak memiliki post terkait.');
    }
    $post = Post::findOrFail($quiz->post_id);
    $postSlug = $post->slug; // Ambil slug dari post

    // Pastikan kuis memiliki pertanyaan
    $totalQuestions = $questions->count();
    if ($totalQuestions === 0) {
        return redirect()->back()->with('error', 'Kuis tidak memiliki pertanyaan.');
    }

    $scorePerQuestion = 100 / $totalQuestions;
    $correctAnswers = 0;

    // Periksa jawaban
    foreach ($questions as $question) {
        $selectedOptionId = $request->input('question_' . $question->id);
        $correctOption = $question->options->where('is_correct', true)->first();

        if ($correctOption && $selectedOptionId == $correctOption->id) {
            $correctAnswers++;
        }
    }

    // Hitung skor awal
    $rawScore = $correctAnswers * $scorePerQuestion;

    // Ambil informasi dari quiz_user
    $quizUser = QuizUser::where('quiz_id', $quizId)
        ->where('user_id', $user->id)
        ->firstOrFail();

    $timeRemaining = $request->time_remaining; // Ambil sisa waktu dari quiz_user

    // Terapkan penalty jika time_remaining = 0
    $penalty = ($timeRemaining <= 0) ? 0.20 : 0; // Penalti 20% jika waktu habis

    // Hitung skor akhir setelah penalti
    $score = $rawScore * (1 - $penalty);

    // Simpan hasil ke database
    $quizUser->completed_at = Carbon::now();
    $quizUser->time_remaining = $request->time_remaining;
    $quizUser->score = round($score);
    $quizUser->status = 'completed';
    $quizUser->save();

    // Update skor user di tabel users
    DB::table('users')->where('id', $user->id)->increment('score', round($score));

    // Redirect ke halaman review dengan slug post terkait
    return redirect()->route('review', ['post' => $postSlug])
        ->with('success', 'Kuis telah diselesaikan!');
}


}
