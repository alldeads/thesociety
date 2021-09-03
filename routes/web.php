<?php

Auth::routes(['register' => false]);
	
Route::get('/', 'WebController@index')->name('index');

Route::middleware('auth')->group(function() {

	Route::get('home', 'DashboardController@index')->name('home');

	Route::prefix('company')->group( function() {
		Route::get('details', 'CompanyController@details')->name('company-details');
		Route::get('edit', 'CompanyController@edit')->name('company-edit');

		Route::prefix('branches')->group( function() {
			Route::get('view', 'BranchController@index')->name('branches-view');
			Route::get('create', 'BranchController@create')->name('branches-create');
			Route::get('edit/{branch}', 'BranchController@edit')->name('branches-edit');
			Route::get('view/{branch}', 'BranchController@view')->name('branches-read');
		});
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
			Route::get('export', 'SupplierController@export')->name('suppliers-export');
		});

		Route::prefix('purchase-orders')->group( function() {
			Route::get('view', 'PurchaseOrderController@index')->name('purchase-orders-view');
			Route::get('download/{purchase}', 'PurchaseOrderController@download')->name('purchase-orders-download');
			Route::get('create', 'PurchaseOrderController@create')->name('purchase-orders-create');
			Route::get('view/{purchase}', 'PurchaseOrderController@view')->name('purchase-orders-read');
			Route::get('edit/{purchase}', 'PurchaseOrderController@edit')->name('purchase-orders-edit');
			Route::get('export', 'PurchaseOrderController@export')->name('purchase-orders-export');
		});

		Route::prefix('stock-levels')->group( function() {
			Route::get('view', 'StockLevelController@index')->name('stock-levels-view');
			Route::get('download/{purchase}', 'PurchaseOrderController@download')->name('purchase-orders-download');
			Route::get('create', 'StockLevelController@create')->name('stock-levels-create');
			Route::get('view/{purchase}', 'PurchaseOrderController@view')->name('purchase-orders-read');
			Route::get('edit/{purchase}', 'PurchaseOrderController@edit')->name('purchase-orders-edit');
			Route::get('export', 'PurchaseOrderController@export')->name('purchase-orders-export');
		});

		Route::prefix('histories')->group( function() {
			Route::get('view', 'InventoryHistoryController@index')->name('histories-view');
		});
	});

	Route::prefix('accounting')->group( function() {

		Route::prefix('chart-of-accounts')->group(function () {
			Route::get('/', 'ChartOfAccountController@index')->name('chart-of-accounts');
			Route::get('export', 'ChartOfAccountController@export')->name('chart-of-accounts-export');
		});

		Route::prefix('cash-flow')->group(function () {
			Route::get('/', 'CashFlowController@index')->name('cash-flow');
			Route::get('create', 'CashFlowController@create')->name('cash-flow-create');
			Route::get('edit/{cashflow}', 'CashFlowController@edit')->name('cash-flow-edit');
			Route::get('view/{cashflow}', 'CashFlowController@view')->name('cash-flow-read');
			Route::get('export', 'CashFlowController@export')->name('cash-flow-export');
		});

		Route::prefix('journal-entry')->group(function () {
			Route::get('/', 'JournalEntryController@index')->name('journal-entry');
			Route::get('create', 'JournalEntryController@create')->name('journal-entry-create');
			Route::get('edit/{journal}', 'JournalEntryController@edit')->name('journal-entry-edit');
			Route::get('view/{journal}', 'JournalEntryController@view')->name('journal-entry-read');
			Route::get('export', 'JournalEntryController@export')->name('journal-entry-export');
		});

		Route::prefix('tax')->group(function () {
			Route::get('/', 'TaxController@index')->name('tax');
			Route::get('export', 'TaxController@export')->name('tax-export');
		});
	});

	Route::prefix('roles')->group( function() {
		Route::get('view', 'RoleController@get_all')->name('roles-view');
	});

	Route::prefix('pos')->group( function() {
		Route::get('/', 'POSController@index')->name('pos-index');
	});
});
