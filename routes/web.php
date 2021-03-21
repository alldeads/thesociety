<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\CompanyController;


Auth::routes(['register' => false]);

	
Route::get('/', [WebController::class, 'index'])->name('index');

Route::middleware('auth')->group(function() {

	Route::get('home', [DashboardController::class, 'index'])->name('home');

	Route::prefix('company')->group( function() {
		Route::get('details', [CompanyController::class, 'details'])->name('company-details');
	});

	Route::prefix('accounting')->group( function() {
		Route::get('chart-of-accounts', [AccountingController::class, 'chart_accounts'])->name('chart-of-accounts');
	});
});
