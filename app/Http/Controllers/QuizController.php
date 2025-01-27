<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // Fungsi untuk mendaftar ke kuis
    public function enroll($quizId) {
        $user = Auth::user(); // Ambil user yang sedang login
        $quiz = Quiz::findOrFail($quizId); // Cari kuis berdasarkan ID

        // Cek apakah user sudah enroll sebelumnya
        $isEnrolled = DB::table('quiz_user')
            ->where('quiz_id', $quizId)
            ->where('user_id', $user->id)
            ->exists();

        if ($isEnrolled) {
            return redirect()->back()->with('error', 'You are already enrolled in this quiz.');
        }

        // Tambahkan data ke tabel pivot
        DB::table('quiz_user')->insert([
            'quiz_id' => $quizId,
            'user_id' => $user->id,
            'enrolled_at' => now(),
        ]);

        return redirect()->back()->with('success', 'You have successfully enrolled in the quiz!');
    }



    // Fungsi untuk submit kuis dan menghitung skor
    public function submitQuiz(Request $request, Quiz $quiz)
    {
        // Validasi jawaban dari request
        $validated = $request->validate([
            'question_*' => 'required|exists:options,id', // Pastikan semua soal terjawab dengan benar
        ]);
        
        $correctAnswers = 0;
        $totalQuestions = $quiz->questions->count();
        $pointsPerQuestion = 100 / $totalQuestions; // Nilai tiap soal

        // Proses cek jawaban
        foreach ($quiz->questions as $question) {
            $selectedOptionId = $request->input('question_' . $question->id);
            $correctOption = $question->options()->where('is_correct', true)->first();

            if ($correctOption && $correctOption->id == $selectedOptionId) {
                $correctAnswers++;
            }
        }

        // Hitung skor berdasarkan jumlah jawaban benar
        $score = $correctAnswers * $pointsPerQuestion;

        // Cek deadline untuk penilaian
        $deadline = Carbon::parse($quiz->deadline); // Ganti sesuai model dan field deadline
        $penalty = 0;

        // Jika melewati deadline, berikan penalty berdasarkan level
        if (Carbon::now()->isAfter($deadline)) {
            $timeDifference = Carbon::now()->diffInMinutes($deadline);
            $levelPenalty = $this->applyPenaltyBasedOnLevel($quiz->post->level, $score);

            // Terapkan penalty
            $score = $score - $levelPenalty;
        }

        // Simpan hasil ke database menggunakan QuizResult
        $quizResult = QuizResult::create([
            'user_id' => auth::user()->id,
            'quiz_id' => $quiz->id,
            'score' => $score,
        ]);

        return redirect()->route('quizzes.show', $quiz->id)
                         ->with('success', 'Jawaban Anda berhasil disubmit. Skor Anda: ' . $score);
    }

    // Fungsi untuk menghitung penalti berdasarkan level
    private function applyPenaltyBasedOnLevel($level, $score)
    {
        $penalty = 0;

        switch ($level) {
            case 'basic':
                $penalty = $score * 0.30; // 30% penalty untuk basic
                break;
            case 'advance':
                $penalty = $score * 0.20; // 20% penalty untuk advance
                break;
            case 'proficient':
                $penalty = $score * 0.10; // 10% penalty untuk proficient
                break;
        }

        return $penalty;
    }
}
