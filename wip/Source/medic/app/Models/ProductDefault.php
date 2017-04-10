<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDefault extends Model
{
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
