<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'quiz_user')->withTimestamps();
    }

}
