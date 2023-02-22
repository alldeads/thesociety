<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashFlow extends Model
{
    use HasFactory, SoftDeletes;

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

    public static function getCompanyLastEntry()
    {
        return cache()->remember('app-cash-flow-last', 60*60*24*360, function() {
            return CashFlow::where('company_id', auth()->user()->empCard->company_id)->orderBy('id', 'desc')->first();
        });
    }

    public function chart_account()
    {
        return $this->belongsTo(ChartAccount::class, 'account_type_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'payor', 'id');
    }

    public function user_created()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function user_updated()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
