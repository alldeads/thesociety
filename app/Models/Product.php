<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
    	'avatar',
    	'sku',
    	'name',
    	'long_description',
    	'short_description',
    	'quantity',
    	'threshold',
    	'srp_price' ,
    	'discounted_price',
    	'cost',
    	'markup',
    	'updated_by',
    	'created_by', 
    	'type',      
    	'status',
    ];

    public static function generate_sku($company_id)
    {
    	$sku = mt_rand( 1000000000, 9999999999 );

    	$results = Product::where('sku', $sku)
                        ->where('company_id', $company_id)
                        ->first();

    	if ( !$results ) {
    		return $sku;
    	}

    	return Product::generate_sku();
    }
}
