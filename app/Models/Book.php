<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Wishlist;
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
      return $this->belongsToMany(Author::class,'book_author');
   }

      public function multiImages()
   {
      return $this->hasMany(MultiImg::class,'book_id', 'id');
   }


     public function orderItems(){
      return $this->hasOne(OrderItem::class,'book_id', 'id');
     }


   public function user()
   {
      return $this->belongsTo(User::class);
   }



}
