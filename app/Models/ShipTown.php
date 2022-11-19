<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipTown extends Model
{
    use HasFactory;

    protected $guarded=[];


    /**
     * @return void
     */
  
    public function common(){
        return $this->hasMany(ShipCommon::class, 'town_id');
     }

    public function country() {
        return $this->belongsTo(ShipCountry::class,'country_id','id');
     }
}
