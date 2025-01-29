<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quiz_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('enrolled_at')->nullable(); // Waktu enroll
            $table->timestamp('completed_at')->nullable(); // Waktu selesai
            $table->integer('time_given')->nullable();
            $table->integer('time_remaining')->nullable();
            $table->integer('time_taken')->nullable();
            $table->integer('score')->default(0); // Skor setelah menyelesaikan kuis
            $table->enum('status', ['ongoing', 'completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_users');
    }
};
