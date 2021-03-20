<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    public function menus()
    {
    	return $this->hasMany(Menu::class);
    }

    public static function get_menus()
    {
    	$menus = [];
    	$headers = Header::all();

    	foreach ($headers as $header) {
    		foreach ($header->menus as $menu) {
    			$menus[$header->name][] = $menu;
    		}
    	}

    	return $menus;
    }
}
