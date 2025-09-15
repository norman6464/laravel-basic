<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

Route::get('/', function () {
    return view('welcome');
});

// /hello にアクセスしたとき、HelloController の index を呼び出す
Route::get('/hello', [HelloController::class, 'index']);
