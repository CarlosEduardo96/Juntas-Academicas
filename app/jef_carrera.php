<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jef_carrera extends Model
{
    //
    public function login()
    {
        return $this->hasMany('App\login');
    }
}
