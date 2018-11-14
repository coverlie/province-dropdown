<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function amphoe()
    {
        return $this->belongsTo('App\Amphoe');
    }
}
