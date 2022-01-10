<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //

    public function index(){

        return view('register');
    }

    public function store(Request $request){

        $rules = [

            'full_name' => 'required|unique:users|max:255|regex:/^[^0-9][a-zA-Z\s]+$/',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:20',
            'confPassword' => 'same:password|required_with:password',
            'address' => 'required|min:5|max:95',
            'gender' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
             return back()->withErrors($validator);
        }

        $user = User::create(request(['full_name', 'email', 'password', 'address', 'gender','member']));

        $user->password = bcrypt($request->password);

        $user->save();

        return view('login-page')->with('notification', 'Account has been Created!');;

    }
}
