<?php

namespace App\Http\Controllers\Agency;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SubPharmacy;
use App\Models\BillExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $startDateString = request('startDate');
        $endDateString = request('endDate');
        if ($startDateString == null || $endDateString == null) {
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
        } else {
            $startDate = Carbon::createFromFormat('d/m/Y', $startDateString);
            $endDate = Carbon::createFromFormat('d/m/Y', $endDateString);
        }

        $agency = SubPharmacy::find($id);
        $employees = User::where('sub_pharmacy_id', $agency->id)->orderby('role')->get();

        $totalSaleAmount = BillExport::join('sub_pharmacies', 'sub_pharmacies.id', '=', 'bill_exports.sub_pharmacy_id')
            ->select(DB::raw('DAY(bill_exports.created_at) as day'), DB::raw('MONTH(bill_exports.created_at) as month')
                , DB::raw('YEAR(bill_exports.created_at) as year'), DB::raw('SUM(bill_exports.total_amount) as total'))
            ->where([
                ['sub_pharmacies.id', '=', $id],
                ['bill_exports.created_at', '>=', $startDate],
                ['bill_exports.created_at', '<=', $endDate],
            ])
            ->groupBy('year', 'month', 'day')
            ->get();

        $totalSaleAmount = $totalSaleAmount->toArray();
        $daysInMonth = $this->getDays($startDate, $endDate);
        $data = [];

        foreach ($daysInMonth as $day) {
            $item = ['label' => $day['date'] . '/' . $day['month'], 'data' => 0];
            $key = array_filter($totalSaleAmount, function ($var) use ($day) {
                return $var['year'] == intval($day['year'])
                    && $var['month'] == intval($day['month'])
                    && $var['day'] == intval($day['date']);
            });
            if (!empty($key)) {
                $item['data'] = intval(reset($key)['total']);
            }
            $data[] = $item;
        }

        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 818, 'height' => 250])
            ->labels(array_column($data, 'label'))
            ->datasets([
                [
                    "label" => "Doanh thu",
                    'backgroundColor' => "#26B99A",
                    'data' => array_column($data, 'data'),
                    'hoverBackgroundColor' => "#36CAAB",
                ],
            ])
            ->options([]);
        return view('ageny_detail', compact('agency', 'employees', 'chartjs', 'startDate', 'endDate'));
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

    private function getDaysByMonth($year = null, $month = null) {
        if ($year === null || $month === null) {
            $year = date('Y');
            $month = date('m');
        }

        $start_date = "01-" . $month . "-" . $year;
        $start_time = strtotime($start_date);

        $end_time = strtotime("+1 month", $start_time);

        for ($i = $start_time; $i < $end_time; $i += 86400) {
            $list[] = ['year' => $year, 'month' => $month, 'date' => date('d', $i), 'day' => date('D', $i)];
        }

        return $list;
    }

    private function getDays($start_date = null, $end_date = null) {
        if ($start_date === null || $end_date === null) {
            return null;
        }

        for ($i = $start_date->copy(); $i <= $end_date; $i->addDay()) {
            $list[] = ['year' => $i->year, 'month' => $i->month , 'date' => $i->day, 'day' => $i->day];
        }

        return $list;
    }
}
