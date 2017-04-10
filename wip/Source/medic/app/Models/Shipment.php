<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function billImport(){
        return $this->belongsTo('App\Models\BillImport');
    }

    public function billExports() {
        return $this->belongsToMany('App\Modes\BillExport')->using('App\Models\BillExportShipment');
    }
}
