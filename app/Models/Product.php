<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    // 1つの商品は1つの仕入れ先に属する
    public function products() {
        return $this->belongsTo(Vendor::class, 'vendor_code', 'vendor_code');
    }
    
}
