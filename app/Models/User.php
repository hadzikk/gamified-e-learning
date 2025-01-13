<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Added for many-to-many relation
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'role',
        'email',
        'password',
        'slug', // Include 'slug' in mass assignable attributes
        'degree', // Include 'degree' for the professor (dosen) role
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A User has many Posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * A User has many QuizUser relationships (through quiz_user pivot).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quiz_user(): HasMany
    {
        return $this->hasMany(QuizUser::class);
    }

    /**
     * A User has many QuizResults.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizUsers(): HasMany
    {
        return $this->hasMany(QuizUser ::class);
    }

    public function quiz_result(): HasMany
    {
        return $this->hasMany(QuizResult::class);
    }

    /**
     * A User belongs to many Quizzes (via quiz_user pivot table).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Quiz::class, 'quiz_user')
                    ->withPivot('enrolled_at', 'completed_at', 'score');
    }
}
