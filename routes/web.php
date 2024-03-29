<?php

Auth::routes(['register' => false]);

Route::view('/', 'web.index')->name('index');

Route::get('qr', function () {
  
    \QrCode::size(500)
            ->format('png')
            ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));
    
  	return view('qrcode');
    
});

Route::middleware('auth')->group(function() {

	Route::get('home', 'DashboardController@index')->name('home');

	Route::prefix('app')->group( function () {
		Route::get('covid/export', 'Apps\CovidController@export')->name('covid-export');
		Route::resource('covid', Apps\CovidController::class);
	});

	Route::prefix('sales')->group( function() {
		Route::get('orders/export', 'Sales\OrderController@export')->name('orders-export');
		Route::resource('orders', Sales\OrderController::class);
	});

	Route::prefix('company')->group( function() {

		Route::resource('preferences', Company\PreferenceController::class);

		Route::get('details', 'CompanyController@details')->name('company-details');
		Route::get('edit', 'CompanyController@edit')->name('company-edit');

		Route::resource('branches', BranchController::class);

		Route::get('branches/export', 'BranchController@export')->name('branches-export');

		Route::resource('payment-types', PaymentTypeController::class);
	});

	Route::prefix('employees')->group( function() {
		Route::get('view', 'EmployeeController@index')->name('employees-view');
		Route::get('create', 'EmployeeController@create')->name('employees-create');
		Route::get('edit/{emp}', 'EmployeeController@edit')->name('employees-edit');
		Route::get('export', 'EmployeeController@export')->name('employees-export');
	});

	Route::prefix('customers')->group( function() {
		Route::get('view', 'CustomerController@index')->name('customers-view');
		Route::get('create', 'CustomerController@create')->name('customers-create');
		Route::get('view/{customer}', 'CustomerController@view')->name('customers-read');
		Route::get('edit/{customer}', 'CustomerController@edit')->name('customers-edit');
		Route::get('export', 'CustomerController@export')->name('customers-export');
	});

	Route::prefix('products')->group( function() {
		Route::get('view', 'ProductController@index')->name('products-view');
		Route::get('create', 'ProductController@create')->name('products-create');
		Route::get('view/{product}', 'ProductController@view')->name('products-read');
		Route::get('edit/{product}', 'ProductController@edit')->name('products-edit');
		Route::get('export', 'ProductController@export')->name('products-export');
	});

	Route::prefix('supplies')->group( function() {
		Route::get('view', 'SupplyController@index')->name('supplies-view');
		Route::get('create', 'SupplyController@create')->name('supplies-create');
		Route::get('view/{product}', 'SupplyController@view')->name('supplies-read');
		Route::get('edit/{product}', 'SupplyController@edit')->name('supplies-edit');
		Route::get('export', 'SupplyController@export')->name('supplies-export');
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
			Route::get('create', 'StockLevelController@create')->name('stock-levels-create');
			Route::get('view/{stock}', 'StockLevelController@view')->name('stock-levels-read');
			Route::get('edit/{stock}', 'StockLevelController@edit')->name('stock-levels-edit');
			Route::get('export', 'StockLevelController@export')->name('stock-levels-export');
		});

		Route::prefix('histories')->group( function() {
			Route::get('view', 'InventoryHistoryController@index')->name('histories-view');
			Route::get('view/{history}', 'InventoryHistoryController@view')->name('histories-read');
			Route::get('export', 'InventoryHistoryController@export')->name('histories-export');
		});
	});

	Route::prefix('roles')->group( function() {
		Route::get('view', 'RoleController@index')->name('roles-view');
		Route::get('export', 'RoleController@export')->name('roles-export');
	});

	Route::prefix('pos')->group( function() {
		Route::get('/', 'POSController@index')->name('pos-index');
	});
});
