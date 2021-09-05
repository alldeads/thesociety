<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InventoryHistory;
use App\Exports\InventoryHistoryExport;

class InventoryHistoryController extends Controller
{
    public function index()
    {
        $this->authorize('history.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=> "Histories"],
        ];

        return view('history.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    public function view(InventoryHistory $history)
    {
        $this->authorize('history.read');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('histories-view'), 'name'=>"Histories"],
            ['name'=> $history->reference],
        ];

        if ($history->company_id == $this->getCompany()->id) {
            return view('history.read', [
                'breadcrumbs' => $breadcrumbs,
                'history'     => $history
            ]);
        }

        return view('errors.403');
    }

    public function export(Request $request)
    {
        $this->authorize('history.export');

        $types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

        $requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
        $q = $request['q'];
        $from = $request['from'];
        $to = $request['to'];

        if ( !in_array($requested_type, $types) ) {
            $requested_type = 'csv';
        }

        return (new InventoryHistoryExport($q, $this->getCompany()->id, $from, $to))->download('inventory-histories-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
