<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email',
        'phone',
        'company_id',
        'created_by',
        'updated_by',
        'status_id'
    ];

    public function getAddressAttribute()
    {
        $str = "";
        $address = [];

        if ( $this->user->profile->address_line_2 ) {
            $str .= $this->user->profile->address_line_2 . ', ';
        }

        $address[0] = ucwords($str . $this->user->profile->address_line_1);
        $address[1] = ucwords($this->user->profile->city . ', ' . $this->user->profile->state);
        $address[2] = ucwords($this->user->profile->postal . ', ' . $this->user->profile->country);

        return $address;
    }

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function user_created()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function user_updated()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
