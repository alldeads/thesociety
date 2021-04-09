<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMenu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'company_id'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public static function getCompanyMenus($company_id)
    {
        return CompanyMenu::where('company_id', $company_id)
                ->get();
    }
}
