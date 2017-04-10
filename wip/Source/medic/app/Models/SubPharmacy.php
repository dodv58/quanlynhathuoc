<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubPharmacy extends Model
{
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function billImports(){
        return $this->hasMany('App\Models\BillImport');
    }
}
