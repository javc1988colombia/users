<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
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
            'first_name' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 
                400);
        }

        User::create($request->all());
    }
}
