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
        'reference',
        'ship_via',
        'shipping_method',
        'shipping_terms',
        'fob',
        'notes',
        'sub_total',
        'discount',
        'shipping',
        'tax',
        'delivery_date',
        'updated_by',
        'created_by',
        'total'
    ];

    public function items()
    {
    	return $this->hasMany(PurchaseOrderItem::class, 'id', 'purchase_order_id');
    }
}
