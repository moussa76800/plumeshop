<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
    
    /**
     * Authors's Books
     * @return void
     */

    public function Books()
    {
        return $this->belongsToMany(Book::class, 'book_author');
    }
}
