<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillExport extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function creator(){
        return $this->belongsTo('App\Models\User', 'creator_id');
    }

    public function subPharmacy(){
        return $this->belongsTo('App\Models\SubPharmacy');
    }

    public function shipments(){
        return $this->belongsToMany('App\Models\Shipment')->using('App\Models\BillExportShipment');
    }
}
