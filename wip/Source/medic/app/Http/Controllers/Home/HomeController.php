<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\SubPharmacy;
use Illuminate\Http\Request;
use App\Models\Pharmacy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }



    public function createBill(){
        return view('create_bill');
    }



    public function showPharmacyRegister(){
        return view('create_pharmacy');
    }

    public function storePharmacy(){
        $pharmacy = Pharmacy::create([
            'name' => request('name'),
            'email' => request('email'),
            'account' => request('account'),
            'address' => request('address'),
            'phone' => request('phone'),
            'owner_name' => auth()->user()->name
        ]);


        $sub_pharmacy = SubPharmacy::create([
            'name' => request('name'),
            'pharmacy_id' => $pharmacy->id,
            'address' => request('address'),
            'phone' => request('phone')
        ]);

        auth()->user()->pharmacy_id = $pharmacy->id;
        auth()->user()->sub_pharmacy_id = $sub_pharmacy->id;
        auth()->user()->save();

        return redirect()->home();

    }

}
