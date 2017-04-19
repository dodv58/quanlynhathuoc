<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'account', 'password', 'account', 'pharmacy_id', 'pharmacy_id', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pharmacy(){
        return $this->belongsTo('App\Models\Pharmacy');
    }

    public function subPharmacy(){
        return $this->belongsTo('App\Models\SubPharmacy');
    }

    public function billImports(){
        return $this->hasMany('App\Models\BillImport', 'creator_id');
    }

    public function billExports(){
        return $this->hasMany('App\Models\BillExport', 'creator_id');
    }

    public function createdProducts(){
        return $this->hasMany('App\Models\Product', 'creator_id');
    }
}
