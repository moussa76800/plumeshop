<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
