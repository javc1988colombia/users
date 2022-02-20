<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class CategoryRepo
{   
    public function getModel()
    {
        return new Category();
    }    

    public function index()
    {
        return $this->getModel()->all();
    }
}
