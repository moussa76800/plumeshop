<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded=[];

    
    public function categoryBook() {
        return $this->belongsTo(Category::class,'category_id','id');
     }
     public function subCategory() {
      return $this->belongsTo(SubCategory::class,'subCategory_id','id');
   }

     public function publisher() {
        return $this->belongsTo(Publisher::class,'publisher_id','id');
     }

     public Function Authors() {
      return $this->belongsToMany(Author::class,'book_authors','id')->using(Book_Author::class);
   }


}
