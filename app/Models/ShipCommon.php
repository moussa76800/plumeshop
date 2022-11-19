<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipCommon extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function town() {
        return $this->belongsTo(ShipTown::class,'town_id','id');
     }
}
