<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// モデル（Eloquent ORM）を呼び出す
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        // productsテーブルからすべてのデータを取得し、変数$productsに代入する
        $products = DB::table('products')->get();
        
        // 変数$productsをproducts/index.blade.phpファイルに渡す
        // 前回でもやったようにcompact関数の中に渡したい変数を代入する
        return view('products.index', compact('products'));
    }
    
    public function show($id) {
        // URL/products/{id}の{id}部分と主キー（idカラム）の値が一致するデータをproductsテーブルから取得する
        $product = Product::find($id);
        
        // 変数$productをproducts/show.blade.phpファイルに渡す
        return  view('products.show',compact('product'));
    }
}
