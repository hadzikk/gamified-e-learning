<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subject', 'title', 'slug', 'level'];
    protected $with = ['user'];

    // Menambahkan relasi ke tabel users
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Method untuk meng-handle pembuatan slug otomatis
    protected static function booted()
    {
        static::creating(function ($post) {
            // Membuat slug otomatis berdasarkan title
            $post->slug = Str::slug($post->title);
        });
    }
}
