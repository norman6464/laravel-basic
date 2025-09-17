<?php

namespace App\Http\Controllers;

use Illuminate\HTTP\Response;

class ResponseController extends Controller 
{
    public function index() {
        return response()->json(['id' => 1, 'email' => 'taro.samurai@example.com']);
    }    
}
