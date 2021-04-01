<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }

    public function role()
    {
    	return $this->belongsTo(CompanyRole::class, 'role_id', 'id');
    }
}
