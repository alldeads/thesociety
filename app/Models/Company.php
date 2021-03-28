<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'fax',
        'dti',
        'bir',
        'sss',
        'business_permit',
        'state',
        'city',
        'address_line_2',
        'postal',
        'street',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'twitter',
        'pinterest',
    ];

    public function employees()
    {
    	return $this->hasMany(Employee::class);
    }

    public function roles()
    {
        return $this->hasMany(CompanyRole::class);
    }
}
