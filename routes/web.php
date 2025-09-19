<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

// ルーティングを設定するコントローラを宣言する
use App\Http\Controllers\HelloController;
use App\Http\Controllers\SignInController;

Route::get('/', function () {
    return view('welcome');
});

// /hello にアクセスしたとき、HelloController の index を呼び出す
Route::get('/hello', [HelloController::class, 'index']);


// ProductController
Route::get('/products',[ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

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

// SignInController
Route::get('/sign-in',[SignInController::class, 'create']);

Route::post('sign-in', [SignInController::class, 'store'])->name('sign-in.store');

// CookieController
Route::get('/cookies', [CookieController::class, 'index']);

Route::get('/cookies.create', [CookieController::class, 'create'])->name('cookies.create');

Route::post('/cookies.store', [CookieController::class, 'store'])->name('cookies.store');

Route::delete('/cookies/destroy', [CookieController::class, 'destroy'])->name('cookies.destroy');

// SessionController
Route::get('/sessions', [SessionController::class, 'index']);

Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');

Route::post('/sessions/store', [SessionController::class, 'store'])->name('sessions.store');

Route::delete('/sessions/destroy', [SessionController::class , 'destroy'])->name('sessions.destroy');