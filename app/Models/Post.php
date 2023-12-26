<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = false;

    // один до багатьох із категоріями
    public function category()
    {
        return $this->belongsTo(Category::class, 'post_id', 'id');
    }


    // багато до багатьох із тегами
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    protected static function booted()
    {
        static::creating(function ($post) {
            $post->user_id = Auth::id();
            $post->url = Str::slug($post->title);
        });
    }
}
