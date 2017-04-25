<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\SubPharmacy;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\DB;

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
        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 1500, 'height' => 600])
            ->labels(['Label x', 'Label y', 'Label z'])
            ->datasets([
                [
                    "label" => "My First dataset",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    'data' => [69, 59, 100]
                ],
                [
                    "label" => "My second dataset",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                    'data' => [65, 12, 89]
                ]
            ])
            ->options([]);

        return view('overview', compact('chartjs'));
    }



    public function showPharmacyRegister(){
        return view('create_pharmacy');
    }

    public function storePharmacy()
    {
        try{
            DB::beginTransaction();
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
            DB::commit();
        }
        catch (\Exception $ex){
            DB::rollBack();
            throw $ex;
        }


        auth()->user()->pharmacy_id = $pharmacy->id;
        auth()->user()->sub_pharmacy_id = $sub_pharmacy->id;
        auth()->user()->save();

        return redirect()->home();

    }

    public function example() {
        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Label x', 'Label y'])
            ->datasets([
                [
                    "label" => "My First dataset",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    'data' => [69, 59]
                ],
                [
                    "label" => "My second dataset",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                    'data' => [65, 12]
                ]
            ])
            ->options([]);

        return view('example', compact('chartjs'));
    }

}
