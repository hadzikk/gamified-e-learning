<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'role',
        'email',
        'password', 
        'degree',
        'score'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A User has many QuizUser relationships (pivot table `quiz_user`).
     *
     * @return HasMany
     */
    public function quizUsers(): HasMany
    {
        return $this->hasMany(QuizUser::class);
    }

    /**
     * A User belongs to many Quizzes through `quiz_user` pivot table.
     *
     * @return BelongsToMany
     */
    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Quiz::class, 'quiz_user')
                    ->withPivot('enrolled_at', 'completed_at', 'score', 'status')
                    ->withTimestamps();
    }
}
