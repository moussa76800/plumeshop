<?php

namespace App\Models\Blog;

use App\Models\BlogMessage;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $guarded = [];

   // Dans le modèle BlogPost
public function category()
{
    return $this->belongsTo(BlogPostCategory::class, 'category_id');
}


public function messages()
{
    return $this->hasMany(Message::class, 'blog_id', 'id');
}
    
}
