<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = ['quiz_id', 'question_text','bobot'];

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}