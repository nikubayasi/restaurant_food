<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'city_id', 'id');
    }
}
