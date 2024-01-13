<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

use App\Models\CompanyMenu;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function empCard()
    {
        return $this->belongsTo(Employee::class, 'id', 'user_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function preference()
    {
        return $this->hasOne(UserPreference::class);
    }

    public function scopePerCompany($query)
    {
        $query->where('company_id', auth()->user()->empCard->company_id);
    }

    public static function getUserDetails()
    {
        return cache()->remember('user-details', 60*60*24, function() {
            return User::where('id', auth()->id())
                        ->with(['profile', 'empCard.role'])
                        ->first();
        });
    }

    public static function getUserPreference()
    {
        return cache()->remember('user-preference', 60*60*24, function() {
            return auth()->user()->preference ?? null;
        });
    }

    public static function getCompanyUsers()
    {
        return cache()->remember('app-company-users', 60*60*24*360, function() {
            return User::where('company_id', auth()->user()->empCard->company_id)->with(['profile'])->get();
        });
    }

    public static function getMenu()
    {
        return Menu::whereNull('parent_menu_id')->get();
    }
}
