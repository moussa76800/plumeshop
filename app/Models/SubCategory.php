<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'category_id',
        'name' ,   
    ];

    public function category() {
        return $this->belongsTo(Category::class,'category_id','id');
     }

     public function books()
{
    return $this->hasMany(Book::class, 'subCategory_id');
}

 
}
