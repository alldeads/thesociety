<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class CompanyRole extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'company_id',
        'created_by'
    ];

    public function role()
    {
        return $this->belongsTo(\Spatie\Permission\Models\Role::class, 'role_id', 'id');
    }
}
