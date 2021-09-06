<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Branch;
use App\Exports\BranchExport;

class BranchController extends Controller
{
    public function index()
    {
        $this->authorize('branch.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=> "Branches"],
        ];

        return view('branch.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    public function create()
    {
        $this->authorize('branch.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('branches-view'), 'name'=>"Branches"], 
            ['name'=>"New Branch"],
        ];

        return view('branch.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    public function edit(Branch $branch)
    {
        $this->authorize('branch.update');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('branches-view'), 'name'=>"Branches"], 
            ['name'=> ucwords($branch->name)],
        ];

        if ($this->getCompany()->id == $branch->company_id) {
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
            ['name'=> ucwords($branch->name)],
        ];

        if ($this->getCompany()->id == $branch->company_id) {
            return view('branch.read', [
                'breadcrumbs' => $breadcrumbs,
                'branch'      => $branch
            ]);
        }

        return view('errors.403');
    }

    public function export(Request $request)
    {
        $this->authorize('branch.export');

        $types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

        $requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
        $q = $request['q'];

        if ( !in_array($requested_type, $types) ) {
            $requested_type = 'csv';
        }

        return (new BranchExport($q, $this->getCompany()->id))->download('branches-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
