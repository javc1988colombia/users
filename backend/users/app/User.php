<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'dni',
        'email',
        'country',
        'street_address',
        'cell_phone',
        'category_id'
    ];

    
}
