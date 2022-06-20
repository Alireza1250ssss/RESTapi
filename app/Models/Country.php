<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->hasMany(City::class,'country_ref_id'); 
    }

    public function shops()
    {
        return $this->hasManyThrough(
            Shop::class,
            City::class,
            'country_ref_id',
            'city_id'
        );
    }
}
