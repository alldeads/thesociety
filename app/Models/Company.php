<?php

namespace App\Models;

use Auth;
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
        'avatar',
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
        'country',
        'address_line_1',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'twitter',
        'pinterest',
    ];

    public function getAddressAttribute()
    {
        $str = "";
        $address = [];

        if ( $this->address_line_2 ) {
            $str .= $this->address_line_2 . ', ';
        }

        $address[0] = ucwords($str . $this->address_line_1);
        $address[1] = ucwords($this->city . ', ' . $this->state);
        $address[2] = ucwords($this->postal . ', ' . $this->country);

        return $address;
    }

    public static function getCompanyAvatar()
    {
        return cache()->remember('company-avatar', 60*60*24, function () {
            return auth()->user()->empCard->company->avatar ?? asset('images/logo/logo-2.png');
        });
    }

    public static function getCompanyDetails()
    {
        return cache()->remember('company-details', 60*60*24, function () {

            if (!Auth::check()) {
                Auth::logout();

                session()->invalidate();
                session()->regenerateToken();

                return redirect('/');
            }

            return Company::findOrFail(auth()->user()->empCard->company_id);
        });
    }

    public function employees()
    {
    	return $this->hasMany(Employee::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function roles()
    {
        return $this->hasMany(CompanyRole::class);
    }

    public function chart_accounts()
    {
        return $this->hasMany(CompanyChartAccount::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
