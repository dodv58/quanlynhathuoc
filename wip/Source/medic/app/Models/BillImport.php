<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillImport extends Model
{
    protected $guarded = [];

    public function creator(){
        $this->belongsTo('App\Models\User', 'creator_id');
    }

    public function subPharmacy(){
        $this->belongsTo('App\Models\SubPharmacy');
    }

    public function shipments(){
        $this->hasMany('App\Models\Shipment');
    }
}
