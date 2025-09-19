<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class CookieController extends Controller
{   
    // indexアクションで自分のクッキーを見ることができる
    public function index() {
        // クッキーからproduct_idキーの値を取得する
        $product_id = Cookie::get('product_id');
        
        // 実際にProductモデル（productsテーブル）からid値があるのかたしかめる
        $product = Product::find($product_id);
        
        return view('cookies.index', compact('product'));
    }
    
    public function create() {
        // productsテーブルからすべての値を取得する
        $products = Product::all();
        
        return view('cookies.create', compact('products'));
    }
    
    public function store(Request $request) {
        $request->validate([
           'product_id' => 'required|exists:products,id' 
        ]);
        
        // キー名がproduct_id（文字列）、値が商品IDのデータ（数字型）をクッキーに設定をする
        Cookie::queue('product_id', $request->input('product_id'), 60);
        
        // HTTPレスポンスと同時にクッキーが送信される
        return redirect('/cookies');
    }
    
    public function destroy() {
        // クッキーからproduct_idキーとその値を削除するように設定する
        Cookie::queue(Cookie::forget('product_id'));
        
        // HTTPレスポンスの送信と同時にクッキーが削除される
        return redirect('/cookies');
    }
    
}
