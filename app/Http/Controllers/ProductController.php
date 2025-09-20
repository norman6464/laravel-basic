<?php

namespace App\Http\Controllers;

use App\Events\ProductAddedEvent;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// モデル（Eloquent ORM）を呼び出す
use App\Models\Product;
use App\Models\Vendor;

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

    public function create() {
        // このpluckメソッドでは特定のカラムの値を配列やコレクションを取得できるメソッドになる
        $vendor_codes = Vendor::pluck('vendor_code');

        return view('products.create' , compact('vendor_codes'));
    }
 
    public function store(ProductStoreRequest $request) {
        // フォームの入力内容をもとに、テーブルにデータを追加する
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->vendor_code = $request->input('vendor_code');
        
        // アップロードされたファイル（name = "image"）が存在すれば処理を実行する
        if ($request->hasFile('image')) {
            // アップロードされたファイル（name = "image"）をstorage/app/public/productsフォルダに保存し、ファイルパスを変数に格納をする
            $image_path = $request->file('image')->store('public/products');
            
            echo $image_path;
            
            // ファイルパスからファイル名のみを取得し、Productインスタンスのimage_nameプロパティに代入する
            $product->image_name = basename($image_path);
        }
        
        $product->save();
        
        event(new ProductAddedEvent($product));

        // リダイレクトさせる
        return redirect("/products/{$product->id}");
    }

}
