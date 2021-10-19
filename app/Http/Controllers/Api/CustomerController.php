<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user   = $request->user();
            $search = $request['query'] ?? '';
            $limit  = $request['limit'] ?? 10;

            $results = Customer::where('company_id', $user->company_id)
                    ->where( function (Builder $query) use ($search) {
                        $query->whereHas('user', function($query) use ($search) {
                            return $query->where('email', 'like', "%" . $search ."%")
                                ->orWhereHas('profile', function($query) use ($search) {
                                    return $query->where('first_name', 'like', "%" . $search ."%")
                                    ->orWhere('middle_name', 'like', "%" . $search ."%")
                                    ->orWhere('last_name', 'like', "%" . $search ."%");
                                });
                        });
                    })
                    ->orderBy('id', 'desc')
                    ->with(['user.profile'])
                    ->paginate($limit);

            return $this->response('Succcessfully customers has been retrieved.', [
                'customers'  => CustomerResource::collection($results->items()),
                'links'   => [
                    'next'         => $results->nextPageUrl(),
                    'prev'         => $results->previousPageUrl(),
                    'page_count'   => $results->count(),
                    'total'        => $results->total(),
                    'per_page'     => $limit
                ]
            ], 201);

        } catch(\Exception $e) {
            return $this->response($e->getMessage(), $request->all(), 402);
        }
    }
}
