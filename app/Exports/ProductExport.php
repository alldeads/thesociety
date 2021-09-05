<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Database\Eloquent\Builder;

class ProductExport implements FromView
{
	use Exportable;

	public $search;
	public $company_id;

    public function __construct($search, $company_id)
    {
        $this->search     = $search;
        $this->company_id = $company_id;
    }

    public function view(): View
    {
        $search = $this->search;

        $results = Product::where('company_id', $this->company_id)
                    ->where('type', 'product')
                    ->where( function (Builder $query) use ($search) {
                        return $query->where('name', 'like', "%". $search . "%")
                            ->orWhere('status', 'like', "%". $search . "%");
                    });

        $results = $results->orderBy('id', 'desc')->get();

        return view('exports.product', [
            'products' => $results
        ]);
    }
}
