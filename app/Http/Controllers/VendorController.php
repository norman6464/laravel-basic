<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    // web.php（ルーティング設定クラス）でパスパラメータとして設定された{id}値を引数として定義している
    public function show($id) {
        
        $vendor = Vendor::find($id);
        
        // 取得したvendor_codeに一致するproductsテーブルのvendor_codeの行をすべて取得する
        // SELECT * FROM products LEFT JOIN vendors ON products.vendor_code = vendors.vendor_code;
        $products = $vendor->products;
        
        return view('vendors.show', compact('vendor', 'products'));
    }
    
    // createメソッドから入力フォームの表示をさせる
    public function create() {
        return view('vendors.create');
    }
    
    // Laravelがid,created_at、updated_atを自動で設定をしてくれる
    public function store(Request $request) {
        // バリデーションを設定する
        $request->validate([
            'vendor_code' => 'required|integer|min:0|unique:vendors,vendor_code',
            'vendor_name' => 'required|max:255'
        ]);
        
        
        // フォームの入力内容をもとに、テーブルにデータを追加する
        $vendor = new Vendor(); // サービスクラスをインスタンス化
        $vendor->vendor_code = $request->input('vendor_code');
        $vendor->vendor_name = $request->input('vendor_name');
        $vendor->save();
        
        // リダイレクトさせる
        return redirect("vendors/{$vendor->id}");
        // この$vendor->idもあらかじめ自動的に代入されている
        
    }
}
