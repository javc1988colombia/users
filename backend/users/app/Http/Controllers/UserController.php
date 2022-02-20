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
            'first_name' => 'required|string|min:5|max:100',
            'last_name' => 'required|string|max:100',
            'dni' => 'required',
            'email' => 'required|string|max:150',
            'country' => 'required',
            'street_address' => 'required|string|max:180',
            'cell_phone' => 'required|min:10|max:10',
            'category_id' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }

        User::create($request->all());
    }
}
