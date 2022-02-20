<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserRepo
{   
    public function getModel()
    {
        return new User();
    }    

    public function index()
    {
        return $this->getModel()->all();
    }

    public function store($data)
    {
        $this->getModel()->create($data);
    }    
}
