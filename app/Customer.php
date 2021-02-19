<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public function serialNumbers()
    {
        return $this->belongsToMany('App\serialNumber', 'serial_number_customers');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
