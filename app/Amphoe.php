<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amphoe extends Model
{
    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function district()
    {
        return $this->hasMany('App\District');
    }
}
