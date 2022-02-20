<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\UserRepo;

class UserController extends Controller
{
    public function getRepo()
    {
        return new UserRepo();
    }   

    public function index()
    {
        return $this->getRepo()->index();
    }

     /**
     * Create a new flight instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|min:5|max:100|alpha',
            'last_name' => 'required|string|max:100|alpha',
            'dni' => 'required|numeric|unique:App\User,dni',
            'email' => 'required|string|max:150|email:rfc,dns|unique:App\User,email',
            'country' => 'required',
            'street_address' => 'required|string|max:180',
            'cell_phone' => 'required|min:10|max:10|digits:10',
            'category_id' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $this->getRepo()->store($request->all());
        return response()->json(['message' => "Save successfully"], 200);
    }
}
