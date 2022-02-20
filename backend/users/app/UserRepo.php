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
        return $this->getModel()->create($data);        
    }    

    public function getUserByCountry()
    {
        return $this->getModel()->select('country', \DB::raw('count(*) as total'))
                    ->groupBy('country')
                    ->pluck('total','country');      
    }    
}
