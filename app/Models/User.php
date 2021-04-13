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

    public function role()
    {
        return $this->belongsTo(CompanyRole::class, 'id', 'user_id');
    }

    public function setting()
    {
        return $this->hasOne(UserSetting::class);
    }

    public static function getSetting()
    {
        return auth()->user()->setting ?? null;
    }

    public static function getCompanyUsers($company_id)
    {
        return User::where('company_id', $company_id)->get();
    }

    public static function getMenu()
    {
        $permissions = auth()->user()->permissions;

        $headers = Header::all();
        $menus   = [];

        foreach ($headers as $header) {
            foreach ($header->menus as $menu) {
                if ( auth()->user()->hasPermissionTo($menu->permission) ) {
                    $menus[$header->name][] = $menu;
                }
            }
        }

        return $menus;
    }
}
