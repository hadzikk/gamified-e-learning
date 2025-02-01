<?php
namespace App\Models;

use App\Models\ScoreHistory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
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

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($user) {
            if ($user->isDirty('score')) { // Cek jika skor berubah
                $previousScore = $user->getOriginal('score');
                $newScore = $user->score;

                $previousLevel = self::getLevelFromScore($previousScore);
                $newLevel = self::getLevelFromScore($newScore);

                if ($previousLevel !== $newLevel) {
                    ScoreHistory::create([
                        'user_id' => $user->id,
                        'previous_score' => $previousScore,
                        'new_score' => $newScore,
                        'previous_level' => $previousLevel,
                        'new_level' => $newLevel,
                    ]);
                }
            }
        });
    }

    public function getLevelAttribute()
    {
        if ($this->score < 300) {
            return 'basic';
        } elseif ($this->score >= 300 && $this->score < 500) {
            return 'advance';
        } else {
            return 'proficient';
        }
    }
}
