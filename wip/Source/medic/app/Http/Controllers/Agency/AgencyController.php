<?php

namespace App\Http\Controllers\Agency;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SubPharmacy;

class AgencyController extends Controller
{
    //

    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAgencies(){
//        return view('ageny_detail');
        return redirect('/home/agency/1');
    }

    public function showAddEmployee($id){
        $users = User::where('pharmacy_id', auth()->user()->pharmacy_id)->get();
        $agency = SubPharmacy::find($id);
        return view('agency_add_employee', compact('users', 'agency'));
    }

    public function showAgency($id){
        $agency = SubPharmacy::find($id);
        $employees = User::where('sub_pharmacy_id', $agency->id)->get();
        return view('ageny_detail', compact('agency', 'employees'));
    }

    public function addAgency(){
        return view('agency_add');
    }

    public function storeAgency(){
        $agency = new SubPharmacy;
        $agency->name = request('name');
        $agency->pharmacy_id = auth()->user()->pharmacy_id;
        $agency->address = request('address');
        $agency->phone = request('phone');

        $agency->save();
        return redirect('/agency/' . $agency->id);
    }


    public function agencyAddEmployee($id, Request $request) {
        $selected = $request->selected;
        foreach ($selected as $account){
            $user = User::where('account', $account)->first();
            if($user) {
                $user->sub_pharmacy_id = $id;
                $user->save();
            }
        }
        return $id;
    }
}
