<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'supplier_id',
        'reference',
        'ship_via',
        'ship_to',
        'shipping_method',
        'shipping_terms',
        'fob',
        'notes',
        'sub_total',
        'quantity',
        'discount',
        'fixed',
        'shipping',
        'status_id',
        'tax',
        'purchase_date',
        'updated_by',
        'created_by',
        'approved_by',
        'requested_by',
        'total'
    ];

    public static function generate_reference($company_id)
    {
        $reference = mt_rand( 1000000000, 9999999999 );

        $results = PurchaseOrder::where('reference', $reference)
                        ->where('company_id', $company_id)
                        ->first();

        if ( !$results ) {
            return $reference;
        }

        return PurchaseOrder::generate_reference($company_id);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_created()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function user_shipped()
    {
        return $this->belongsTo(User::class, 'ship_to', 'id');
    }

    public function user_updated()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function user_approved()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function items()
    {
    	return $this->hasMany(PurchaseOrderItem::class, 'purchase_order_id');
    }
}
