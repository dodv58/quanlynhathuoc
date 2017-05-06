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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 1) {
            $chartjs = app()->chartjs
                ->name('barChartTest')
                ->type('bar')
                ->size(['width' => 818, 'height' => 250])
                ->labels(['01/4', '02/4', '03/4', '04/4', '05/4', '06/4', '07/4', '08/4', '09/4', '10/4', '11/4', '12/4', '13/4', '14/4', '15/4', '16/4', '17/4', '18/4', '19/4', '20/4', '21/4', '22/4', '23/4'])
                ->datasets([
                    [
                        "label" => "Doanh thu",
                        'backgroundColor' => "#26B99A",
                        'data' => [4000, 3225, 4222, 4550, 4000, 4200, 5000, 4800, 4000, 3900, 5100, 4800, 4000, 4600, 4500, 4800, 5000, 4500, 4600, 4400, 4800, 4800, 4700],
                        'hoverBackgroundColor' => "#36CAAB"
                    ],
                ])
                ->options([]);

            return view('overview', compact('chartjs'));
        }
        else {
            return  redirect('/product/sale');
        }
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
            ->size(['width' => 818, 'height' => 350])
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
