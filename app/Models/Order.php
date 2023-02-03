<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;
    
    protected $guarded = [];

    public function common(){
    	return $this->belongsTo(ShipCommon::class,'common_id','id');
    }

      public function town(){
    	return $this->belongsTo(ShipTown::class,'town_id','id');
    }

      public function country(){
    	return $this->belongsTo(ShipCountry::class,'country_id','id');
    }

      public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }
}
