<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipCountry extends Model
{
    use HasFactory;
    public $timestamps = false;
 
    public function address(){
        return $this->hasMany(Address::class,'country_id');
     }
}
