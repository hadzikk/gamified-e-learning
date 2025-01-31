<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat user sebelum setiap test dijalankan
        $this->user = User::factory()->create();
    }


    /** @test */
    public function it_can_show_posts()
    {
        $this->actingAs($this->user);

        // Create some posts
        Post::factory()->count(5)->create(['user_id' => $this->user->id]);

        $response = $this->get(route('student.post'));

        $response->assertStatus(200);
        $response->assertViewHas('posts');
    }

    /** @test */
    public function it_can_update_profile()
    {
        $this->actingAs($this->user);

        $data = [
            'username' => 'newusername',
            'current_password' => 'password123',
            'new_password' => 'newpassword123',
            'profile_picture' => null, // You can use a fake image if needed
        ];

        $response = $this->post(route('updateprofile'), $data);

        $this->user->refresh(); // Refresh the user instance

        $this->assertEquals('newusername', $this->user->username);
        $this->assertTrue(Hash::check('newpassword123', $this->user->password));
        $response->assertRedirect(route('student.profile'));
        $response->assertSessionHas('success', 'Profile updated successfully!');
    }

    /** @test */
    /** @test */
public function it_can_review_post()
{
    // Buat user dan autentikasi
    $user = User::factory()->create();
    $this->actingAs($user);

    // Buat post dan quiz
    $post = Post::factory()->create(['user_id' => $user->id]);
    $quiz = Quiz::factory()->create(['post_id' => $post->id]);

    // Pastikan menggunakan ID atau slug untuk parameter route
    $response = $this->get(route('review', ['post' => $post->id])); 

    // Pastikan response OK (200)
    $response->assertStatus(200);

    // Pastikan view menerima data yang benar
    $response->assertViewHas('post', function ($viewPost) use ($post) {
        return $viewPost->id === $post->id;
    });

    $response->assertViewHas('quiz', function ($viewQuiz) use ($quiz) {
        return $viewQuiz->id === $quiz->id;
    });
}


    /** @test */
    /** @test */
public function it_can_store_quiz()
{
    // Buat dan autentikasi user
    $user = User::factory()->create();
    $this->actingAs($user);

    // Data request
    $request = [
        'user_id' => $user->id, // Pastikan user_id diberikan
        'subject' => 'Math',
        'title' => 'Algebra Quiz',
        'level' => 'basic',
        'description' => 'A quiz on algebra.',
        'duration' => 30,
        'questions' => [
            [
                'question_text' => 'What is 2 + 2?',
                'options' => [
                    [
                        'option_text' => '4',
                        'is_correct' => 1, // Seharusnya jawaban benar
                    ],
                    [
                        'option_text' => '3',
                        'is_correct' => 0,
                    ],
                ],
            ],
        ],
    ];    

    // Kirim request untuk menyimpan post
    $response = $this->post(route('post.store'), $request);

    // Pastikan tidak ada error validasi
    $response->assertSessionDoesntHaveErrors();

    // Ambil post yang baru saja dibuat
    $post = Post::where('title', 'Algebra Quiz')->first();
    $this->assertNotNull($post, 'Post tidak ditemukan dalam database.');

    // Pastikan post disimpan di database
    $this->assertDatabaseHas('posts', [
        'title' => 'Algebra Quiz',
        'user_id' => $user->id,
    ]);

    // Ambil quiz yang terkait dengan post
    $quiz = Quiz::where('post_id', $post->id)->first();
    $this->assertNotNull($quiz, 'Quiz tidak ditemukan dalam database.');

    // Pastikan quiz disimpan dengan post_id yang benar
    $this->assertDatabaseHas('quizzes', [
        'post_id' => $post->id,
        'duration' => 30,
    ]);

    // Pastikan ada setidaknya satu pertanyaan di dalam quiz
    $this->assertDatabaseHas('questions', [
        'quiz_id' => $quiz->id,
        'question_text' => 'What is 2 + 2?',
    ]);

    // Redirect dan flash message berhasil
    $response->assertRedirect()->with('success', 'Postingan kuis berhasil dibuat!');
}
}