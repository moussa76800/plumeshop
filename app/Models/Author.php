<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Author extends Model
{
    use HasFactory;

    protected $fillable=[
        'name_en' ,
        'name_fr', 
    ];


    /**
     * Authors's Books
     * @return void
     */

     public Function Books() {
        return $this->belongsToMany(Book::class,'book_authors')->using(Book_Author::class);
     }
}
