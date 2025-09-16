<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    
    use HasFactory;
    
    // 1つの仕入れ先は複数の商品を持てる
    public function products() {
        // hasMany(参照元モデルクラス名、参照元のカラム名、参照先（つまりいまこのクラス）のカラム名)
        return $this->hasMany(Product::class, 'vendor_code', 'vendor_code');
    }
    // 参照元がbelongToメソッド、参照先がhasMany,hasOneメソッドを使う
    
}
