<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id'
    ];

    protected static function booted()
    {
        static::creating(function ($comment) {
            $comment->user_id = Auth::id();
        });
    }
}
