<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $table = 'tags';
    protected $guarded = false;
    
        // багато до багатьох із тегами
        public function posts(){
            return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
        }
}
