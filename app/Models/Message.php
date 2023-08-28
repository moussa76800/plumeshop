<?php

namespace App\Models;

use App\Models\Blog\BlogPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasOne(Review::class);
    }

    public function post()
    {
        return $this->belongsTo(BlogPost::class, 'post_id', 'id');
    }
}
