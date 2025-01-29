<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    protected $fillable = ['post_id', 'penalty', 'duration'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'quiz_user')
                    ->withPivot('enrolled_at', 'completed_at', 'score', 'status')
                    ->withTimestamps();
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}