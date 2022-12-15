<?php

Route::middleware('auth')->group(function() {

    // Exports
    Route::get('chart-accounts/export', 'Accounting\ChartOfAccountController@export')->name('chart-accounts-export');
    Route::get('cash-flow/export', 'Accounting\CashFlowController@export')->name('cash-flow-export');
    Route::get('journal-entry/export', 'Accounting\JournalEntryController@export')->name('journal-entry-export');
    Route::get('tax/export', 'Accounting\TaxController@export')->name('tax-export');
    Route::get('expenses/export', 'Accounting\ExpenseController@export')->name('expense-export');
    Route::get('accounts-payable/export', 'Accounting\AccountsPayableController@export')->name('accounts-payable-export');
    Route::get('accounts-receivable/export', 'Accounting\AccountsReceivableController@export')->name('accounts-receivable-export');
    
    // Resources
    Route::resource('accounts-receivable', Accounting\AccountsReceivableController::class);
    Route::resource('accounts-payable', Accounting\AccountsPayableController::class);
    Route::resource('expenses', Accounting\ExpenseController::class);
    Route::resource('tax', Accounting\TaxController::class);
    Route::resource('journal-entry', Accounting\JournalEntryController::class);
    Route::resource('cash-flow', Accounting\CashFlowController::class);
    Route::resource('chart-accounts', Accounting\ChartOfAccountController::class);

    // Other Routes
});