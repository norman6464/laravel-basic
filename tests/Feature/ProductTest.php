<?php

use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// ホームページが200を返すことをテスト
test('home page returns 200', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

// 商品が作成できることをテスト
test('product can be created', function () {
    // 仕入先の作成
    $vendor = Vendor::create([
        'vendor_code' => 1111,
        'vendor_name' => 'SAMURAI商店',
    ]);

    // 商品データ
    $product = [
        'product_name' => 'テスト商品',
        'price' => 123,
        'vendor_code' => 1111,
        'image_name' => null,
    ];

    // 商品登録リクエスト
    $this->post(route('products.store'), $product);

    // データベースに保存されたことを検証
    $this->assertDatabaseHas('products', $product);
});
