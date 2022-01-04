<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        return view('home');
    }

    public function addUser(Request $request){

        $role = 'member';

        $rules = [
            'full_name' => 'required| unique:users',
            'email' => 'required| unique:users,email',
            //ini gatau users dari mana
            'password' => 'required|min:6|max:20',
            'password_confirmation' => 'required_with:password|same:password',
            'address' => 'required| min:5 | max: 95',
            'gender' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $users = new User();

        $users->full_name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->address = $request->address;
        $users->gender = $request->gender;
        $users->role = $role;

        $users->save();
        return redirect()->back();
    }


    public function logout(){
        auth()->logout();
        return redirect('->login');
    }
}
