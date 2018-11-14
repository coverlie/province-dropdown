<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function amphoe()
    {
        return $this->hasMany('App\Amphoe');
    }

}
