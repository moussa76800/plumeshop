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

    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id');
    }

    public function post()
    {
        return $this->belongsTo(BlogPost::class, 'post_id', 'id');
    }
}
