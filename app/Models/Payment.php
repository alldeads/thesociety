<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'payment_type_id',
        'transaction',
        'sub_total',      
        'discount',
        'total',
        'amount',
        'balance',
        'created_by',
        'updated_by',
        'order_id',
        'invoice_id'
    ];
}
