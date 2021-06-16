<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartType extends Model
{
    use HasFactory;

    public function accounts()
    {
    	return $this->hasMany(ChartAccount::class, 'chart_type_id');
    }

    public static function getChartTypes()
    {
    	return cache()->remember('app-chart-types', 60*60*24*360, function() {
    		return ChartType::all();
    	});
    }
}
