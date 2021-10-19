<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user   = $request->user();
            $search = $request['query'] ?? '';
            $limit  = $request['limit'] ?? 10;

            $products = Product::where('company_id', $user->company_id)
                        ->where('type', 'product')
                        ->where( function (Builder $query) use ($search) {
                            return $query->where('name', 'like', "%". $search . "%")
                                ->orWhere('status', 'like', "%". $search . "%");
                        })
                        ->orderBy('id', 'desc')
                        ->paginate($limit);

            return $this->response('Succcessfully products has been retrieved.', [
                'products'  => ProductResource::collection($products->items()),
                'links'   => [
                    'next'         => $products->nextPageUrl(),
                    'prev'         => $products->previousPageUrl(),
                    'page_count'   => $products->count(),
                    'total'        => $products->total(),
                    'per_page'     => $limit
                ]
            ], 201);

        } catch (\Exception $e) {
            return $this->response($e->getMessage(), $request->all(), 402);
        }
    }
}
