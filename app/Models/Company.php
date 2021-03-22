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
        'business_permit'
    ];

    public function employees()
    {
    	return $this->hasMany(Employee::class);
    }
}
