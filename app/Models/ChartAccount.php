<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartAccount extends Model
{
    use HasFactory;

    public function type()
    {
    	return $this->belongsTo(ChartType::class, 'chart_type_id');
    }
}
