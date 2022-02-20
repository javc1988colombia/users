<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryRepo;

class CategoryController extends Controller
{
    public function getRepo()
    {
        return new CategoryRepo();
    }  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getRepo()->index();
    }
}
