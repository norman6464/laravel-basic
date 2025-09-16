<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

// ルーティングを設定するコントローラを宣言する
use App\Http\Controllers\HelloController;

Route::get('/', function () {
    return view('welcome');
});

// /hello にアクセスしたとき、HelloController の index を呼び出す
Route::get('/hello', [HelloController::class, 'index']);
// ProductController
Route::get('/products',[ProductController::class, 'index']);
// ProductControllerクラスのshowメソッドを使う
Route::get('/products/{id}',[ProductController::class, 'show']);
// VendorControllerクラスのshowメソッドを呼び出す
Route::get('/vendors/{id}', [VendorController::class, 'show']);