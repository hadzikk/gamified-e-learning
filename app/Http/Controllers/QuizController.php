<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quiz;
use App\Models\User;
use App\Models\QuizUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // -------------------- FUNGSI MENDAFTARKAN QUIZ (ENROLL) -------------------- //
    public function enroll(Request $request, $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $user = Auth::user();

        // Cek apakah pengguna sudah terdaftar
        if ($user->quizzes->contains($quiz)) {
            return back()->with('error', 'Anda sudah terdaftar untuk kuis ini.');
        }

        // Hitung durasi dalam detik
        $timeRemaining = $quiz->duration * 60;

        // Simpan ke database
        $quizUser = new QuizUser();
        $quizUser->user_id = $user->id;
        $quizUser->quiz_id = $quiz->id;
        $quizUser->enrolled_at = now();
        $quizUser->duration = $timeRemaining;
        $quizUser->time_remaining = $timeRemaining;
        $quizUser->status = "ongoing";
        $quizUser->save();

        // Simpan time_remaining di session agar tetap berjalan meskipun halaman direfresh
        session(['time_remaining' => $timeRemaining]);

        // Ambil slug berdasarkan post terkait quiz
        $post = Post::find($quiz->post_id);
        if (!$post) {
            return back()->with('error', 'Post terkait kuis tidak ditemukan.');
        }

        return redirect()->route('review', ['post' => $post->slug])
            ->with('success', 'Anda berhasil mendaftar untuk kuis ini!');
    }

    // -------------------- FUNGSI MENGIRIMKAN JAWABAN QUIZ -------------------- //
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

        // Ambil sisa waktu dari request atau session
        $timeRemaining = $request->input('time_remaining', session('time_remaining', $quizUser->time_remaining));

        // Terapkan penalty jika waktu habis
        $penalty = ($timeRemaining <= 0) ? 0.20 : 0;

        // Hitung skor akhir setelah penalti
        $score = $rawScore * (1 - $penalty);

        // Simpan hasil ke database
        $quizUser->completed_at = Carbon::now();
        $quizUser->time_remaining = $timeRemaining;
        $quizUser->score = round($score);
        $quizUser->status = 'completed';
        $quizUser->save();

        // Hapus session time_remaining setelah submit
        session()->forget('time_remaining');

        // Update skor user di tabel users
        DB::table('users')->where('id', $user->id)->increment('score', round($score));

        // Redirect ke halaman review dengan slug post terkait
        return redirect()->route('review', ['post' => $postSlug])
            ->with('success', 'Kuis telah diselesaikan!');
    }
}
