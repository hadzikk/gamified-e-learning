<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Additional function 
    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_user')
                    ->withPivot('enrolled_at', 'completed_at', 'score')
                    ->withTimestamps();
    }

    public function posts():HasMany 
    {
        return $this->hasMany(Post::class);
    }    

    public function quiz_users()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_user')->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->slug = Str::slug($user->first_name . ' ' . $user->last_name);
        });

        static::updating(function ($user) {
            $user->slug = Str::slug($user->first_name . ' ' . $user->last_name);
        });
    }
}
