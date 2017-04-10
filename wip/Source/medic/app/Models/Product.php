<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function pharmacy(){
        return $this->belongsTo('App\Models\Category');
    }

    public function creator(){
        return $this->belongsTo('App\Models\User', 'creator_id');
    }

    public function shipments(){
        return $this->hasMany('App\Models\Shipment');
    }
}
