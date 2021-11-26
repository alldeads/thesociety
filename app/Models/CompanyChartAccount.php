<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyChartAccount extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chart_name',
        'code',
        'chart_type_id',
        'company_id',
        'created_by',
        'updated_by'
    ];

    public static function getCompanyCharts()
    {
        return cache()->remember('app-company-charts', 60*60*24*360, function() {
            return CompanyChartAccount::perCompany()->get();
        });
    }

    public function scopePerCompany($query)
    {
        $query->where('company_id', auth()->user()->empCard->company_id);
    }

    public function scopeExpenses($query)
    {
        $query->where('chart_type_id', 5);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function type()
    {
        return $this->belongsTo(ChartType::class, 'chart_type_id');
    }

    public function user_updated()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function user_created()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
