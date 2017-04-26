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

        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 818, 'height' => 200])
            ->labels(['01/4', '02/4', '03/4', '04/4', '05/4', '06/4', '07/4', '08/4', '09/4', '10/4', '11/4', '12/4', '13/4', '14/4', '15/4', '16/4', '17/4', '18/4', '19/4', '20/4', '21/4', '22/4', '23/4'])
            ->datasets([
                [
                    "label" => "Doanh thu",
                    'backgroundColor' => "#26B99A",
                    'data' => [1500, 1200, 1400, 2000, 1200, 1100, 1320, 1100, 1568, 1242, 1090, 1500, 2000, 1900, 1900, 1100, 1600, 1393, 1090, 1400, 1500, 1700, 1700],
                    'hoverBackgroundColor' => "#36CAAB"
                ],
            ])
            ->options([]);
        return view('ageny_detail', compact('agency', 'employees', 'chartjs'));
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
