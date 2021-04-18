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
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\PurchaseOrderController;

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
		Route::get('create', [CustomerController::class, 'create'])->name('customers-create');
		Route::get('view/{customer}', [CustomerController::class, 'view'])->name('customers-read');
		Route::get('edit/{customer}', [CustomerController::class, 'edit'])->name('customers-edit');
	});

	Route::prefix('products')->group( function() {
		Route::get('view', [ProductController::class, 'index'])->name('products-view');
		Route::get('create', [ProductController::class, 'create'])->name('products-create');
		Route::get('view/{product}', [ProductController::class, 'view'])->name('products-read');
		Route::get('edit/{product}', [ProductController::class, 'edit'])->name('products-edit');
	});

	Route::prefix('supplies')->group( function() {
		Route::get('view', [SupplyController::class, 'index'])->name('supplies-view');
		Route::get('create', [SupplyController::class, 'create'])->name('supplies-create');
		Route::get('view/{product}', [SupplyController::class, 'view'])->name('supplies-read');
		Route::get('edit/{product}', [SupplyController::class, 'edit'])->name('supplies-edit');
	});

	Route::prefix('inventory')->group( function() {
		Route::prefix('suppliers')->group( function() {
			Route::get('view', [SupplierController::class, 'index'])->name('suppliers-view');
			Route::get('create', [SupplierController::class, 'create'])->name('suppliers-create');
			Route::get('view/{supplier}', [SupplierController::class, 'view'])->name('suppliers-read');
			Route::get('edit/{supplier}', [SupplierController::class, 'edit'])->name('suppliers-edit');
		});

		Route::prefix('purchase-orders')->group( function() {
			Route::get('view', [PurchaseOrderController::class, 'index'])->name('purchase-orders-view');
			// Route::get('create', [SupplierController::class, 'create'])->name('suppliers-create');
			// Route::get('view/{supplier}', [SupplierController::class, 'view'])->name('suppliers-read');
			// Route::get('edit/{supplier}', [SupplierController::class, 'edit'])->name('suppliers-edit');
		});
	});

	Route::prefix('accounting')->group( function() {
		Route::get('chart-of-accounts', [ChartOfAccountController::class, 'index'])->name('chart-of-accounts');
		Route::get('cash-flow', [CashFlowController::class, 'index'])->name('cash-flow');
		Route::get('tax', [TaxController::class, 'index'])->name('tax');
	});

	Route::prefix('roles')->group( function() {
		Route::get('view', [RoleController::class, 'get_all'])->name('roles-view');
	});
});
