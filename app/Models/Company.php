<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
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
            return Company::findOrFail(auth()->user()->empCard->company_id);
        });
    }

    public static function getCustomers()
    {
        return cache()->remember('company-customers', 60*60*24, function () {
            $company = Company::findOrFail(auth()->user()->empCard->company_id);

            return DB::table('customers')
                    ->join('users', 'users.id', '=', 'customers.user_id')
                    ->join('profiles', 'users.id', '=', 'profiles.user_id')
                    ->select('profiles.first_name', 'profiles.last_name', 'customers.id' )
                    ->where('customers.company_id', $company->id)
                    ->orderBy('profiles.first_name', 'asc')
                    ->get();
        });
    }

    public static function getProducts()
    {
        $company = Company::findOrFail(auth()->user()->empCard->company_id);

        return $company->products;
    }

    public static function getBranches()
    {
        $company = Company::findOrFail(auth()->user()->empCard->company_id);

        return $company->branches;
    }

    public function employees()
    {
    	return $this->hasMany(Employee::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
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
        return $this->hasMany(ChartAccount::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
