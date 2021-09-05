<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InventoryHistory;

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
}
