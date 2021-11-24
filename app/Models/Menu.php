<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function submenus()
    {
    	return $this->hasMany(Menu::class, 'id', 'parent_menu_id');
    }

    public function header()
    {
        return $this->belongsTo(Header::class, 'header_id');
    }
}
