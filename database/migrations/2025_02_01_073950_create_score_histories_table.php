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
        Schema::create('score_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('previous_score'); // Skor sebelum berubah
            $table->integer('new_score'); // Skor setelah berubah
            $table->string('previous_level'); // Level sebelum berubah
            $table->string('new_level'); // Level setelah berubah
            $table->timestamp('changed_at')->useCurrent(); // Waktu perubahan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score_histories');
    }
};
