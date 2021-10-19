<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', 'Api\LoginController@authenticate');

Route::middleware('auth:sanctum')->group(function() {

    Route::get('test', 'Api\LoginController@test');
});