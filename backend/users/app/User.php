<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\UserCreated;
use App\Category;

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

    protected $dispatchesEvents = [
        "created" => UserCreated::class
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
