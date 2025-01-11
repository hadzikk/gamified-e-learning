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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade'); // Relasi ke post
            $table->string('title'); // Judul kuis (bisa berbeda dari title post)
            $table->enum('level', ['basic', 'intermediate', 'proficient']); // Level kuis
            $table->timestamp('deadline')->nullable(); // Deadline kuis
            $table->integer('penalty')->nullable(); // Pengurangan skor jika melewati deadline
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};