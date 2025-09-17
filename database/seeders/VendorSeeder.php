<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    // さっき作ったファクトリークラスの値を使ってシーダークラスを書く
    
    public function run(): void
    {
        // VendorFactoryクラスで定義した内容に基づいてダミーデータを5つ生成し、vendorsテーブルに追加をする
        Vendor::factory()->count(5)->create();
        // この場合はcountの引数が5なので5つのランダムな値が生成される
    }
}
