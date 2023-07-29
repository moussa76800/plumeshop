<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class Wishlist extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;


    public function book()
    {
        return $this->belongsTo(Book::class );
    }

    
    public function user()
{
    return $this->belongsTo(User::class);
}

    // public function book()
    // {
    //     return $this->belongsTo(Book::class,'book_id','id');
    // }
    

}
