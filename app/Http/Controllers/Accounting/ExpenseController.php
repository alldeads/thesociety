<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;

use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('expense.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=>"Expenses"],
        ];

        return view('expense.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany(),
            'reports'     => Expense::getExpensesReport()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('expense.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('expenses.index'), 'name'=>"Expenses"], 
            ['name'=>"New Expense"],
        ];

        return view('expense.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('expense.read');

        $expense = Expense::findOrFail($id);

        $breadcrumbs = [
            ['link' => route('home'), 'name'=>"Dashboard"], 
            ['link' => route('expenses.index'), 'name' => "Expenses"],
            ['name' => "View Expense"],
        ];

        if ($this->getCompany()->id == $expense->company_id) {
            return view('expense.read', [
                'breadcrumbs' => $breadcrumbs,
                'expense'     => $expense
            ]);
        }

        return view('errors.403');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('expense.update');

        $expense = Expense::findOrFail($id);

        $breadcrumbs = [
            ['link' => route('home'), 'name'=>"Dashboard"], 
            ['link' => route('expenses.index'), 'name' => "Expenses"],
            ['name' => "Edit Expense"],
        ];

        if ($this->getCompany()->id == $expense->company_id) {
            return view('expense.edit', [
                'breadcrumbs' => $breadcrumbs,
                'expense'     => $expense
            ]);
        }

        return view('errors.403');
    }

    /**
     * Export module
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        $this->authorize('expense.export');

        return $this->exportModule($request->all(), 'ExpenseExport', $this->getCompany()->id);
    }
}
