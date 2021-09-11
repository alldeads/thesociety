<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    use HasFactory;

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
