<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_type_id',
        'attachment',
        'notes',
        'payor',
        'amount',
        'debit',
        'credit',
        'balance',
        'company_id',
        'created_by',
        'updated_by',
        'account_no',
        'check_no',
        'posting_date',
        'description'
    ];
}
