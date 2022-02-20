<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class CountryRepo
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
