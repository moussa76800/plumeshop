<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',
        'name_en' , 
        'name_fr' ,
        
    ];

    public function category() {
        return $this->belongsTo(Category::class,'category_id','id');
     }

     public function book(){
        return $this->hasMany(Book::class,'subCategory_id','id');
     }
 
}
