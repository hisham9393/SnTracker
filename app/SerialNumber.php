<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class SerialNumber extends Model
{
    //

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
