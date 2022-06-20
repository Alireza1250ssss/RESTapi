<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;


    public function country()
    {
        return $this->belongsToThrough(Country::class,City::class);
    }
}
