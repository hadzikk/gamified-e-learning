<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizUser  extends Model
{
    use HasFactory;

    protected $table = 'quiz_user';

    protected $fillable = ['quiz_id', 'user_id', 'enrolled_at', 'completed_at', 'duration', 'time_remaining', 'score'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}