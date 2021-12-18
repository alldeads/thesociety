<?php

namespace App\Exports;

use App\Exports\Export;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Builder;

class ProductExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;

        $results = Product::where('company_id', $this->company_id)
                    ->where('type', 'product')
                    ->where( function (Builder $query) use ($search) {
                        return $query->where('name', 'like', "%". $search . "%")
                            ->orWhere('status', 'like', "%". $search . "%");
                    });

        return view('exports.product', [
            'products' => $results->orderBy('id', 'desc')->get()
        ]);
    }
}
