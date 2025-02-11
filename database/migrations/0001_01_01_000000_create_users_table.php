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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->nullable();
            $table->string('username')->unique(); // Menambahkan kolom username
            $table->string('first_name'); // Menambahkan kolom first_name
            $table->string('last_name'); // Menambahkan kolom last_name
            $table->string('degree')->nullable(); // Kolom gelar untuk dosen
            $table->string('email')->unique(); // Kolom email tetap ada
            $table->string('password'); // Kolom password tetap ada
            $table->enum('role',['administrator','lecturer','student']); // Menambahkan kolom role dengan nilai default 'siswa'
            $table->enum('level', ['basic', 'advance', 'proficient'])->default('basic');
            $table->integer('score')->default(0)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
