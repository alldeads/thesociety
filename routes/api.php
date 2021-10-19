<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('signin', 'Api\LoginController@authenticate');

Route::middleware('auth:sanctum')->group(function() {

    Route::get('products', 'Api\ProductController@index');
});