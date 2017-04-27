<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\BillExport;
use App\Models\BillExportShipment;
use App\Models\BillImport;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shipment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Request $request
     */
    public function index() {
        $products = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->join('shipments', 'shipments.product_id', '=', 'products.id')
            ->join('bill_imports', 'bill_imports.id', '=', 'shipments.bill_import_id')
            ->where('bill_imports.sub_pharmacy_id', Auth::user()->sub_pharmacy_id)
            ->groupBy('products.id', 'products.name', 'categories.name')
            ->select('products.id', 'products.name', 'categories.name as category_name', DB::raw('sum(shipments.quantity) as quantity'))->paginate(20);

        $categories = Category::all();

        return view('product.index')->with('data', ['products' => $products, 'categories' => $categories]);
    }

    public function detail($id) {
        $product = Product::find($id);
        if (empty($product)) {
            throw new NotFoundHttpException();
        }

        $shipments = Shipment::join('bill_imports', 'bill_imports.id', '=', 'shipments.bill_import_id')
            ->where([
                ['shipments.product_id', '=', $id],
                ['bill_imports.sub_pharmacy_id', '=', Auth::user()->sub_pharmacy_id],
            ])->orderBy('shipments.created_at', 'desc')->get();

        $saleHistories = Shipment::join('bill_export_shipment', 'shipments.id', '=', 'bill_export_shipment.shipment_id')
            ->join('bill_exports', 'bill_exports.id', '=', 'bill_export_shipment.bill_export_id')
            ->join('users', 'users.id', '=', 'bill_exports.creator_id')
            ->where([
                ['shipments.product_id', '=', $id],
                ['bill_exports.sub_pharmacy_id', '=', Auth::user()->sub_pharmacy_id],
            ])
            ->select('shipments.id', 'shipments.sale_price', 'shipments.bill_import_id', 'shipments.expire_date', 'bill_export_shipment.bill_export_id',
                'bill_export_shipment.quantity', 'bill_exports.created_at', 'bill_exports.creator_id', 'users.name as creator_name')
            ->orderBy('shipments.created_at', 'desc')
            ->get();

        return view('product.detail')->with('data', [
            'product' => $product,
            'shipments' => $shipments,
            'saleHistories' => $saleHistories,
        ]);
    }

    public function addStocks(Request $request) {
        if ($request->isMethod('post')) {
            $products = $request->input('products');
            $products = json_decode($products, true);

            $totalAmount = $this->countAmount($products);
            try {
                DB::beginTransaction();
                $billImport = BillImport::create(
                    [
                        'code' => '',
                        'total_amount' => $totalAmount,
                        'creator_id' => Auth::id(),
                        'sub_pharmacy_id' => Auth::user()->sub_pharmacy_id,
                    ]
                );

                $shipments = [];
                foreach ($products as $product) {
                    $productObj = Product::where([["name", '=', $product["name"]], ["category_id", '=', $product["category_id"]]])->first();
                    if (!$productObj) {
                        $productObj = Product::create([
                            'name' => $product["name"],
                            'price' => $product["sale_price"],
                            'category_id' => $product["category_id"],
                            'pharmacy_id' => Auth::user()->pharmacy_id,
                            'creator_id' => Auth::id(),
                        ]);
                    }
                    unset($product["category_id"]);
                    unset($product["name"]);
                    $product["product_id"] = $productObj->id;
                    $product["bill_import_id"] = $billImport->id;
                    $product["input_quantity"] = $product["quantity"];
                    $product["expire_date"] = !empty($product["expire_date"]) ? Carbon::createFromFormat("d-m-Y", $product["expire_date"]) : null;
                    $product["manufactured_date"] = !empty($product["manufactured_date"]) ? Carbon::createFromFormat("d-m-Y", $product["manufactured_date"]) : null;
                    $product["input_quantity"] = $product["quantity"];
                    $product["created_at"] = Carbon::now();
                    array_push($shipments, $product);
                }
                Shipment::insert($shipments);
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                throw $ex;
            }
        }
        $categories = Category::all();

        return view('product.add-stocks')->with('categories', $categories);
    }

    public function suggestProducts(Request $request) {
        $products = DB::table('products')->select('name', 'price', 'category_id')
            ->where('name', 'like', '%' . $request->input('searchString') . '%')->get()->toArray();
        $productNames = array_column($products, 'name');
        $suggestionProducts = DB::table('product_defaults')->select('name', 'price', 'category_id')
            ->where('name', 'like', '%' . $request->input('searchString') . '%')
            ->whereNotIn('name', $productNames)->get()->toArray();
        $suggestionProducts = array_merge($suggestionProducts, $products);

        return response()->json($suggestionProducts);
    }

    public function sale(Request $request) {
        if ($request->isMethod('post')) {
            $shipments = $request->input('shipments');
            $receivedAmount = $request->input('receivedAmount');
            $totalAmount = $request->input('totalAmount');
            try {
                DB::beginTransaction();
                $billExport = BillExport::create([
                    'code' => '',
                    'sub_pharmacy_id' => Auth::user()->sub_pharmacy_id,
                    'creator_id' => Auth::id(),
                    'total_amount' => $totalAmount,
                    'received_amount' => $receivedAmount,
                    'customer_name' => '',
                    'created_at' => Carbon::now(),
                ]);

                foreach ($shipments as $shipment) {
                    $record = [];
                    $record['quantity'] = $shipment['quantity'];
                    $record['total_amount'] = $shipment['sale_price'] * $shipment["quantity"];
                    $billExport->shipments()->attach($shipment['id'], $record);
                    $shipmentObj = Shipment::find($shipment['id']);
                    if ($shipmentObj === null) {
                        throw new \Exception();
                    }
                    $shipmentObj->quantity = $shipmentObj->quantity - $record['quantity'];
                    $shipmentObj->save();
                }


                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                throw $ex;
            }
        }

        return view('product.sale');
    }

    public function findByShipments(Request $request) {
        $shipments = DB::table('shipments')->join('products', 'products.id', '=', 'shipments.product_id')
            ->select('shipments.*', 'products.name as name')
            ->where([
                ['products.name', 'like', '%' . $request->input('searchString') . '%'],
                ['shipments.quantity', '>', 0],
            ])
            ->orderBy('products.name')->get()->toArray();

        foreach ($shipments as $key => $shipment) {
            $shipments[$key]->expire_date = Carbon::parse($shipment->expire_date)->format('d-m-Y');
            $shipments[$key]->created_at = Carbon::parse($shipment->created_at)->format('d-m-Y');
            $shipments[$key]->manufactured_date = Carbon::parse($shipment->manufactured_date)->format('d-m-Y');
        }

        return response()->json($shipments);
    }

    /**
     * @param array $products
     * @return int
     */
    private function countAmount(array $products) {
        $total = 0;
        foreach ($products as $product) {
            $total += $product['quantity'] * $product['input_price'];
        }

        return $total;
    }
}
