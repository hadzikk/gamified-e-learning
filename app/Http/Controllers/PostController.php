<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function home()
    {
        return view('student.home', ['title' => 'home']);
    }

    // Menampilkan semua post di halaman mahasiswa
    public function show() 
    {    
        $posts = Post::with('user')->latest()->paginate(10);
        
        return view('student.post', ['posts' => $posts, 'title' => 'post']);
    }

    public function profile()
    {
        $student = Auth::user();
        return view('student.profil', compact('student'));
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('student.profiles', compact('student'));
    }

    public function updateprofile(Request $request)
{
    // Ensure the user is authenticated
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->withErrors(['message' => 'You must be logged in to update your profile.']);
    }

    // Update username
    $user->username = $request->username;

    // Check if the user wants to change the password
    if ($request->filled('current_password') && $request->filled('new_password')) {
        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect!']);
        }

        // Update the new password
        $user->password = Hash::make($request->new_password);
    }

    // Upload profile picture if provided
    if ($request->hasFile('profile_picture')) {
        // Delete old picture if it exists
        if ($user->profile_picture) {
            Storage::delete('public/' . $user->profile_picture);
        }

        // Save the new picture
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
    }

    // Save changes
    $user->save();

    // Redirect with success message
    return redirect()->route('student.profile')->with('success', 'Profile updated successfully!');
}

    // Menampilkan pratinjau post di halaman mahasiswa
    public function review(Post $post) {
        $post = $post->load('user');

        // Ambil data kuis terkait dengan post
        $quiz = Quiz::with(['questions.options'])->where('post_id', $post->id)->get();
        $quizduration = Quiz::where('post_id', $post->id)->first();

        // Ambil user yang sedang login
        $user = Auth::user();

        // Buat array untuk menandai kuis yang sudah di-enroll
        $enrolledQuizIds = $user->quizzes->pluck('id')->toArray();

        return view('student.review', [
            'post' => $post,
            'quiz' => $quiz,
            'quizduration' => $quizduration,
            'enrolledQuizIds' => $enrolledQuizIds
        ]);
    }

    // Menyimpan postingan kuis
    public function store(Request $request)
    {
        DB::beginTransaction(); // Mulai transaksi

        try {
            // Validasi input
            $request->validate([
                'subject' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'level' => 'required|in:basic,advance,proficient',
                'description' => 'nullable|string|max:230',
                'duration' => 'nullable|integer|min:0',
                'questions.*.question_text' => 'required|string',
                'questions.*.options.*.option_text' => 'required|string',
                'questions.*.options.*.is_correct' => 'boolean',
            ]);

            // Tentukan penalty berdasarkan level
            $penalty = match ($request->level) {
                'basic' => 30,
                'advance' => 20,
                'proficient' => 10,
                default => 0,
            };

            // Simpan post
            $post = Post::create([
                'user_id' => $request->user_id, // Ambil user_id dari pengguna yang sedang login
                'subject' => $request->subject,
                'title' => $request->title,
                'description' => $request->description,
                'slug' => Str::slug($request->title, '-'),
                'level' => $request->level,
            ]);

            // Simpan kuis terkait post
            $quiz = Quiz::create([
                'post_id' => $post->id,
                'penalty' => $penalty,
                'duration' => $request->duration,
            ]);

            // Iterate through questions
            foreach ($request->questions as $index => $questionData) {
                // Save question
                $question = Question::create([
                    'quiz_id' => $quiz->id, // Associate question with the quiz
                    'question_text' => $questionData['question_text'],
                ]);

                // Get options for the current question
                if (isset($request->options[$index + 1])) { // Adjust index to match options array
                    $questionOptions = $request->options[$index + 1];

                    // Iterate through options and save
                    foreach ($questionOptions['option_text'] as $optionIndex => $optionText) {
                        // Determine if the option is correct
                        $isCorrect = ($optionIndex == $questionOptions['is_correct']) ? 1 : 0;

                        // Save option
                        Option::create([
                            'quiz_id' => $quiz->id,
                            'question_id' => $question->id, // Associate option with the question
                            'option_text' => $optionText,
                            'is_correct' => $isCorrect, // 1 if correct, 0 if incorrect
                        ]);
                    }
                }
            }        

            DB::commit(); // Simpan transaksi
            return redirect()->back()->with('success', 'Postingan kuis berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan transaksi jika ada error
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
