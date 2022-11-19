<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipCountry extends Model
{
    use HasFactory;

    
    
    public function towns(){
        return $this->hasMany(ShipTown::class,'country_id');
     }
}
