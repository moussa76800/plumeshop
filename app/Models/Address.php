<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class,);
    }
    public function country()
    {
        return $this->belongsTo(ShipCountry::class, 'country_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
