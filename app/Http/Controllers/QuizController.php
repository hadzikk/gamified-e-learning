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

    // Menghitung time_remaining berdasarkan quiz duration (dalam detik)
    $timeRemaining = $quiz->duration * 60; // Mengonversi durasi kuis dari menit ke detik

    // Simpan ke database
    $quizUser = new QuizUser();
    $quizUser->user_id = $user->id;
    $quizUser->quiz_id = $quiz->id;
    $quizUser->enrolled_at = now();
    $quizUser->time_given = $timeRemaining;
    $quizUser->time_remaining = $timeRemaining;
    $quizUser->status = "ongoing";
    $quizUser->save();

    // Simpan timer di session agar tersedia setelah refresh
    session(['time_remaining' => $timeRemaining]);

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

        // Ambil objek post terkait dengan kuis
        if (!$quiz->post_id) {
            return redirect()->back()->with('error', 'Kuis tidak memiliki post terkait.');
        }
        $post = Post::findOrFail($quiz->post_id);
        $postSlug = $post->slug; // Ambil slug dari post

        // Mengambil level kuis dan menentukan penalti
        $level = $request->level;
        $penaltyRates = [
            'basic' => 0.30,
            'advance' => 0.20,
            'proficient' => 0.10,
        ];
        $penalty = $penaltyRates[$level] ?? 0;

        $totalQuestions = $questions->count();
        if ($totalQuestions === 0) {
            return redirect()->back()->with('error', 'Kuis tidak memiliki pertanyaan.');
        }

        $scorePerQuestion = 100 / $totalQuestions;
        $correctAnswers = 0;
        $startTime = Carbon::now();

        // Periksa jawaban
        foreach ($questions as $question) {
            $selectedOptionId = $request->input('question_' . $question->id);
            $correctOption = $question->options->where('is_correct', true)->first();

            if ($correctOption && $selectedOptionId == $correctOption->id) {
                $correctAnswers++;
            }
        }

        // Hitung skor akhir dengan penalti
        $rawScore = $correctAnswers * $scorePerQuestion;
        $score = $rawScore * (1 - $penalty);

        // Hitung durasi pengerjaan
        $endTime = Carbon::now();
        $timeTaken = $endTime->diffInSeconds($startTime);

        // Update status kuis di `quiz_user`
        $quizUser = QuizUser::where('quiz_id', $quizId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $quizUser->completed_at = $endTime;
        $quizUser->time_taken = $timeTaken;
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
