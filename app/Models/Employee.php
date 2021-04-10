<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company_id',
        'role_id',
        'created_by',
        'updated_by',
        'date_hired'
    ];

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function role()
    {
    	return $this->belongsTo(CompanyRole::class, 'role_id', 'id');
    }
}
