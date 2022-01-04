<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    public function index(){

        return view('register');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'full_name' => 'required|max:255|regex:/[a-zA-Z\s]+/',
            'email' => 'required|email:dns', //butuh validate untuk unique
            'password' => 'required|min:5|max:20',
            'Confirm Password' => 'same:password|required_with:password',
            'address' => 'required',
            'gender' => 'required'
        ]);

        // $validateData['role'] = 'member';
        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = new User();

        $user->full_name = $validatedData['full_name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->address = $validatedData['address'];
        $user->gender = $validatedData['gender'];
        $user->role = 'member';

        $user->save();

        return redirect('/login');

    }
}
