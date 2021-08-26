<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Branch;

class BranchController extends Controller
{
    public $company;

    public function __construct()
    {
        $this->company = Company::getCompanyDetails();
    }

    public function index()
    {
        $this->authorize('branch.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=> "Branches"],
        ];

        return view('branch.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->company
        ]);
    }

    public function create()
    {
        $this->authorize('branch.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('branches-view'), 'name'=>"Branch"], 
            ['name'=>"New Branch"],
        ];

        return view('branch.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->company
        ]);
    }

    public function edit(Branch $branch)
    {
        $this->authorize('branch.update');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('branches-view'), 'name'=>"Branches"], 
            ['name'=>"Edit Branch"],
        ];

        if ($this->company->id == $branch->company_id) {
            return view('branch.edit', [
                'breadcrumbs' => $breadcrumbs,
                'branch'      => $branch
            ]);
        }

        return view('errors.403');
    }

    public function view(Branch $branch)
    {
        $this->authorize('branch.read');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('branches-view'), 'name'=>"Branches"], 
            ['name'=> $branch->name],
        ];

        if ($this->company->id == $branch->company_id) {
            return view('branch.read', [
                'breadcrumbs' => $breadcrumbs,
                'branch'      => $branch
            ]);
        }

        return view('errors.403');
    }
}
