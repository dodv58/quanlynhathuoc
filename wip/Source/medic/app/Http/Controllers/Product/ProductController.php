<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDefault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct() {
        //        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //    public function index()
    //    {
    //        return view('home');
    //    }

    public function addStocks() {
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

    public function addProduct(Request $request) {
        $newProduct = Product::create(
            ['name' => $request->input('name'),
             'price' => $request->input('price'),
             'category_id' => $request->input('category_id'),
             'pharmacy_id' => 0,
             'creator_id' => 0,
            ]);

        var_dump($newProduct);
    }
}
