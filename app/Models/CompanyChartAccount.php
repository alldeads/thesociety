<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'company_id',
        'created_by',
        'updated_by'
    ];

    public static function getCompanyCharts($company_id)
    {
        return CompanyChartAccount::where('company_id', $company_id)
                ->get();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
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
