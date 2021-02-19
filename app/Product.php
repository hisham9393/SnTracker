<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function serialNumbers()
    {
        return $this->belongsToMany(SerialNumber::class);
    }
}
