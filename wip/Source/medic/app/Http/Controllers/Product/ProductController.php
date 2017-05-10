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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Request $request
     */
    public function index(Request $request) {
        $searchString = $request->input('timkiem');
        $type = $request->input('loai');
        $status = $request->input('tinhtrang');

        $whereConditions = [
            ['products.pharmacy_id', '=', Auth::user()->pharmacy_id],
        ];
        if(Auth::user()->role === 2){
            array_push($whereConditions, ['bill_imports.sub_pharmacy_id', '=', Auth::user()->sub_pharmacy_id]);
        }

        if (!empty($searchString)) {
            array_push($whereConditions, ['products.name', 'like', '%' . $searchString . '%']);
        }
        if (!empty($type)) {
            array_push($whereConditions, ['products.category_id', '=', $type]);
        }

        $products = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->join('shipments', 'shipments.product_id', '=', 'products.id')
            ->join('bill_imports', 'bill_imports.id', '=', 'shipments.bill_import_id')
            ->where($whereConditions)
            ->groupBy('products.id', 'products.name', 'categories.name','products.min_quantity','products.unit', 'categories.id')
            ->select('products.id', 'products.name', 'products.min_quantity','products.unit' , 'categories.id as category_id',
                'categories.name as category_name', DB::raw('sum(shipments.quantity) as quantity'));
        if (!empty($status) && $status == '1') {
            $products = $products->havingRaw('sum(shipments.quantity) > 0');
        }
        if (!empty($status) && $status == '2') {
            $products = $products->havingRaw('sum(shipments.quantity) = 0');
        }
        if (!empty($status) && $status == '3') {
            $products = $products->havingRaw('sum(shipments.quantity) < min(products.min_quantity)');
        }

        $products = $products->paginate(20);

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
//                ['bill_imports.sub_pharmacy_id', '=', Auth::user()->sub_pharmacy_id],
            ])->orderBy('shipments.created_at', 'desc')->get();

        $saleHistories = Shipment::join('bill_export_shipment', 'shipments.id', '=', 'bill_export_shipment.shipment_id')
            ->join('bill_exports', 'bill_exports.id', '=', 'bill_export_shipment.bill_export_id')
            ->join('users', 'users.id', '=', 'bill_exports.creator_id')
            ->where([
                ['shipments.product_id', '=', $id],
//                ['bill_exports.sub_pharmacy_id', '=', Auth::user()->sub_pharmacy_id],
            ])
            ->select('shipments.id', 'shipments.sale_price', 'shipments.bill_import_id', 'shipments.expire_date', 'bill_export_shipment.bill_export_id',
                'bill_export_shipment.quantity', 'bill_exports.created_at', 'bill_exports.creator_id', 'users.name as creator_name')
            ->orderBy('bill_exports.created_at', 'desc')
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
                    unset($product["category_id"]);
                    unset($product["name"]);
                    $product["bill_import_id"] = $billImport->id;
                    $product["input_quantity"] = $product["quantity"];
                    $product["expire_date"] = !empty($product["expire_date"]) ? Carbon::createFromFormat("d-m-Y", $product["expire_date"]) : null;
                    $product["manufactured_date"] = !empty($product["manufactured_date"]) ? Carbon::createFromFormat("d-m-Y", $product["manufactured_date"]) : null;
                    $product["quantity"] = $product["quantity"] * $product["exchange_value"];
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

    public function addProduct(Request $request){
        if($request->isMethod('post')){
            $params = $request->input();
            $productObj = Product::create([
                'name' => $params["productName"],
                'price' => $params["salePrice"],
                'price' => $params["salePrice"],
                'unit' => $params["saleUnit"],
                'min_quantity' => $params["minQuantity"],
                'category_id' => $params["categoryId"],
                'pharmacy_id' => Auth::user()->pharmacy_id,
                'creator_id' => Auth::id(),
            ]);
            return response()->json($productObj);
        }
    }

    public function suggestProducts(Request $request) {
        $products = DB::table('products')->select('id', 'name', 'price', 'category_id', 'unit')
            ->where([
                ['name', 'like', '%' . $request->input('searchString') . '%'],
                ['products.pharmacy_id', '=', Auth::user()->pharmacy_id],
            ])->get()->toArray();
        $productNames = array_column($products, 'name');
        $suggestionProducts = DB::table('product_defaults')->select(DB::raw('null as id'), 'name', 'price', 'category_id', 'unit')
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
            ->join('bill_imports', 'bill_imports.id', '=', 'shipments.bill_import_id')
            ->where([
                ['products.name', 'like', '%' . $request->input('searchString') . '%'],
                ['shipments.quantity', '>', 0],
                ['bill_imports.sub_pharmacy_id', '=', Auth::user()->sub_pharmacy_id],
            ])
            ->orderBy('products.name')->get()->toArray();

        foreach ($shipments as $key => $shipment) {
            $shipments[$key]->expire_date = Carbon::parse($shipment->expire_date)->format('d-m-Y');
            $shipments[$key]->created_at = Carbon::parse($shipment->created_at)->format('d-m-Y');
            $shipments[$key]->manufactured_date = Carbon::parse($shipment->manufactured_date)->format('d-m-Y');
        }

        return response()->json($shipments);
    }

    public function editProduct(Request $request) {
        if ($request->isMethod('post')) {
            $productId = $request->input('productId');
            $categoryId = $request->input('categoryId');
            $minQuantity = $request->input('minQuantity');

            Product::where('id', $productId)
                ->update(['category_id' => $categoryId, 'min_quantity' => $minQuantity]);

            return redirect()->action('Product\ProductController@index');
        }
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
