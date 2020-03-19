<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function parcels()
    {
        return $this->hasMany('App\Parcel');
    }

    public function pargo_naughts()
    {
        return $this->hasMany('App\Pargonaught');
    }
}
