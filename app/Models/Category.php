<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,

    ];

    /**
     * @return void
     */
  
     public function subCategories(){
        return $this->hasMany(SubCategory::class,'category_id');
     }

    /**
     * @return void
     */
  
    public function books(){
        return $this->hasMany(Book::class, 'categoryBook_id');
     }


}
