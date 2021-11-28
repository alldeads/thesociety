<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'account_payable',
        'account_receivable',
        'expenses',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopePerCompany($query)
    {
        $query->where('company_id', auth()->user()->empCard->company_id);
    }

    public function payable()
    {
        return $this->belongsTo(CompanyChartAccount::class, 'account_payable', 'id');
    }

    public function receivable()
    {
        return $this->belongsTo(CompanyChartAccount::class, 'account_receivable', 'id');
    }
}
