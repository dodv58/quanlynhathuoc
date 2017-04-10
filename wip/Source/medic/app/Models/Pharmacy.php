<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
