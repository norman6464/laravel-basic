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
}
