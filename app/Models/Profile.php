<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'username',
        'birth_date',
        'gender',
        'citizenship',
        'marital_status',
        'nationality',
        'phone_number',
        'sss',
        'pagibig',
        'philhealth',
        'tin',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'postal',
        'country',
        'company',
        'position',
        'telephone',
        'fax',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'twitter',
        'pinterest'
    ];

    public function getNameAttribute()
    {
    	return $this->first_name . ' ' . $this->last_name;
    }

    public function getNameWithMiAttribute()
    {
        $str = "";

        if ( !empty($this->middle_name) ) {
            $str = ' ' . substr($this->middle_name, 0, 1) . '.';
        }

        return $this->last_name . ', ' . $this->first_name . $str;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
