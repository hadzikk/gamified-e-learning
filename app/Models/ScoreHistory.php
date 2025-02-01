<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreHistory extends Model
{
    protected $table = 'score_histories';

    protected $fillable = [
        'user_id', 'previous_score', 'new_score', 'previous_level', 'new_level', 'changed_at'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
