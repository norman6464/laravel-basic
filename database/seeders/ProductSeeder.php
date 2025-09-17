<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    // シーダークラスはテーブルにテスト用のデータを作成するためのクラス
    // php artisan make:seeder シーだークラス名
    // php artisan db:seed --class=シーだークラス
    // php artisan db:seedのみだったらDatabaseSeederクラスが実行されるのでまとめてテスト用の
    // データを作成したいのであればこのDatabaseSeederクラスにinsert文（クエリビルダの場合）を書く
    
    public function run(): void
    {
        DB::table('products')->insert([
           'product_name' => 'ノーと5冊セット',
           'price' => 600,
            'created_at' => '2023-06-01 00:00:00',
            'updated_at' => '2023-06-01 00:00:00',
            'vendor_code' => 1111,
        ]);
    }
}
