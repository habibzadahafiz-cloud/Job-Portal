<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    //
        protected $fillable = [

        'name',
        'company',
        'quantity',
        'price',
        'expiry_date'

    ];
}
