<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Vendor;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    public function index() {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }

    public function show($id) {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    public function create() {
        $vendor_codes = Vendor::pluck('vendor_code');

        return view('products.create', compact('vendor_codes'));
    }

    public function store(ProductStoreRequest $request) {
        // フォームの入力内容をもとに、テーブルにデータを追加する
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->vendor_code = $request->input('vendor_code');
        $product->save();

        // リダイレクトさせる
        return redirect("/products/{$product->id}");
    }
}
