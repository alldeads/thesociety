<?php

Auth::routes(['register' => false]);
	
Route::get('/', 'WebController@index')->name('index');

Route::middleware('auth')->group(function() {

	Route::get('home', 'DashboardController@index')->name('home');

	Route::prefix('company')->group( function() {
		Route::get('details', 'CompanyController@details')->name('company-details');
		Route::get('edit', 'CompanyController@edit')->name('company-edit');
	});

	Route::prefix('employees')->group( function() {
		Route::get('view', 'EmployeeController@get_all')->name('employees-view');
		Route::get('create', 'EmployeeController@create')->name('employees-create');
		Route::get('edit/{emp}', 'EmployeeController@edit')->name('employees-edit');
	});

	Route::prefix('customers')->group( function() {
		Route::get('view', 'CustomerController@index')->name('customers-view');
		Route::get('create', 'CustomerController@create')->name('customers-create');
		Route::get('view/{customer}', 'CustomerController@view')->name('customers-read');
		Route::get('edit/{customer}', 'CustomerController@edit')->name('customers-edit');
	});

	Route::prefix('products')->group( function() {
		Route::get('view', 'ProductController@index')->name('products-view');
		Route::get('create', 'ProductController@create')->name('products-create');
		Route::get('view/{product}', 'ProductController@view')->name('products-read');
		Route::get('edit/{product}', 'ProductController@edit')->name('products-edit');
	});

	Route::prefix('supplies')->group( function() {
		Route::get('view', 'SupplyController@index')->name('supplies-view');
		Route::get('create', 'SupplyController@create')->name('supplies-create');
		Route::get('view/{product}', 'SupplyController@view')->name('supplies-read');
		Route::get('edit/{product}', 'SupplyController@edit')->name('supplies-edit');
	});

	Route::prefix('inventory')->group( function() {
		Route::prefix('suppliers')->group( function() {
			Route::get('view', 'SupplierController@index')->name('suppliers-view');
			Route::get('create', 'SupplierController@create')->name('suppliers-create');
			Route::get('view/{supplier}', 'SupplierController@view')->name('suppliers-read');
			Route::get('edit/{supplier}', 'SupplierController@edit')->name('suppliers-edit');
		});

		Route::prefix('purchase-orders')->group( function() {
			Route::get('view', 'PurchaseOrderController@index')->name('purchase-orders-view');
			Route::get('download/{purchase}', 'PurchaseOrderController@download')->name('purchase-orders-download');
			Route::get('create', 'PurchaseOrderController@create')->name('purchase-orders-create');
			Route::get('view/{purchase}', 'PurchaseOrderController@view')->name('purchase-orders-read');
			Route::get('edit/{purchase}', 'PurchaseOrderController@edit')->name('purchase-orders-edit');
		});
	});

	Route::prefix('accounting')->group( function() {
		Route::get('chart-of-accounts', 'ChartOfAccountController@index')->name('chart-of-accounts');
		Route::get('chart-of-accounts/export', 'ChartOfAccountController@export')->name('chart-of-accounts-export');

		Route::prefix('cash-flow')->group(function () {
			Route::get('/', 'CashFlowController@index')->name('cash-flow');
			Route::get('create', 'CashFlowController@create')->name('cash-flow-create');
			Route::get('view/{cashflow}', 'CashFlowController@view')->name('cash-flow-read');
			Route::get('export', 'CashFlowController@export')->name('cash-flow-export');
		});

		
		Route::get('tax', 'TaxController@index')->name('tax');
	});

	Route::prefix('roles')->group( function() {
		Route::get('view', 'RoleController@get_all')->name('roles-view');
	});
});
