<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 class BlogMessage extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function user(){
            return $this->belongsTo(User::class,'user_id','id');
        }

    public function message(){
        return $this->hasOne(Message::class);
    }

    public function post(){
        return $this->belongsTo(BlogPost::class,'post_id','id');
    }

    }

