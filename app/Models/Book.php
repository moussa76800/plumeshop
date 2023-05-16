<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded=[];

    
    public function categoryBook() {
        return $this->belongsTo(Category::class,'categoryBook_id','id');
     }
     public function subCategory() {
      return $this->belongsTo(SubCategory::class,'subCategory_id','id');
   }

     public function publisher() {
        return $this->belongsTo(Publisher::class,'publisher_id','id');
     }

     public Function authors() {
      return $this->belongsToMany(Author::class,'book_authors');
   }

      public function multiImages()
   {
      return $this->hasMany(MultiImg::class);
   }

     public function wishList(){
      return $this->belongsToMany(Wishlist::class);
     }

}
