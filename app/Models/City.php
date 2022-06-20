<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function shops(){
        return $this->hasMany(Shop::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_ref_id');
    }

}
