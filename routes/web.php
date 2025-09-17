<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResponseController;
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

Route::get('/products/{id}',[ProductController::class, 'show']);


// VendorController
// さっきのルーティングだったら{id}をコードの上にしてしまったら、こっちのshowメソッドがルーティングをしてしまうので
// 最後に{ id }のあるパスのルーティングを記述する
Route::get('/vendors/create', [VendorController::class, 'create']);

Route::post('/vendors/store',[VendorController::class, 'store'])->name('vendors.store');

Route::get('/vendors/{id}', [VendorController::class, 'show']);

// RequestController
Route::get('/requests/create', [RequestController::class, 'create']);

Route::post('/requests/confirm', [RequestController::class, 'confirm'])->name('requests.confirm');

// ResponseController
Route::get('/responses', [ResponseController::class, 'index']);