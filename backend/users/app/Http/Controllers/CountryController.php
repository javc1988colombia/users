<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class CountryController extends Controller
{  
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.first.org/data/v1/countries?region=South America', 
            ['verify' => false]);      

        $data = json_decode($response->getBody(), true);

        $results = [];
        foreach ($data["data"] as $key => $value) {
            array_push($results, [ 
                "country" => $value["country"] 
            ]);
        }

        return $results;
    }
}
