<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\CountryRepo;

class CountryController extends Controller
{  
    public function getRepo()
    {
        return new CountryRepo();
    }  

    public function index()
    {
        return $this->getRepo()->index();
    }
}
