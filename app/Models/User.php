<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Header;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

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

    public function setting()
    {
        return $this->hasOne(UserSetting::class);
    }

    public static function getSetting()
    {
        return cache()->remember('user-setting', 60*60*24, function() {
            return auth()->user()->setting ?? null;
        });
    }

    public static function getUserDetails()
    {
        return cache()->remember('user-details', 60*60*24, function() {
            return User::where('id', auth()->id())
                        ->with(['profile', 'empCard.role'])
                        ->first();
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
        return cache()->remember('app-menus',60*60*24, function() {

            $user = auth()->user();

            $headers = Header::with('menus')->get();

            $menus   = [];

            foreach ($headers as $header) {
                foreach ($header->menus as $menu) {
                    if ( $user->hasPermissionTo($menu->permission) ) {
                        $menus[$header->name][] = $menu;
                    }
                }
            }

            return $menus;
        });
    }
}
