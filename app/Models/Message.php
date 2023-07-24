<?php

namespace App\Models;

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

    public function otherMessages()
    {
        return $this->hasOne(OthersMessages::class);
    }

    public function blogMessages()
    {
        return $this->hasOne(BlogMessage::class);
    }
}
