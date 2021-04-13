<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\ChartOfAccountController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\CustomerController;


Auth::routes(['register' => false]);

	
Route::get('/', [WebController::class, 'index'])->name('index');

Route::middleware('auth')->group(function() {

	Route::get('home', [DashboardController::class, 'index'])->name('home');

	Route::prefix('company')->group( function() {
		Route::get('details', [CompanyController::class, 'details'])->name('company-details');
		Route::get('edit', [CompanyController::class, 'edit'])->name('company-edit');
	});

	Route::prefix('employees')->group( function() {
		Route::get('view', [EmployeeController::class, 'get_all'])->name('employees-view');
		Route::get('create', [EmployeeController::class, 'create'])->name('employees-create');
		Route::get('edit/{emp}', [EmployeeController::class, 'edit'])->name('employees-edit');
	});

	Route::prefix('customers')->group( function() {
		Route::get('view', [CustomerController::class, 'index'])->name('customers-view');
		// Route::get('create', [EmployeeController::class, 'create'])->name('employees-create');
		// Route::get('edit/{emp}', [EmployeeController::class, 'edit'])->name('employees-edit');
	});

	Route::prefix('accounting')->group( function() {
		Route::get('chart-of-accounts', [ChartOfAccountController::class, 'index'])->name('chart-of-accounts');
		Route::get('cash-flow', [CashFlowController::class, 'index'])->name('cash-flow');
	});

	Route::prefix('roles')->group( function() {
		Route::get('view', [RoleController::class, 'get_all'])->name('roles-view');
	});
});
