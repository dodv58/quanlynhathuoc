<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\BillExport;
use App\Models\BillImport;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\SubPharmacy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (auth()->user()->role == 1) {

            // tạo bảng sản phẩm sắp hết hàng
            $outStockProducts = Product::join('shipments', 'shipments.product_id', '=', 'products.id')
                ->join('bill_imports', 'bill_imports.id', '=', 'shipments.bill_import_id')
                ->where([
                    ['bill_imports.sub_pharmacy_id', '=', Auth::user()->sub_pharmacy_id],
                    ['products.pharmacy_id', '=', Auth::user()->pharmacy_id],
                ])
                ->groupBy('products.id', 'products.name', 'products.min_quantity', 'products.unit')
                ->select('products.id', 'products.name', 'products.min_quantity', 'products.unit', DB::raw('sum(shipments.quantity) as quantity'))
                ->havingRaw('sum(shipments.quantity) < min(products.min_quantity)')
                ->get();

            // tạo bảng sản phẩm sắp hết hạn
            $expireProducts = Product::join('shipments', 'shipments.product_id', '=', 'products.id')
                ->join('bill_imports', 'bill_imports.id', '=', 'shipments.bill_import_id')
                ->where([
                    ['bill_imports.sub_pharmacy_id', '=', Auth::user()->sub_pharmacy_id],
                    ['products.pharmacy_id', '=', Auth::user()->pharmacy_id],
                ])
                ->select('products.name', 'products.unit', 'shipments.quantity', 'shipments.expire_date')
                ->where('shipments.expire_date', '<', Carbon::now()->addDays(10))
                ->where('shipments.quantity', '>', 0)
                ->get();

            // tạo bảng doanh thu
            $totalSaleAmount = BillExport::join('sub_pharmacies', 'sub_pharmacies.id', '=', 'bill_exports.sub_pharmacy_id')
                ->select(DB::raw('DAY(bill_exports.created_at) as day'), DB::raw('MONTH(bill_exports.created_at) as month')
                    , DB::raw('YEAR(bill_exports.created_at) as year'), DB::raw('SUM(bill_exports.total_amount) as total'))
                ->where([
                    ['sub_pharmacies.pharmacy_id', '=', Auth::user()->pharmacy_id],
                    ['bill_exports.created_at', '>=', Carbon::now()->startOfMonth()],
                    ['bill_exports.created_at', '<=', Carbon::now()->endOfMonth()],
                ])
                ->groupBy('year', 'month', 'day')
                ->get();

            $totalSaleAmount = $totalSaleAmount->toArray();
            $daysInMonth = $this->getDaysByMonth();
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

            return view('overview', compact('chartjs', 'outStockProducts', 'expireProducts'));
        } else {
            return redirect('/product/sale');
        }
    }


    public function showPharmacyRegister() {
        return view('create_pharmacy');
    }

    public function storePharmacy() {
        try {
            DB::beginTransaction();
            $pharmacy = Pharmacy::create([
                'name' => request('name'),
                'email' => request('email'),
                'account' => request('account'),
                'address' => request('address'),
                'phone' => request('phone'),
                'owner_name' => auth()->user()->name,
            ]);


            $sub_pharmacy = SubPharmacy::create([
                'name' => request('name'),
                'pharmacy_id' => $pharmacy->id,
                'address' => request('address'),
                'phone' => request('phone'),
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
        auth()->user()->pharmacy_id = $pharmacy->id;
        auth()->user()->sub_pharmacy_id = $sub_pharmacy->id;
        auth()->user()->save();

        return redirect()->home();

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

}
